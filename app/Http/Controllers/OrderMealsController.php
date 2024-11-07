<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderMeal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderMealsController extends Controller
{
    public function ordersInfoGraphic()
    {
//        \DB::enableQueryLog();


        $today =  Carbon::today();
       $lastWeek =  Carbon::today()->subDays(7);
       $data=  Order::select([
            \DB::raw('DATE(created_at) as date'),
            \DB::raw('SUM(amount_paid) as amount_paid'),
            \DB::raw('COUNT(id) as id_count')
        ])
            ->whereRaw("DATE(created_at) BETWEEN ? AND ?", [$lastWeek, $today])
            ->groupBy('date')
            ->get();
       $new_data = [];
       foreach ($data as $d){
           $innerArray = [
             'name'=>Carbon::parse($d->date)->format('l'),
             'sales'=>$d->amount_paid
           ];
           $new_data[] = $innerArray;
       }
       return $new_data;
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
       $orderMeal =  OrderMeal::where('meal_id',$request->meal_id)->where('order_id',$request->order_id)->first();
       if ($orderMeal){
           return ['status'=>$orderMeal->update(['quantity'=>$orderMeal->quantity + 1]),'order'=>$orderMeal->order->load('mealOrders.meal')];

       }else{
           $data =  OrderMeal::create($request->all());
           return ['status'=>$data,'order'=>$data->order->load('mealOrders.meal')];
       }

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
        if ($order->order_confirmed){
            return  response()->json(['status'=>false,'message'=>'لا يمكن تعديل بعد تاكيد الطلب'],404);
        }
        if ($request->get('quantity') == 0 ){
            $order = $orderMeal->load('order')->order;
           $result =  $orderMeal->delete();
            return ['status'=>$result,'order'=> $order->fresh()];

        }
        return ['status'=>$orderMeal->update($request->all()),'order'=>$orderMeal->load('order')->order];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}


