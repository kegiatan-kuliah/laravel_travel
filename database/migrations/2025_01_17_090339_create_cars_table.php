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
        if (!Schema::hasTable('cars')) {
            Schema::create('cars', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);
                $table->string('license_number', 20);
                $table->enum('type',['sedan','suv','van','bus']);
                $table->unsignedBigInteger('capacity');
                $table->decimal('price_per_day', 10, 2);
                $table->enum('status',['available','booked','maintenance'])->default('available');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
