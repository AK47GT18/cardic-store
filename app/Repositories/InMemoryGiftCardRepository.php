<?php

namespace App\Repositories;

use App\Contracts\GiftCardRepositoryInterface;

class InMemoryGiftCardRepository implements GiftCardRepositoryInterface
{
    protected array $cards = [
        [
            'id' => 'visa-prepaid',
            'slug' => 'visa-virtual-prepaid-card',
            'name' => 'Visa Virtual Prepaid Card',
            'brand' => 'Visa',
            'badge_type' => 'Prepaid Card',
            'subtitle' => 'Global Online Card (Custom $10 - $500)',
            'category' => 'Financial & Prepaid',
            'category_id' => 'shopping',
            'region' => 'Global / Worldwide',
            'region_code' => 'GLOBAL',
            'region_flag' => '🌐',
            'region_scope' => 'global',
            'discount_pct' => 0.0,
            'rating' => 5.0,
            'reviews_count' => 3120,
            'image' => 'images/V.jpg',
            'denominations' => [25, 50, 100, 250],
            'default_denomination' => 25,
            'min_custom' => 10,
            'max_custom' => 500,
            'gradient' => 'from-[#0b1c30] via-[#1a365d] to-[#1434cb]',
            'glow_color' => 'bg-blue-600/30',
            'icon' => 'credit_card',
            'delivery_sla' => 'Sub-60s Delivery',
            'crypto_accepted' => true,
            'instant_delivery' => true,
            'verified_escrow' => true,
            'description' => 'Spend anywhere Visa is accepted online worldwide. Choose any custom denomination between $10 and $500 with real-time MWK conversion.',
            'redemption_steps' => [
                'Receive your 16-digit virtual card number, CVV, and expiration date',
                'Use at checkout on any international website that accepts Visa cards',
                'Instantly charged in USD against your prepaid escrow balance',
            ],
        ],
        [
            'id' => 'amazon-us',
            'slug' => 'amazon-gift-card',
            'name' => 'Amazon Gift Card',
            'brand' => 'amazon',
            'badge_type' => 'Retail Voucher',
            'subtitle' => 'Digital eCode Voucher',
            'category' => 'Shopping & Retail',
            'category_id' => 'shopping',
            'region' => 'United States',
            'region_code' => 'US',
            'region_flag' => '🇺🇸',
            'region_scope' => 'us',
            'discount_pct' => 4.0,
            'rating' => 5.0,
            'reviews_count' => 2450,
            'image' => 'images/amazon.jpg',
            'denominations' => [25, 50, 100, 250],
            'default_denomination' => 100,
            'gradient' => 'from-slate-900 via-slate-800 to-amber-900',
            'glow_color' => 'bg-amber-500/20',
            'icon' => 'shopping_cart',
            'delivery_sla' => 'Sub-60s Instant Email',
            'crypto_accepted' => true,
            'instant_delivery' => true,
            'verified_escrow' => true,
            'description' => 'Redeemable towards millions of items store-wide at Amazon.com. Codes are verified instantly upon issuance and delivered securely with escrow protection.',
            'redemption_steps' => [
                'Visit amazon.com/redeem',
                'Sign in to your Amazon account',
                'Enter your 16-digit claim code and click Apply to Your Balance',
            ],
        ],
        [
            'id' => 'apple-global',
            'slug' => 'apple-app-store-itunes',
            'name' => 'Apple Store & iTunes',
            'brand' => 'Apple',
            'badge_type' => 'Store & Subscription',
            'subtitle' => 'App Store & iTunes Code',
            'category' => 'Technology & Cloud',
            'category_id' => 'tech',
            'region' => 'Global / Worldwide',
            'region_code' => 'GLOBAL',
            'region_flag' => '🌐',
            'region_scope' => 'global',
            'discount_pct' => 6.0,
            'rating' => 4.9,
            'reviews_count' => 1840,
            'image' => 'images/apple.jpg',
            'denominations' => [15, 25, 50, 100],
            'default_denomination' => 50,
            'gradient' => 'from-slate-900 via-neutral-800 to-indigo-950',
            'glow_color' => 'bg-blue-500/20',
            'icon' => 'phone_iphone',
            'delivery_sla' => 'Sub-60s Instant Email',
            'crypto_accepted' => true,
            'instant_delivery' => true,
            'verified_escrow' => true,
            'description' => 'Use for apps, games, music, movies, iCloud+ storage, Apple TV+, and Apple Arcade across any iPhone, iPad, Mac, or PC.',
            'redemption_steps' => [
                'Open App Store on your Apple device',
                'Tap your profile photo at top right',
                'Tap Redeem Gift Card or Code and paste your voucher key',
            ],
        ],
        [
            'id' => 'steam-global',
            'slug' => 'steam-wallet-code',
            'name' => 'Steam Wallet Code',
            'brand' => 'STEAM',
            'badge_type' => 'Gaming Pass',
            'subtitle' => 'Wallet Credit Key',
            'category' => 'Gaming',
            'category_id' => 'gaming',
            'region' => 'Global / Worldwide',
            'region_code' => 'GLOBAL',
            'region_flag' => '🌐',
            'region_scope' => 'global',
            'discount_pct' => 8.0,
            'rating' => 5.0,
            'reviews_count' => 4120,
            'image' => 'images/steam.jpg',
            'denominations' => [10, 25, 50, 100],
            'default_denomination' => 25,
            'gradient' => 'from-slate-900 via-blue-950 to-indigo-900',
            'glow_color' => 'bg-cyan-500/20',
            'icon' => 'sports_esports',
            'delivery_sla' => 'Sub-60s Instant Email',
            'crypto_accepted' => true,
            'instant_delivery' => true,
            'verified_escrow' => true,
            'description' => 'Add funds directly to your Steam Wallet to purchase thousands of games, downloadable content, hardware, and in-game cosmetics on Valve Steam.',
            'redemption_steps' => [
                'Open Steam client or visit store.steampowered.com/account/redeemwalletcode',
                'Log into your Steam account',
                'Input the digital Steam Wallet Code and click Continue',
            ],
        ],
        [
            'id' => 'psn-us',
            'slug' => 'playstation-store-psn',
            'name' => 'PlayStation PSN Code',
            'brand' => 'PlayStation',
            'badge_type' => 'Gaming Pass',
            'subtitle' => 'PSN Network Store',
            'category' => 'Gaming',
            'category_id' => 'gaming',
            'region' => 'United States',
            'region_code' => 'US',
            'region_flag' => '🇺🇸',
            'region_scope' => 'us',
            'discount_pct' => 10.0,
            'rating' => 4.8,
            'reviews_count' => 980,
            'image' => 'images/playstation.jpg',
            'denominations' => [25, 50, 75, 100],
            'default_denomination' => 75,
            'gradient' => 'from-blue-950 via-blue-900 to-indigo-800',
            'glow_color' => 'bg-blue-400/20',
            'icon' => 'gamepad',
            'delivery_sla' => 'Sub-60s Instant Email',
            'crypto_accepted' => true,
            'instant_delivery' => true,
            'verified_escrow' => true,
            'description' => 'Redeem for PlayStation 5 and PlayStation 4 games, add-ons, PlayStation Plus subscriptions, and blockbuster entertainment on the PlayStation Store.',
            'redemption_steps' => [
                'Go to PlayStation Store and select your Avatar at the top',
                'Select Redeem Codes from the drop-down menu',
                'Enter the 12-digit voucher code and select Redeem',
            ],
        ],
        [
            'id' => 'netflix-global',
            'slug' => 'netflix-subscription',
            'name' => 'Netflix Subscription',
            'brand' => 'NETFLIX',
            'badge_type' => 'Streaming Pass',
            'subtitle' => 'Streaming Subscription',
            'category' => 'Entertainment',
            'category_id' => 'entertainment',
            'region' => 'Global / Worldwide',
            'region_code' => 'GLOBAL',
            'region_flag' => '🌐',
            'region_scope' => 'global',
            'discount_pct' => 5.0,
            'rating' => 4.9,
            'reviews_count' => 740,
            'image' => 'images/netflix.jpg',
            'denominations' => [15, 30, 60, 100],
            'default_denomination' => 30,
            'gradient' => 'from-zinc-950 via-neutral-900 to-red-950',
            'glow_color' => 'bg-red-600/20',
            'icon' => 'live_tv',
            'delivery_sla' => 'Sub-60s Instant Email',
            'crypto_accepted' => true,
            'instant_delivery' => true,
            'verified_escrow' => true,
            'description' => 'Watch unlimited TV shows, award-winning movies, documentaries, and Netflix originals on smart TVs, mobile phones, tablets, and laptops without commercials.',
            'redemption_steps' => [
                'Visit netflix.com/redeem',
                'Enter the code from your order fulfillment email',
                'The balance will be applied to your monthly bill',
            ],
        ],
        [
            'id' => 'spotify-us',
            'slug' => 'spotify-premium-pass',
            'name' => 'Spotify Premium Pass',
            'brand' => 'Spotify',
            'badge_type' => 'Music Streaming',
            'subtitle' => 'Premium Pass Code',
            'category' => 'Entertainment',
            'category_id' => 'entertainment',
            'region' => 'United States',
            'region_code' => 'US',
            'region_flag' => '🇺🇸',
            'region_scope' => 'us',
            'discount_pct' => 7.0,
            'rating' => 4.8,
            'reviews_count' => 610,
            'image' => 'images/spotify.jpg',
            'denominations' => [10, 30, 60, 99],
            'default_denomination' => 60,
            'gradient' => 'from-slate-950 via-emerald-950 to-neutral-900',
            'glow_color' => 'bg-emerald-500/20',
            'icon' => 'headphones',
            'delivery_sla' => 'Sub-60s Instant Email',
            'crypto_accepted' => true,
            'instant_delivery' => true,
            'verified_escrow' => true,
            'description' => 'Enjoy ad-free music, offline listening, high quality lossless audio streaming, and unlimited skips with prepaid Spotify Premium membership.',
            'redemption_steps' => [
                'Log into spotify.com/redeem',
                'Enter the alphanumeric code from your Cardic dashboard',
                'Click Redeem to extend your Premium plan',
            ],
        ],
        [
            'id' => 'xbox-us',
            'slug' => 'xbox-game-pass',
            'name' => 'Xbox Game Pass',
            'brand' => 'XBOX',
            'badge_type' => 'Gaming Pass',
            'subtitle' => 'Game Pass Ultimate',
            'category' => 'Gaming',
            'category_id' => 'gaming',
            'region' => 'United States',
            'region_code' => 'US',
            'region_flag' => '🇺🇸',
            'region_scope' => 'us',
            'discount_pct' => 12.0,
            'rating' => 4.9,
            'reviews_count' => 1100,
            'image' => 'images/xbox.jpg',
            'denominations' => [15, 45, 75, 100],
            'default_denomination' => 45,
            'gradient' => 'from-zinc-950 via-emerald-900 to-green-950',
            'glow_color' => 'bg-green-500/20',
            'icon' => 'videogame_asset',
            'delivery_sla' => 'Sub-60s Instant Email',
            'crypto_accepted' => true,
            'instant_delivery' => true,
            'verified_escrow' => true,
            'description' => 'Play hundreds of high-quality games on console, PC, and cloud, with day-one release titles and EA Play membership included.',
            'redemption_steps' => [
                'Go to redeem.microsoft.com on any browser',
                'Sign into your Microsoft account',
                'Enter the 25-character digital key and confirm',
            ],
        ],
        [
            'id' => 'google-play-global',
            'slug' => 'google-play-store',
            'name' => 'Google Play Store',
            'brand' => 'Google Play',
            'badge_type' => 'App Store Code',
            'subtitle' => 'Apps, Games & Media',
            'category' => 'Technology & Cloud',
            'category_id' => 'tech',
            'region' => 'Global / Worldwide',
            'region_code' => 'GLOBAL',
            'region_flag' => '🌐',
            'region_scope' => 'global',
            'discount_pct' => 5.0,
            'rating' => 4.7,
            'reviews_count' => 1400,
            'image' => 'images/giftcard.jpg',
            'denominations' => [10, 25, 50, 100],
            'default_denomination' => 50,
            'gradient' => 'from-slate-900 via-sky-950 to-emerald-950',
            'glow_color' => 'bg-emerald-400/20',
            'icon' => 'shop',
            'delivery_sla' => 'Sub-60s Instant Email',
            'crypto_accepted' => true,
            'instant_delivery' => true,
            'verified_escrow' => true,
            'description' => 'Unlock millions of Android apps, premium games, in-app gems/currencies, books, movies, and YouTube Premium subscriptions.',
            'redemption_steps' => [
                'Open the Google Play Store app',
                'Tap your profile icon at the top right',
                'Tap Payments & subscriptions > Redeem code',
            ],
        ],
        [
            'id' => 'uber-us',
            'slug' => 'uber-and-uber-eats',
            'name' => 'Uber & Uber Eats',
            'brand' => 'Uber',
            'badge_type' => 'Rides & Food',
            'subtitle' => 'Rides & Eats Delivery',
            'category' => 'Food & Dining',
            'category_id' => 'food',
            'region' => 'United States',
            'region_code' => 'US',
            'region_flag' => '🇺🇸',
            'region_scope' => 'us',
            'discount_pct' => 8.0,
            'rating' => 4.9,
            'reviews_count' => 820,
            'image' => 'images/giftcard.jpg',
            'denominations' => [25, 50, 100, 200],
            'default_denomination' => 100,
            'gradient' => 'from-neutral-950 via-slate-900 to-stone-900',
            'glow_color' => 'bg-stone-500/20',
            'icon' => 'local_taxi',
            'delivery_sla' => 'Sub-60s Instant Email',
            'crypto_accepted' => true,
            'instant_delivery' => true,
            'verified_escrow' => true,
            'description' => 'Seamless digital credit valid for rides on Uber or food delivery orders on Uber Eats with zero expiration date.',
            'redemption_steps' => [
                'Open Uber or Uber Eats app',
                'Navigate to Account > Wallet',
                'Tap Add Payment Method > Gift Card and enter your claim pin',
            ],
        ],
        [
            'id' => 'nintendo-global',
            'slug' => 'nintendo-eshop',
            'name' => 'Nintendo eShop Card',
            'brand' => 'Nintendo',
            'badge_type' => 'Gaming Pass',
            'subtitle' => 'Switch Digital eCode',
            'category' => 'Gaming',
            'category_id' => 'gaming',
            'region' => 'Global / Worldwide',
            'region_code' => 'GLOBAL',
            'region_flag' => '🌐',
            'region_scope' => 'global',
            'discount_pct' => 7.5,
            'rating' => 4.9,
            'reviews_count' => 950,
            'image' => 'images/giftcard.jpg',
            'denominations' => [20, 35, 50, 70],
            'default_denomination' => 50,
            'gradient' => 'from-red-950 via-red-900 to-slate-900',
            'glow_color' => 'bg-red-500/20',
            'icon' => 'sports_esports',
            'delivery_sla' => 'Sub-60s Instant Email',
            'crypto_accepted' => true,
            'instant_delivery' => true,
            'verified_escrow' => true,
            'description' => 'Direct Nintendo Switch credit to purchase digital indie games, Nintendo first-party titles, and DLC expansions.',
            'redemption_steps' => [
                'Select Nintendo eShop on HOME menu of your Switch',
                'Select Redeem Code on left menu',
                'Enter the 16-character code and select Confirm',
            ],
        ],
        [
            'id' => 'airbnb-global',
            'slug' => 'airbnb-travel',
            'name' => 'Airbnb Travel Gift Card',
            'brand' => 'Airbnb',
            'badge_type' => 'Travel Voucher',
            'subtitle' => 'Stays & Experiences',
            'category' => 'Travel & Hotels',
            'category_id' => 'travel',
            'region' => 'Global / Worldwide',
            'region_code' => 'GLOBAL',
            'region_flag' => '🌐',
            'region_scope' => 'global',
            'discount_pct' => 6.0,
            'rating' => 4.8,
            'reviews_count' => 460,
            'image' => 'images/airbnb.jpg',
            'denominations' => [50, 100, 250, 500],
            'default_denomination' => 100,
            'gradient' => 'from-rose-950 via-rose-900 to-stone-900',
            'glow_color' => 'bg-rose-500/20',
            'icon' => 'flight',
            'delivery_sla' => 'Sub-60s Instant Email',
            'crypto_accepted' => true,
            'instant_delivery' => true,
            'verified_escrow' => true,
            'description' => 'Book vacation homes, cozy beachfront cabins, city apartments, and guided travel experiences across 220+ countries.',
            'redemption_steps' => [
                'Visit airbnb.com/gift',
                'Sign in or create your account',
                'Enter your digital code to credit your travel funds',
            ],
        ],
        [
            'id' => 'roblox-global',
            'slug' => 'roblox-robux',
            'name' => 'Roblox Digital Card',
            'brand' => 'Roblox',
            'badge_type' => 'Gaming Pass',
            'subtitle' => 'Robux & Premium Credit',
            'category' => 'Gaming',
            'category_id' => 'gaming',
            'region' => 'Global / Worldwide',
            'region_code' => 'GLOBAL',
            'region_flag' => '🌐',
            'region_scope' => 'global',
            'discount_pct' => 9.0,
            'rating' => 4.9,
            'reviews_count' => 2800,
            'image' => 'images/giftcard.jpg',
            'denominations' => [10, 25, 50, 100],
            'default_denomination' => 25,
            'gradient' => 'from-neutral-950 via-red-950 to-neutral-900',
            'glow_color' => 'bg-red-500/20',
            'icon' => 'sports_esports',
            'delivery_sla' => 'Sub-60s Instant Email',
            'crypto_accepted' => true,
            'instant_delivery' => true,
            'verified_escrow' => true,
            'description' => 'Load Robux currency to unlock avatars, exclusive virtual accessories, and premium experiences on Roblox platform.',
            'redemption_steps' => [
                'Log into roblox.com/redeem in your browser',
                'Enter your PIN code from Cardic Store',
                'Click Redeem to instantly add credit to your balance',
            ],
        ],
    ];

    public function all(array $filters = []): array
    {
        $result = $this->cards;

        // Search filter
        if (! empty($filters['search'])) {
            $search = strtolower(trim($filters['search']));
            $result = array_filter($result, function ($card) use ($search) {
                return str_contains(strtolower($card['name']), $search) ||
                       str_contains(strtolower($card['brand']), $search) ||
                       str_contains(strtolower($card['category']), $search);
            });
        }

        // Category filter
        if (! empty($filters['category']) && $filters['category'] !== 'all') {
            $cat = strtolower($filters['category']);
            $result = array_filter($result, function ($card) use ($cat) {
                return strtolower($card['category_id']) === $cat ||
                       strtolower($card['category']) === $cat;
            });
        }

        // Region filter
        if (! empty($filters['region']) && $filters['region'] !== 'all') {
            $region = strtolower($filters['region']);
            $result = array_filter($result, function ($card) use ($region) {
                return strtolower($card['region_scope']) === $region ||
                       strtolower($card['region_code']) === $region;
            });
        }

        // Min rating filter
        if (! empty($filters['min_rating'])) {
            $minRating = (float) $filters['min_rating'];
            $result = array_filter($result, function ($card) use ($minRating) {
                return $card['rating'] >= $minRating;
            });
        }

        // Sorting
        $sort = $filters['sort'] ?? 'popular';
        if ($sort === 'discount') {
            usort($result, fn ($a, $b) => $b['discount_pct'] <=> $a['discount_pct']);
        } elseif ($sort === 'price_asc') {
            usort($result, fn ($a, $b) => min($a['denominations']) <=> min($b['denominations']));
        } elseif ($sort === 'alphabetical') {
            usort($result, fn ($a, $b) => strcmp($a['name'], $b['name']));
        }

        return array_values($result);
    }

    public function find(string $id): ?array
    {
        foreach ($this->cards as $card) {
            if ($card['id'] === $id || $card['slug'] === $id) {
                return $card;
            }
        }

        return null;
    }

    public function getCategories(): array
    {
        $categories = [
            ['id' => 'all', 'name' => 'All Categories', 'icon' => 'grid_view', 'count' => count($this->cards)],
            ['id' => 'gaming', 'name' => 'Gaming', 'icon' => 'sports_esports', 'count' => 0],
            ['id' => 'shopping', 'name' => 'Shopping & Retail', 'icon' => 'shopping_cart', 'count' => 0],
            ['id' => 'entertainment', 'name' => 'Entertainment & Streaming', 'icon' => 'movie', 'count' => 0],
            ['id' => 'tech', 'name' => 'Technology & Cloud', 'icon' => 'devices', 'count' => 0],
            ['id' => 'food', 'name' => 'Food & Dining', 'icon' => 'restaurant', 'count' => 0],
            ['id' => 'travel', 'name' => 'Travel & Hotels', 'icon' => 'flight', 'count' => 0],
            ['id' => 'telecom', 'name' => 'Telecom & Mobile', 'icon' => 'cell_tower', 'count' => 94],
        ];

        // Tally counts
        foreach ($this->cards as $card) {
            foreach ($categories as &$cat) {
                if ($cat['id'] === $card['category_id']) {
                    $cat['count']++;
                }
            }
        }

        return $categories;
    }

    public function getRegions(): array
    {
        return [
            ['code' => 'global', 'name' => 'Global / Worldwide', 'flag' => '🌐', 'count' => 310],
            ['code' => 'us', 'name' => 'United States (USD)', 'flag' => '🇺🇸', 'count' => 164],
            ['code' => 'uk', 'name' => 'United Kingdom (GBP)', 'flag' => '🇬🇧', 'count' => 28],
            ['code' => 'eu', 'name' => 'European Union (EUR)', 'flag' => '🇪🇺', 'count' => 52],
            ['code' => 'ca', 'name' => 'Canada (CAD)', 'flag' => '🇨🇦', 'count' => 19],
        ];
    }
}
