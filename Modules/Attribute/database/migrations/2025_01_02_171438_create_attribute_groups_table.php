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
        Schema::create('attribute_groups', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('attribute_family_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->integer('position');
            $table->boolean('is_user_defined')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_groups');
        Schema::dropForeign('attribute_groups_attribute_family_id_foreign');
    }
};
