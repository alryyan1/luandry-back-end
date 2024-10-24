<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Meal;

class OrderController extends Controller
{
    // Get all orders
    public function index()
    {
        return Order::all();
    }

    // Create a new order
    public function store(Request $request)
    {
        $meal = Meal::find($request->meal_id);
        if (!$meal) {
            return response()->json(['error' => 'Meal not found'], 404);
        }

        $total_price = $meal->price * $request->quantity;
        $order = Order::create([
            'meal_id' => $request->meal_id,
            'customer_name' => $request->customer_name,
            'status' => 'pending',
            'quantity' => $request->quantity,
            'total_price' => $total_price,
        ]);

        return response()->json($order, 201);
    }

    // Update order status
    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->update(['status' => $request->status]);
        return response()->json($order, 200);
    }

    // Get a specific order
    public function show($id)
    {
        return Order::find($id);
    }
}
