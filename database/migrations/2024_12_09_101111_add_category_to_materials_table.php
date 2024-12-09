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
        Schema::table('materials', function (Blueprint $table) {
            //
            Schema::table('materials', function (Blueprint $table) {
                $table->string('category'); // Add the 'category' column
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            //

            Schema::table('materials', function (Blueprint $table) {
                $table->dropColumn('category'); // Remove the 'category' column if rolled back
            });
        });
    }
};
