<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::orderBy('ar_name')->get();
        return view('items',compact('items'));
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
    public function store(ItemRequest $request)
    {
        $item = new Item();
        $item->ar_name = $request->ar_name;
        $item->en_name = $request->en_name;
        $item->save();

        return redirect('items')->with('message','تم إنشاء الصنف');;

    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemRequest $request)
    {
        $item =  Item::find($request->item_id);
        $item->ar_name = $request->ar_name;
        $item->en_name = $request->en_name;
        $item->update();

        return redirect('items')->with('message','تم تعديل الصنف');;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $item)
    {
        Item::where('id',$item)->delete();

        return redirect('items')->with('message','تم حذف الصنف');;
    }
}
