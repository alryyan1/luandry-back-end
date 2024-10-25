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
            $table->foreignIdFor(Customer::class);
            $table->foreignIdFor(\App\Models\Shift::class);
            $table->string('order_number');
            $table->enum('payment_type', ['cash', 'card','transfer']);
            $table->double('discount');
            $table->double('amount_paid',11,3);
            $table->foreignIdFor(User::class);
            $table->string('notes')->nullable();
            $table->date('delivery_date')->nullable();
            $table->dateTime('completed_at')->nullable();
            $table->string('delivery_address');
            $table->string('special_instructions');
            $table->enum('status', ['pending', 'confirmed', 'in preparation', 'delivered', 'cancelled'])->default('pending');
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->boolean('is_delivery')->default(true);
            $table->decimal('delivery_fee', 8, 2)->nullable();
            $table->foreignIdFor(\App\Models\Address::class);
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
