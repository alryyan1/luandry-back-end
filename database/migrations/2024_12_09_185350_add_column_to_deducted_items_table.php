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
        Schema::table('deducted_items', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Order::class)->constrained();
            $table->unique(['service_id','order_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deducted_items', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Order::class);
            $table->dropUnique(['service_id','order_id']);
        });
    }
};
