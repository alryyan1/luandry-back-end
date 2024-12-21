<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use App\Models\Order;
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
        return response()->json($meal->fresh(), 201);
    }
    public function getFileNamesFromPublicFolder()
    {
        // Define the path to the public folder
        $folderPath = public_path().'//images';

        // Get all file names in the folder
        $files = \File::files($folderPath);

        // Extract file names from the full paths
        $fileNames = array_map(function ($file) {
            return $file->getFilename();
        }, $files);

        return $fileNames;
    }
    public function index()
    {
        return Meal::with('category')->orderByDesc('id')->get();
    }
    public function saveImage(Request|null $request,Meal $meal)
    {
        // Example Base64 string input (from a request)
       $base64String = $request->input('image'); // Replace 'image' with the correct key from your form
        // $base64String = $meal->image; // Replace 'image' with the correct key from your form

        // Check if the string has a data prefix (e.g., "data:image/png;base64,")
        if (preg_match('/^data:image\/(\w+);base64,/', $base64String, $matches)) {
            $fileType = $matches[1]; // Extract image type (e.g., png, jpeg)
            $base64String = substr($base64String, strpos($base64String, ',') + 1); // Remove the prefix
        } else {
            return response()->json(['error' => 'Invalid base64 string'], 400);
        }

        // Decode Base64 to binary data
        $imageData = base64_decode($base64String);

        // Ensure decoding was successful
        if (!$imageData) {
            return response()->json(['error' => 'Invalid base64 data'], 400);
        }

        // Generate a unique file name
        $fileName = uniqid() . '.' . $fileType;

        // Define the storage path (e.g., 'public/images')
        $filePath = public_path('images/' . $fileName);
//        $meal->image = $filePath;
        $meal->update(['image_url'=>$fileName]);

        // Save the image to the specified path
        file_put_contents($filePath, $imageData);

//        return response()->json([
//            'message' => 'Image saved successfully',
//            'file_path' => url('images/' . $fileName),
//            'show'=>true
//        ]);
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
        $data =  Meal::destroy($id);
        return response()->json(['status'=>$data], 204);
    }
}
