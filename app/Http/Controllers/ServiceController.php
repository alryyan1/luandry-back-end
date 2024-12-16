<?php

namespace App\Http\Controllers;

use App\Models\ChildMeal;
use App\Models\Meal;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return Service::all();
    }
    public function store(Request $request)
    {
        return Service::create($request->all());
    }
    public function update(Request $request, Service $service)
    {
        $service->update($request->all());
    }
    public function defineServices(Request $request,Meal $meal)
    {
        $sevices = Service::all();
        foreach ($sevices as $service){
            ChildMeal::create([
                    'name'=>$service->name,
                'quantity'=>1,
                'meal_id'=>$meal->id,
                'price'=>0
            ]);
        }
        return ['data'=>$meal->load('childMeals'),'show'=>true];
    }
}
