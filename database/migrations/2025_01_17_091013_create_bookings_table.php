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
        if (!Schema::hasTable('bookings')) {
            Schema::create('bookings', function (Blueprint $table) {
                $table->id();
                $table->date('booking_date');
                $table->date('start_date');
                $table->date('end_date');
                $table->decimal('total_price', 10,2);
                $table->enum('status', ['reserved','ongoing','completed','cancelled'])->default('reserved');
                $table->unsignedBigInteger('customer_id');
                $table->unsignedBigInteger('car_id');
                $table->unsignedBigInteger('driver_id');
                $table->timestamps();

                $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
                $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
                $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
