<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Exports\ExportOrder;
use App\Models\Order;
use App\Models\Meal;
use App\Models\OrderMeal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    // Get all orders
    public function index(Request $request)
    {
        if ($request->query('today')) {
            $today = Carbon::today();
            return Order::with('mealOrders.meal')->whereDate('created_at', $today)->orderByDesc('id')->get();

        } else {
            return Order::with('mealOrders.meal')->orderByDesc('id')->get();

        }
    }

    // Create a new order
    public function store(Request $request)
    {
        $today = Carbon::today();
        $user = auth()->user();
        /** @var Order $lastOrder */
        $lastOrder = Order::whereDate('created_at', '=', $today)->orderByDesc('id')->first();
        $new_number = 1;
        if ($lastOrder) {
            $new_number = $lastOrder->order_number + 1;
        }
        $order = Order::create(['order_number' => $new_number, 'user_id' => $user->id]);
        return response()->json(['status' => $order, 'data' => $order->load('mealOrders.meal')], 201,);
    }

    // Update order status
    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->update(['status' => $request->status]);
        return response()->json($order, 200);
    }

    public function update(Request $request, Order $order)
    {


        if ($request->get('order_confirmed')){

            if ($order->status == 'cancelled'){
                return response()->json(['status'=>false,'message'=>'يجب تغيير حاله  اولا '],404);
            }
            $amount_paid = $order->mealOrders->sum(function ($orderMeal) {
                return $orderMeal->meal->price * $orderMeal->quantity;
            });
            $order->amount_paid = $amount_paid;


        }elseif ($request->get('status') == 'cancelled'){
            $order->order_confirmed = 0;
            $order->amount_paid = 0;

        }

        $result = $order->update($request->all());
        return response()->json(['status' => $result, 'order' => $order->load('customer'),'show'=>$order->order_confirmed == true], 200);
    }


    // Get a specific order
    public function show($id)
    {
        return Order::find($id);
    }


    public function destroy(Request $request ,Order $order)
    {
        return ['status'=>$order->delete()];
    }

    public function exportExcel()
    {
        return Excel::download(new ExportOrder, 'orders.xlsx');
    }

}
