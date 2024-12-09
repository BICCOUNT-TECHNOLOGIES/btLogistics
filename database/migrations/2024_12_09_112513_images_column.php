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
        //
        Schema::table('images', function (Blueprint $table) {
            $table->string('imagepath')->nullable(); // Add the 'category' column
        });      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn('imagepath'); // Remove the 'category' column if rolled back
        });

    }
};
