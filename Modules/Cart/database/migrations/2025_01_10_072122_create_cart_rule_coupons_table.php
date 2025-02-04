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
        Schema::create('cart_rule_coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('cart_rule_id')->constrained()->onDelete('cascade');
            $table->string('code');
            $table->integer('usage_limit')->nullable();
            $table->integer('usage_per_customer')->default(0);
            $table->integer('times_used')->default(0);
            $table->boolean('is_primary')->default(false);
            $table->date('expired_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_rule_coupons');
    }
};
