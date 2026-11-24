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
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number', 32)->unique();
            $table->string('name', 120);
            $table->string('email', 180);
            $table->string('company', 150)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('subject', 200)->nullable();
            $table->text('message');
            $table->string('ip_address', 45)->nullable();
            $table->string('status', 20)->default('received'); // received, in_progress, resolved
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
