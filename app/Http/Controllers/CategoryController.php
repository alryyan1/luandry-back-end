<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        return Category::all();
    }
    public function store(StoreCategoryRequest $request)
    {
        $validated =  $request->validated();
        // Create category with validated data
      $data =   Category::create($validated);

        return response()->json(['message' => 'Category created successfully','status'=>$data->fresh()]);
    }
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
    }
}
