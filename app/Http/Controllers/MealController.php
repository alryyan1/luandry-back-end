<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function store(Request $request)
    {
//        Meal::create([
//            'name' => 'Spaghetti Carbonara',
//            'description' => 'Creamy pasta with bacon and egg',
//            'price' => 12.99,
//            'image' => 'images/meals/spaghetti-carbonara.jpg',
//            'available' => true,
//            'category_id' => 1, // Assuming category ID 1 is "Main Course"
//            'calories' => 550,
//            'prep_time' => 20,
//            'spice_level' => 2,
//            'is_vegan' => false,
//            'is_gluten_free' => false
//        ]);
        $meal = Meal::create($request->all());
        return response()->json($meal, 201);
    }
    public function index()
    {
        return Meal::all();
    }



    // Show a specific meal
    public function show($id)
    {
        return Meal::find($id);
    }

    // Update a meal
    public function update(Request $request, $id)
    {
        $meal = Meal::find($id);
        $meal->update($request->all());
        return response()->json($meal, 200);
    }

    // Delete a meal
    public function destroy($id)
    {
        Meal::destroy($id);
        return response()->json(null, 204);
    }
}
