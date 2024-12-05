<?php

namespace App\Http\Controllers;

use App\Http\Requests\MealRequest;
use App\Models\ChildMeal;
use Illuminate\Http\Request;

class ChildMealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
    public function store(MealRequest $request)
    {
        $validated = $request->validated();
        $data =  ChildMeal::create($validated);
        return ['status'=>$data,'data'=>$data->load('meal')->meal];
    }

    /**
     * Display the specified resource.
     */
    public function show(ChildMeal $childMeal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChildMeal $childMeal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChildMeal $childMeal)
    {
        $result = $childMeal->update($request->all());
        return ['data'=>$childMeal->meal,  'result'=>$result];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChildMeal $childMeal)
    {
        return ['status'=>$childMeal->delete(),'data'=>$childMeal->meal];

    }
}
