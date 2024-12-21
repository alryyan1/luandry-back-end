<?php

use App\Models\Customer;
use App\Models\Order;
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
            $table->foreignIdFor(Customer::class)->constrained();
            $table->dropForeignIdFor(Order::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deducted_items', function (Blueprint $table) {
            $table->dropForeignIdFor(Customer::class);
            $table->foreignIdFor(Order::class)->constrained();
        });
    }
};
