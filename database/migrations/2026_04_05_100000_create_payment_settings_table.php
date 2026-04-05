<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_settings', function (Blueprint $table) {
            $table->id();

            // Bank transfer
            $table->boolean('bank_enabled')->default(false);
            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('routing_number')->nullable();
            $table->text('bank_instructions')->nullable();

            // Gift card
            $table->boolean('giftcard_enabled')->default(false);
            $table->string('giftcard_type')->nullable();
            $table->string('giftcard_email')->nullable();
            $table->text('giftcard_instructions')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_settings');
    }
};
