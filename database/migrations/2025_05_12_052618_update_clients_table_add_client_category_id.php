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
        Schema::table('clients', function (Blueprint $table) {
            $table->unsignedBigInteger('client_category_id')->nullable()->after('link');
            $table->foreign('client_category_id')->references('id')->on('client_categories')->onDelete('set null');

            // Optional: remove the old 'category' text field if no longer needed
            $table->dropColumn('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign(['client_category_id']);
            $table->dropColumn('client_category_id');

            // Optional: restore the old 'category' field if needed
            $table->text('category')->nullable();
        });
    }
};
