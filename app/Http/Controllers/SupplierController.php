<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('name')->get();

        return view('suppliers',compact('suppliers'));
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
            'name' => 'required|string',
            'phone' => 'nullable|string'
        ]);

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->save();

        return redirect('suppliers')->with('message','تم حفظ بيانات المورد');


    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'name' => 'required|string',
            'phone' => 'nullable|string'
        ]);

        $supplier =  Supplier::find($request->supplier_id);
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->update();

        return redirect('suppliers')->with('message','تم تعديل بيانات المورد');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $supplier)
    {
        Supplier::where('id',$supplier)->delete();

        return redirect('suppliers')->with('message','تم حذف بيانات المورد');

    }
}
