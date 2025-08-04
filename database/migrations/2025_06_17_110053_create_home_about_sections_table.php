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
        Schema::create('home_about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->nullable(); // e.g., "Empowering Smarter HR Management"
            $table->string('subheading')->nullable(); // e.g., "Get more from your HR and Payroll system"
            $table->text('description')->nullable(); // detailed paragraph
            $table->string('brochure')->nullable(); // PDF file path
            $table->string('image')->nullable(); // Image path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_about_sections');
    }
};
