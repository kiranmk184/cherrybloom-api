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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('customer_email')->nullable();
            $table->string('customer_first_name')->nullable();
            $table->string('customer_last_name')->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('coupon_code')->nullable();
            $table->boolean('is_gift')->default(false);
            $table->integer('item_count')->nullable();
            $table->decimal('item_quantity', 12, 4);
            $table->decimal('exchange_rate', 12, 4);
            $table->string('global_currency_code')->nullable();
            $table->string('base_currency_code')->nullable();
            $table->string('channel_currency_code')->nullable();
            $table->string('cart_currency_code')->nullable();
            $table->decimal('grand_total', 12, 4);
            $table->decimal('base_grand_total', 12, 4);
            $table->decimal('sub_total', 12, 4);
            $table->decimal('base_sub_total', 12, 4);
            $table->decimal('tax_total', 12, 4);
            $table->decimal('base_tax_total', 12, 4);
            $table->decimal('discount_amount', 12, 4);
            $table->decimal('base_discount_amount', 12, 4);
            $table->string('checkout_method');
            $table->boolean('is_guest');
            $table->boolean('is_active');
            $table->datetime('conversion_time');
            $table->foreignUuid('customer_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('channel_id')->constrained()->onDelete('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
