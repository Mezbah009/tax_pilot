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
        Schema::table('home_first_sections', function (Blueprint $table) {
            $table->text('mission')->nullable()->after('logo');
            $table->text('vision')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_first_sections', function (Blueprint $table) {
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();
        });
    }
};
