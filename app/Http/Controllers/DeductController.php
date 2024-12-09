<?php

namespace App\Http\Controllers;

use App\Models\Deduct;
use App\Models\Order;
use App\Models\OrderMeal;
use App\Models\RequestedChildMeal;
use Illuminate\Http\Request;
use function Psy\debug;

class DeductController extends Controller
{
    public function store(Request $request,Order $order)
    {
        \DB::beginTransaction();
        if (!$request->add){

            return ['show'=>Deduct::where('order_id','=',$order->id)->delete(),'order'=>$order->fresh()];
        }
         /** @var OrderMeal $mealOrder */
        foreach ($order->mealOrders as $mealOrder){

            /** @var RequestedChildMeal $requestedChildMeal */
            foreach ($mealOrder->requestedChildMeals as $requestedChildMeal){
                Deduct::create(['child_meal_id'=>$requestedChildMeal->child_meal_id,'quantity'=>$requestedChildMeal->quantity * $requestedChildMeal->count,'order_id'=>$order->id]);
            }
        }

        \DB::commit();
        return ['order'=>$order->fresh(),'show'=>true];
    }
}
