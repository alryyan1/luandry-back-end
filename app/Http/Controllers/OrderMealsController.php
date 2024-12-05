<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderMeal;
use App\Models\RequestedChildMeal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderMealsController extends Controller
{
    public function ordersInfoGraphic(Request $request)
    {
//        \DB::enableQueryLog();


        $month = $request->get('month');
        $from =  Carbon::now();
        $to =  Carbon::now();
        $day_of_month =  $from->setMonth($month)->startOfMonth();
        $end_of_month =  $to->setMonth($month)->endOfMonth();
        $outter = [];

        while ($day_of_month <= $end_of_month) {
            $new_data = [];

            $begin_of_day = $day_of_month->copy()->format('Y-m-d');;
            $data=  Order::whereRaw("DATE(created_at) = ? ", [$begin_of_day])
                ->get();
            $total_sales = 0;
            /** @var Order $d */
            foreach ($data as $d){

                $total_sales += $d->totalPrice();
            }
            array_push($outter, [
                'name'=>$day_of_month->format('d'),
                'sales'=>$total_sales
            ]);
            $day_of_month->addDay(1);
        }

       return $outter;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Sdtore a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $order = Order::find($request->order_id);
        if ($order->order_confirmed){
            return  response()->json(['status'=>false,'message'=>'لا يمكن تعديل بعد تاكيد الطلب'],404);
        }
      //  $orderMeal =  OrderMeal::where('meal_id',$request->meal_id)->where('order_id',$request->order_id)->first();
        $orderMeal =  OrderMeal::create($request->all());

//        $requestedChildController = new RequestedChildMealController();
//        $requestedChildController->store($request,$orderMeal);

        return ['status'=>$orderMeal,'order'=>$orderMeal->order->load('mealOrders.meal')];

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderMeal $orderMeal)
    {
        $order = $orderMeal->order;


        if ($order->order_confirmed ){
            return  response()->json(['status'=>false,'message'=>'لا يمكن تعديل بعد تاكيد الطلب'],404);
        }

        return ['status'=>$orderMeal->update($request->all()),'order'=>$orderMeal->load('order')->order];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderMeal $orderMeal)
    {
        $order = $orderMeal->load('order')->order;
        $result =  $orderMeal->delete();
        return ['status'=>$result,'order'=> $order->fresh()];
    }
}


