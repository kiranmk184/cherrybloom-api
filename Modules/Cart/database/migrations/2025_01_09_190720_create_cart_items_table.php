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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('cart_id')->constrained()->onDelete('');
            $table->integer('quantity');
            $table->string('sku');
            $table->string('type');
            $table->string('name');
            $table->string('coupon_code');
            $table->decimal('weight', 12, 4);
            $table->decimal('total_weight', 12, 4);
            $table->decimal('base_total_weight', 12, 4);
            $table->decimal('price', 12, 4);
            $table->decimal('base_price', 12, 4);
            $table->decimal('total', 12, 4);
            $table->decimal('base_total', 12, 4);
            $table->decimal('tax_percent', 12, 4)->nullable();
            $table->decimal('tax_amount', 12, 4)->nullable();
            $table->decimal('base_tax_amount', 12, 4)->nullable();
            $table->decimal('discount_percent', 12, 4);
            $table->decimal('discount_amount', 12, 4);
            $table->decimal('base_discount_amount', 12, 4);
            $table->json('additional')->nullable();
            $table->foreignUuid('parent_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('product_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('tax_category_id')->constrained()->onDelete('cascade');
            $table->decimal('custom_price', 12, 4)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
