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
        Schema::table('child_meals', function (Blueprint $table) {
            $table->double('price')->default(0);
            $table->string('people_count')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('child_meals', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('people_count');
        });
    }
};
