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
        Schema::create('jobdetails', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('vacancy');
            $table->string('salary')->nullable();
            $table->string('location');
            $table->text('description')->nullable();
            $table->text('benefits')->nullable();
            $table->text('responsibility')->nullable();
            $table->text('qualifications')->nullable();
            $table->string('experience');
            $table->integer('status')->default(1);
            $table->integer('isFeatured')->default(0);
            $table->text('keywords')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('type_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobdetails');
    }
};
