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
        Schema::table('products', function (Blueprint $table) {
            // Remove unused columns
            $table->dropColumn('button_name');
            $table->dropColumn('fin_cat');

            // Add new status and relationships
            $table->boolean('status')->default(true)->after('meta_keywords');

            $table->foreignId('category_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('sub_category_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('sub_sub_category_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Revert the changes
            $table->string('button_name')->nullable();
            $table->string('fin_cat')->nullable();

            $table->dropColumn('status');

            $table->dropForeign(['category_id']);
            $table->dropForeign(['sub_category_id']);
            $table->dropForeign(['sub_sub_category_id']);

            $table->dropColumn(['category_id', 'sub_category_id', 'sub_sub_category_id']);
        });
    }

};
