<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use Illuminate\Http\Request;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Cost::all();
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
        $request->validate([
            'user_cost' => 'nullable|exists:users,id',
            'description' => 'nullable|string|max:255',
            'comment' => 'nullable|string|max:255',
            'amount' => 'required|integer',
            'cost_category_id' => 'nullable|exists:cost_categories,id',
        ]);

        $data  = Cost::create($request->all());
       return ['status'=>$data,'data'=>$data] ;
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
    public function update(Request $request, Cost $cost)
    {
        $request->validate([
            'shift_id' => 'required|exists:shifts,id',
            'user_cost' => 'nullable|exists:users,id',
            'description' => 'nullable|string|max:255',
            'comment' => 'nullable|string|max:255',
            'amount' => 'required|integer',
            'cost_category_id' => 'nullable|exists:cost_categories,id',
        ]);

       return ['status'=>$cost->update($request->all())] ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cost $cost)
    {
        return ['status'=>$cost->delete(),'data'=>$cost];
    }
}
