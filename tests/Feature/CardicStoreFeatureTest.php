<?php

namespace Tests\Feature;

use App\Mail\ContactMessageAdminMail;
use App\Mail\ContactMessageReceiptMail;
use App\Mail\NewsletterWelcomeMail;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class CardicStoreFeatureTest extends TestCase
{
    public function test_landing_home_page_loads_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Cardic');
        $response->assertSee('Store');
    }

    public function test_marketplace_catalog_loads_successfully(): void
    {
        $response = $this->get('/marketplace');

        $response->assertStatus(200);
        $response->assertSee('Explore Digital Gift Cards');
        $response->assertSee('Amazon Gift Card');
    }

    public function test_sell_and_trade_page_loads_successfully(): void
    {
        $response = $this->get('/sell-and-trade');

        $response->assertStatus(200);
        $response->assertSee('Turn Unused Gift Cards into');
        $response->assertSee('Instant Cash');
    }

    public function test_corporate_wholesale_page_loads_successfully(): void
    {
        $response = $this->get('/bulk-corporate');

        $response->assertStatus(200);
        $response->assertSee('Institutional Wholesale');
        $response->assertSee('Starter Liquidity');
    }

    public function test_how_it_works_page_loads_successfully(): void
    {
        $response = $this->get('/how-it-works');

        $response->assertStatus(200);
        $response->assertSee('Escrow');
    }

    public function test_card_detail_page_loads_successfully(): void
    {
        $response = $this->get('/cards/amazon-gift-card');

        $response->assertStatus(200);
        $response->assertSee('Amazon Gift Card');
        $response->assertSee('How to Redeem This Card');
    }

    public function test_card_search_api_returns_filtered_results(): void
    {
        $response = $this->getJson('/api/cards/search?q=steam');

        $response->assertStatus(200)
            ->assertJsonPath('status', 'success')
            ->assertJsonFragment(['brand' => 'STEAM']);
    }

    public function test_liquidation_quote_api_calculates_correct_payout(): void
    {
        $response = $this->postJson('/api/liquidation/quote', [
            'brand' => 'amazon',
            'face_value' => 100,
            'payout_method' => 'crypto',
        ]);

        $response->assertStatus(200)
            ->assertJsonPath('status', 'success')
            ->assertJsonPath('quote.face_value', 100)
            ->assertJsonPath('quote.payout_amount', 90);
    }

    public function test_checkout_api_processes_instant_escrow_order(): void
    {
        Mail::fake();

        $response = $this->postJson('/api/checkout', [
            'items' => [
                ['id' => 'amazon-us', 'name' => 'Amazon Gift Card', 'price' => 96, 'denom' => 100, 'quantity' => 1],
            ],
            'payment_method' => 'card',
            'email' => 'customer@cardicstore.com',
        ]);

        $response->assertStatus(200)
            ->assertJsonPath('status', 'success')
            ->assertJsonPath('email', 'customer@cardicstore.com');

        $this->assertDatabaseHas('orders', [
            'customer_email' => 'customer@cardicstore.com',
            'payment_status' => 'paid',
        ]);

        Mail::assertSent(OrderConfirmationMail::class);
    }

    public function test_contact_form_submits_persists_and_dispatches_emails(): void
    {
        Mail::fake();

        $response = $this->postJson('/api/contact', [
            'name' => 'John Banda',
            'email' => 'john.banda@example.com',
            'phone' => '+265 991 234 567',
            'company' => 'Banda Capital Ltd',
            'subject' => 'Corporate Escrow API Inquiry',
            'message' => 'Hello Cardic Store team, we would like to inquire about integrating your instant mobile money escrow API for our business in Blantyre.',
        ]);

        $response->assertStatus(200)
            ->assertJsonPath('success', true);

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'john.banda@example.com',
            'name' => 'John Banda',
        ]);

        Mail::assertSent(ContactMessageAdminMail::class);
        Mail::assertSent(ContactMessageReceiptMail::class);
    }

    public function test_newsletter_vip_subscription_saves_and_sends_welcome_email(): void
    {
        Mail::fake();

        $email = 'vip-'.uniqid().'@example.com';

        $response = $this->postJson('/api/newsletter/subscribe', [
            'email' => $email,
        ]);

        $response->assertStatus(200)
            ->assertJsonPath('success', true);

        $this->assertDatabaseHas('newsletter_subscribers', [
            'email' => $email,
        ]);

        Mail::assertSent(NewsletterWelcomeMail::class);
    }
}
