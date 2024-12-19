<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Ramsey\Collection\Collection;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::has('mealOrders')->where('delivery_date','!=',null)->get();
        $food_reservations = [];
        /** @var Order $order */
        foreach ($orders as $order){

            $ordersMeals = $order->orderMealsNames();
            $name = $order?->customer?->name;
            $address = $order?->customer?->area . ' '. $order?->customer?->state . ' ';
            $phone = $order?->customer?->phone;
            $status = $order?->status;
            $draft = $order?->draft;
            $message = <<<TEXT
الاسم:               $name

العنوان:                    $address

رقم الهاتف:                    $phone

حاله الطلب :                    $status

الطلبات:
$ordersMeals

المسودة:
$draft
TEXT;
            $fr = ['id'=>$order->id,'title'=>$message,'start'=>$order->delivery_date,'end'=>$order->delivery_date];
            $food_reservations[] = $fr;
        }
        $reservations = Reservation::all();
        return  ['reservations'=>$reservations,'orderReservations'=>$food_reservations];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'start' => 'required',
            'end' => 'required|after_or_equal:start',
        ]);

        $formattedStart = Carbon::parse($request->start)->format('Y-m-d H:i:s');
        $formattedEnd = Carbon::parse($request->end)->format('Y-m-d H:i:s');
        $reservation = Reservation::create([
            'title' => $request->title,
            'start' => $formattedStart,
            'end' => $formattedEnd,
        ]);
        return ['status'=>$reservation ,'data'=>$reservation];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update($request->all());
        return $reservation;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {

        return response()->json(['status'=> $reservation->delete()]);
    }
}
