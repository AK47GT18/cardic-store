<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id', 32)->unique();
            $table->string('tx_ref', 64)->unique();
            $table->string('customer_email', 180);
            $table->string('customer_phone', 50)->nullable();
            $table->string('currency', 10)->default('USD');
            $table->decimal('total_usd', 12, 2);
            $table->decimal('total_mwk', 16, 2);
            $table->string('payment_gateway', 30)->default('paychangu');
            $table->string('payment_method', 50)->default('mobile_money');
            $table->string('payment_status', 30)->default('pending'); // pending, paid, failed, cancelled
            $table->string('fulfillment_status', 30)->default('pending'); // pending, fulfilled, failed
            $table->text('voucher_code')->nullable();
            $table->string('reloadly_transaction_id', 100)->nullable();
            $table->json('items_payload');
            $table->json('raw_payment_response')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
