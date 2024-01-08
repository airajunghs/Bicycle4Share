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
        Schema::table('complaints', function (Blueprint $table) {
            $table->string('StudentID')->nullable();
        });

        Schema::table('penalties', function (Blueprint $table) {
            $table->string('StudentID')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->dropColumn('StudentID');
        });

        Schema::table('penalties', function (Blueprint $table) {
            $table->dropColumn('StudentID');
        });
    }
};
