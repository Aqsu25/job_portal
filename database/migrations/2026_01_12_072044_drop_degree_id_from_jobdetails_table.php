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
        Schema::table('jobdetails', function (Blueprint $table) {
            $table->dropForeign(['degree_id']);

            // Now drop the column
            $table->dropColumn('degree_id');

            $table->dropColumn('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobdetails', function (Blueprint $table) {
            $table->foreignId('degree_id')->constrained()->cascadeOnDelete();
        });
    }

};
