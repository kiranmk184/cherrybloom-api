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
        Schema::create('attribute_group_mappings', function (Blueprint $table) {
            $table->foreignUuid('attribute_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('attribute_group_id')->constrained()->onDelete('cascade');
            $table->integer('position');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_group_mappings');
        Schema::dropForeign('attribute_group_mappings_attribute_id_foreign');
        Schema::dropForeign('attribute_group_mappings_attribute_group_id_foreign');
    }
};
