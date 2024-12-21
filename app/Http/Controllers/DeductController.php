<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Deduct;
use App\Models\Order;
use App\Models\OrderMeal;
use App\Models\RequestedChildMeal;
use App\Models\Service;
use Illuminate\Http\Request;
use function Psy\debug;

class DeductController extends Controller
{
    public function store(Request $request,Customer $customer)
    {
        \DB::beginTransaction();

        Deduct::create(['service_id'=>$request->get('service_id'),'quantity'=>$request->get('quantity') ,'customer_id'=>$customer->id]);

        \DB::commit();
        // return ['order'=>$order->fresh(),'show'=>true];
    }
}
