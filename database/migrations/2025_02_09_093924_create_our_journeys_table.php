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
        Schema::create('our_journeys', function (Blueprint $table) {
            $table->id();
            $table->year('year'); // Stores the year of the milestone (e.g., 2012)
            $table->string('title'); // Stores the title of the milestone
            $table->string('image')->nullable(); // Stores the image path (nullable in case there is no image)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_journeys');
    }
};
