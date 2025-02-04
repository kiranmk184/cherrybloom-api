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
        Schema::create('refund_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('descolumn: cription');
            $table->string('sku');
            $table->integer('quantity');
            $table->decimal('price', 12,4);
            $table->decimal('base_price', 12,4);
            $table->decimal('total', 12,4);
            $table->decimal('base_total', 12,4);
            $table->decimal('tax_amount', 12,4)->nullable();
            $table->decimal('base_tax_amount', 12,4)->nullable();
            $table->decimal('discount_percent', 12,4)->nullable();
            $table->decimal('discount_amount', 12,4)->nullable();
            $table->decimal('base_discount_amount', 12,4)->nullable();
            $table->string('parent_id')->nullable();
            $table->string('refund_id')->nullable();
            $table->string('order_item_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('product_type')->nullable();
            $table->json('additional')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refund_items');
    }
};
