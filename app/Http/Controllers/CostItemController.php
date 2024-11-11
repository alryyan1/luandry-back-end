<?php

namespace App\Http\Controllers;

use App\Models\CostItem;
use App\Http\Controllers\Controller;
use App\Models\Cost;
use App\Models\CostCategory;
use App\Models\Item;
use App\Models\Supplier;
use Illuminate\Http\Request;

class CostItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $costs = Cost::select('costs.*','suppliers.name as supplier_name','cost_categories.name as category')
        ->leftJoin('cost_categories','cost_categories.id','costs.cost_category_id')
        ->leftJoin('suppliers','suppliers.id','costs.supplier_id')
        ->orderBy('costs.id', 'DESC')->get();
        return view('costs',compact('costs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['items'] = Item::orderBy('ar_name')->get();
        $data['categories'] = CostCategory::orderBy('name')->get();
        $data['suppliers'] = Supplier::orderBy('name')->get();

        return view('createItem',$data);
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
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'cost_category_id' => 'nullable|exists:cost_categories,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
        ]);

        $cost  = Cost::create($request->all());

        //cost item
        $items = $request->item;
        $prices = $request->price;
        $quantities = $request->quantity;
        $full_prices = $request->full_price;

        foreach ($items as $key => $item){
            $costItem = new CostItem();
            $costItem->cost_id = $cost->id;
            $costItem->item_id = $item;
            $costItem->quantity = $quantities[$key];
            $costItem->price = $prices[$key];
            $costItem->full_price = $full_prices[$key];
            $costItem->save();
        }
        return redirect('costs')->with('message','تم حفظ المصروف');

    }

    /**
     * Display the specified resource.
     */
    public function show(CostItem $costItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CostItem $costItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CostItem $costItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $costItem)
    {
        Cost::where('id',$costItem)->delete();

        return redirect('costs')->with('message','تم حذف المصروف');
    }

    public function itemReport(Request $request)
    {
        $data['items'] = Item::orderBy('ar_name')->get();

        if($request->item_id)
        {
            $data['item_info'] = Item::find($request->item_id);
            $data['costs'] = CostItem::where('item_id',$request->item_id)->get();
        }


        return view('itemReport',$data);
    }
}
