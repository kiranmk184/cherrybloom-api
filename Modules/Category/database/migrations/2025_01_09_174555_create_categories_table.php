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
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('parent_id')->nullable()->constrained('categories', 'id')->onDelete('cascade');
            $table->integer('position')->default(0);
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('display_mode')->nullable();
            $table->text('description')->nullable();
            $table->string('category_icon')->nullable();
            $table->boolean('status')->default(0);
            $table->json('additional')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        // Schema::dropForeign('categories_parent_id_foreign');
    }
};
