<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Reservation::all();
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
