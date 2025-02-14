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
        Schema::create('channels', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code');
            $table->string('theme')->nullable();
            $table->string('hostname')->nullable();
            $table->string('favicon')->nullable();
            $table->string('logo')->nullable();
            $table->string('timezone')->nullable();
            $table->boolean('is_maintenance_on')->default(0);
            $table->text('allowed_ips')->nullable();
            $table->foreignId('default_locale_id')->nullable()->constrained('locales')->onDelete('cascade');
            $table->foreignUuid('base_currency_id')->nullable()->constrained('currencies')->onDelete('cascade');
            $table->foreignUuid('root_category_id')->nullable()->constrained('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channels');
    }
};
