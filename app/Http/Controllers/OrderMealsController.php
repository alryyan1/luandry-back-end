<?php

namespace App\Http\Controllers;

use App\Models\OrderMeal;
use Illuminate\Http\Request;

class OrderMealsController extends Controller
{
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data =  OrderMeal::create($request->all());
        return ['status'=>$data,'order'=>$data->order->load('mealOrders.meal')];
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


