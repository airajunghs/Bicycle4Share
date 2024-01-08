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
        Schema::create('notifications_messages', function (Blueprint $table) {
            $table->id();
            $table->string('NotifID')->nullable();
            $table->string('NotifMessage')->nullable();
            $table->string('StudentID')->nullable();
            $table->string('StaffID')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications_messages');
    }
};
