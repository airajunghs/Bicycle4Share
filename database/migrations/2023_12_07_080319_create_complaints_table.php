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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            // json untuk longtext, takde limit untuk penalty. PenaltyID jadi FK dalam complaint sebab complaint is main table
            $table->json('PenaltyID')->nullable();
            $table->string('bicycleID')->nullable();
            $table->bigInteger('userID');
            $table->string('complaintID')->nullable();
            $table->string('currentDate');
            $table->string('currentTime');
            $table->string('phoneNum');
            $table->string('complaint')->nullable();
            $table->string('status')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
