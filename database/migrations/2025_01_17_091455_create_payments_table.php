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
        if (!Schema::hasTable('payments')) {
            Schema::create('payments', function (Blueprint $table) {
                $table->id();
                $table->date('payment_date');
                $table->decimal('amount', 10, 2);
                $table->enum('method', ['cash','online']);
                $table->enum('status', ['pending','completed','failed'])->default('pending');
                $table->unsignedBigInteger('booking_id');
                $table->timestamps();

                $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
