<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->id();
            $table->string('increment_id');
            $table->string('state');
            $table->boolean('email_sent')->default(false);
            $table->integer('total_quantity');
            $table->string('base_currency_code');
            $table->string('channel_currency_code');
            $table->string('order_currency_code');
            $table->decimal('adjustment_refund', 12, 4)->nullable();
            $table->decimal('base_adjustment_refund', 12, 4)->nullable();
            $table->decimal('adjustment_fee', 12, 4)->nullable();
            $table->decimal('base_adjustment_fee', 12, 4)->nullable();
            $table->decimal('sub_total', 12, 4)->nullable();
            $table->decimal('base_sub_total', 12, 4)->nullable();
            $table->decimal('grand_total', 12, 4)->nullable();
            $table->decimal('base_grand_total', 12, 4)->nullable();
            $table->decimal('shipping_amount', 12, 4)->nullable();
            $table->decimal('base_shipping_amount', 12, 4)->nullable();
            $table->decimal('tax_amount', 12, 4)->nullable();
            $table->decimal('base_tax_amount', 12, 4)->nullable();
            $table->decimal('discount_percent', 12, 4)->nullable();
            $table->decimal('discount_amount', 12, 4)->nullable();
            $table->decimal('base_discount_amount', 12, 4)->nullable();
            $table->foreignUuid('order_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refunds');
    }
};
