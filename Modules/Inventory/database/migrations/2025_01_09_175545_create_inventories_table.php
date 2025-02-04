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
        Schema::create('inventories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_number');
            $table->string('contact_fax')->nullable();
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('street');
            $table->string('postal_code');
            $table->integer('priority')->default(0);
            $table->decimal('latitude',10,5)->default(0);
            $table->decimal('longitude',10,5)->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
