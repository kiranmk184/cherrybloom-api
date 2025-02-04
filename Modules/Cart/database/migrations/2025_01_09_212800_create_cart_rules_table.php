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
        Schema::create('cart_rules', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->boolean('status');
            $table->integer('coupon_type');
            $table->integer('usage_per_customer');
            $table->integer('usage_per_coupon');
            $table->integer('times_used');
            $table->boolean('condition_type');
            $table->json('conditions')->nullable();
            $table->boolean('end_other_rules');
            $table->boolean('user_attribute_conditions');
            $table->string('action_type');
            $table->decimal('discount_amount', 12, 4)->nullable();
            $table->integer('discount_quantity');
            $table->string('discount_step');
            $table->boolean('apply_to_shipping');
            $table->integer('sort_order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_rules');
    }
};
