<?php

use App\Models\Customer;
use App\Models\OrderStatus;
use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Customer::class)->nullable();
            $table->string('order_number');
            $table->enum('payment_type', ['cash', 'card','transfer'])->default('cash');
            $table->double('discount')->default(0);
            $table->double('amount_paid',11,3)->default(0);
            $table->foreignIdFor(User::class);
            $table->string('notes')->default('');
            $table->date('delivery_date')->nullable();
            $table->dateTime('completed_at')->nullable();
            $table->boolean('order_confirmed')->default(0);
            $table->string('delivery_address')->default('');
            $table->string('special_instructions')->default('');
            $table->enum('status', ['pending', 'confirmed', 'in preparation', 'delivered', 'cancelled'])->default('pending');
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->boolean('is_delivery')->default(true);
            $table->decimal('delivery_fee', 8, 2)->default(0);
            $table->foreignIdFor(\App\Models\Address::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
