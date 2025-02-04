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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->nullable();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->string('coupon_code')->nullable();
            $table->decimal('weight',12,4)->nullable();
            $table->decimal('total_weight',12,4)->nullable();
            $table->integer('quantity_ordered')->nullable();
            $table->integer('quantity_shpping')->nullable();
            $table->integer('quantity_invoiced')->nullable();
            $table->integer('quantity_cancelled')->nullable();
            $table->integer('quantity_refunded')->nullable();
            $table->decimal('price',12,4);
            $table->decimal('base_price',12,4);
            $table->decimal('total',12,4);
            $table->decimal('base_total',12,4);
            $table->decimal('total_invoiced',12,4);
            $table->decimal('base_total_invoiced',12,4);
            $table->decimal('amount_refunded',12,4);
            $table->decimal('discount_percent',12,4);
            $table->decimal('discount_amount',12,4)->nullable();
            $table->decimal('discount_invoiced',12,4)->nullable();
            $table->decimal('base_discount_invoiced',12,4)->nullable();
            $table->decimal('discount_refunded',12,4)->nullable();
            $table->decimal('base_discount_refunded',12,4)->nullable();
            $table->decimal('tax_percent',12,4)->nullable();
            $table->decimal('tax_amount',12,4)->nullable();
            $table->decimal('base_tax_amount',12,4)->nullable();
            $table->decimal('tax_amount_invoiced',12,4)->nullable();
            $table->decimal('base_tax_amount_invoiced',12,4)->nullable();
            $table->decimal('tax_amount_refunded',12,4)->nullable();
            $table->decimal('base_tax_amount_refunded',12,4)->nullable();
            $table->string('parent_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('product_type')->nullable();
            $table->string('order_id')->nullable();
            $table->json('additional')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
