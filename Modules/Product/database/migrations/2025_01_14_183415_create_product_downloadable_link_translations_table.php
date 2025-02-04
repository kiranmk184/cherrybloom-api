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
        Schema::create('product_downloadable_link_translations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('product_dl_lk_id')->constrained('product_downloadable_links')->onDelete('cascade');
            $table->string('locale');
            $table->string('title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_downloadable_link_translations');
    }
};
