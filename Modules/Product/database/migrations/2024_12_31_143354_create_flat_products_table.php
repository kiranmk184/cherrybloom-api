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
        Schema::create('flat_products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('product_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('parent_id')->nullable()->constrained('flat_products')->onDelete('cascade');
            $table->string('sku');
            $table->string('product_number')->nullable();
            $table->string('name')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('url_key')->nullable();
            $table->boolean('new')->nullable();
            $table->boolean('featured')->nullable();
            $table->boolean('status')->nullable();
            $table->string('thumbnail')->nullable();
            $table->decimal('price',12,4)->nullable()->default(0.0000);
            $table->decimal('cost',12,4)->nullable()->default(0.0000);
            $table->decimal('special_price',12,4)->nullable()->default(0.0000);
            $table->date('special_price_from')->nullable();
            $table->date('special_price_to')->nullable();
            $table->integer('color')->nullable();
            $table->string('color_label')->nullable();
            $table->integer('size')->nullable();
            $table->string('size_label')->nullable();
            $table->decimal('weight',12,4)->nullable()->default(0.0000);
            $table->decimal('width',12,4)->nullable()->default(0.0000);
            $table->decimal('height',12,4)->nullable()->default(0.0000);
            $table->decimal('depth',12,4)->nullable()->default(0.0000);
            $table->decimal('min_price',12,4)->nullable()->default(0.0000);
            $table->decimal('max_price',12,4)->nullable()->default(0.0000);
            $table->string('locale')->nullable();
            $table->string('channel')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flat_products');
    }
};
