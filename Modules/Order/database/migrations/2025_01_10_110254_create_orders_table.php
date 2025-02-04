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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('increment_id');
            $table->string('status')->nullable();
            $table->string('channel_name')->nullable();
            $table->boolean('is_guest')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_first_name')->nullable();
            $table->string('customer_last_name')->nullable();
            $table->string('customer_company_name')->nullable();
            $table->string('customer_vat_id')->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('shipping_title')->nullable();
            $table->string('coupon_code')->nullable();
            $table->boolean('is_gift')->default(0);
            $table->integer('total_item_count')->nullable();
            $table->integer('total_quantity_ordered')->nullable();
            $table->string('base_currency_code')->nullable();
            $table->string('channel_currency_code')->nullable()->nullable();
            $table->string('order_currency_code')->nullable();
            $table->decimal('grand_total', 12, 4)->nullable();
            $table->decimal('grand_total_invoiced', 12, 4)->nullable();
            $table->decimal('grand_total_refunded', 12, 4)->nullable();
            $table->decimal('base_grand_total_refunded', 12, 4)->nullable();
            $table->decimal('discount_percent', 12, 4)->nullable();
            $table->decimal('discount_amount', 12, 4)->nullable();
            $table->decimal('base_discount_amount', 12, 4)->nullable();
            $table->decimal('discount_invoiced', 12, 4)->nullable();
            $table->decimal('base_discount_invoiced', 12, 4)->nullable();
            $table->decimal('discount_refunded', 12, 4)->nullable();
            $table->decimal('base_discount_refunded', 12, 4)->nullable();
            $table->decimal('tax_amount', 12, 4)->nullable();
            $table->decimal('base_tax_amount', 12, 4)->nullable();
            $table->decimal('tax_amount_invoiced', 12, 4)->nullable();
            $table->decimal('tax_amount_refunded', 12, 4)->nullable();
            $table->decimal('base_tax_amount_refunded', 12, 4)->nullable();
            $table->decimal('base_shipping_amount', 12, 4)->nullable();
            $table->decimal('shipping_refunded', 12, 4)->nullable();
            $table->decimal('base_shipping_refunded', 12, 4)->nullable();
            $table->foreignUuid('customer_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('customer_type')->nullable();
            $table->foreignUuid('channel_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('channel_type');
            $table->string('cart_id')->nullable();
            $table->decimal('shipping_discount_amount', 12, 4)->nullable();
            $table->decimal('base_shipping_discount_amount', 12, 4)->nullable();
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
