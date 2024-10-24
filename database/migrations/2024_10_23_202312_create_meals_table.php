<?php

use App\Models\Category;
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
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('price');
            $table->foreignIdFor(Category::class)->constrained();
            $table->string('description');
            $table->longText('image');
            $table->boolean('available')->default(true);
            $table->integer('calories')->nullable();
            $table->integer('prep_time')->nullable(); // in minutes
            $table->tinyInteger('spice_level')->nullable(); // Scale of 1-5
            $table->boolean('is_vegan')->default(false);
            $table->boolean('is_gluten_free')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
