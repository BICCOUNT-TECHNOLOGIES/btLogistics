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
            //// Drop the existing foreign key constraint that uses 'SET NULL'
            $table->dropForeign(['manufacturer_id']);

            // Re-add the foreign key constraint without 'SET NULL'
            // You can change 'restrict' to 'cascade' or another option if needed
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            //
            $table->dropForeign(['manufacturer_id']);

            // Re-add the original foreign key with 'SET NULL'

        });
    }
};
