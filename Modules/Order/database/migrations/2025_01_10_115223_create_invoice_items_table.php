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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('sku')->nullable();
            $table->integer('qunatity')->nullable();
            $table->decimal('price',12,4)->nullable();
            $table->decimal('base_price',12,4)->nullable();
            $table->decimal('total',12,4)->nullable();
            $table->decimal('base_total',12,4)->nullable();
            $table->decimal('tax_amount',12,4)->nullable();
            $table->decimal('base_tax_amount',12,4)->nullable();
            $table->foreignUuid('product_id')->nullable()->constrained()->nullable();
            $table->string('product_type')->nullable();
            $table->foreignUuid('invoice_id')->nullable()->constrained()->onDelete('cascade');
            $table->decimal('discount_percent',12,4)->nullable();
            $table->decimal('discount_amount',12,4)->nullable();
            $table->decimal('base_discount_amount',12,4)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};
