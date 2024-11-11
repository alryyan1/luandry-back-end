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
        Schema::create('requested_child_meals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\OrderMeal::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\ChildMeal::class)->constrained();
            $table->integer('quantity')->default(1);
            $table->double('price',10,3)->default(1);
            $table->unique(['order_meal_id', 'child_meal_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requested_child_meals');
    }
};
