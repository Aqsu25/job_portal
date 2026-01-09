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
        Schema::create('applications', function (Blueprint $table) {
            
            $table->id();
            // Job seeker
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            // Job
            $table->foreignId('jobdetail_id')
                ->constrained('jobdetails')
                ->onDelete('cascade');

            // Employer (job owner)
            $table->foreignId('employer_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->timestamp('applied_date')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
