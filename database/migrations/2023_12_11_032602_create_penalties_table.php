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
        Schema::create('penalties', function (Blueprint $table) {
            $table->id();
            // json untuk longtext  for notification
            $table->json('NotifID')->nullable();
            $table->string('PenaltyID')->nullable();
            $table->string('currentDate');
            $table->string('currentTime');
            $table->string('PenaltyAmount');
            $table->string('PenaltyDescription')->nullable();
            $table->string('PenaltyStatus')->default('In Process');
            $table->string('PenaltyAccount')->nullable();
            $table->string('PenaltyReceiptFile')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penalties');
    }
};

// $table->string('PenaltyAmount')->default('RM 0.00');
