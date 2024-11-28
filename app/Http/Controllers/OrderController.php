<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Exports\ExportOrder;
use App\Models\Order;
use App\Models\Meal;
use App\Models\OrderMeal;
use App\Models\Settings;
use App\Models\Whatsapp;
use Carbon\Carbon;
use Hamcrest\Core\Set;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDO;

class OrderController extends Controller
{
    public function pagination(Request $request, $page)
    {
//        \DB::enableQueryLog();
        $query = Order::query();
        $query->with('mealOrders.meal');
        $name = $request->get('name');
        $query->when($request->name,function (Builder $q) use ($name){
            $q->whereHas('customer',function ( $q)  use($name){
                $q->where('name','like',"%$name%")->orWhere('area','like',"%$name%")->orWhere('state','like',"%$name%");
            });
        });
        $query->when($request->delivery_date,function (Builder $q) use ($request){
                $q->where('delivery_date','=',$request->delivery_date);
        });
//        return ['data'=> $query->orderByDesc('id')->paginate($page) , 'analytics'=> \DB::getQueryLog()];
        return $query->orderByDesc('id')->paginate($page);


    }
    public function send(Request $request,Order $order)
    {
        if ($order->customer == null){
            return response()->json(['status'=>false,'message'=>'يجب تحديد الزبون   اولا '],404);
        }
        $meals_names = $order->orderMealsNames();
        $totalPrice = $order->totalPrice();
//        $msg = <<<TEXT
//اهلاً وسهلاً ،
//اختيارك يشرّفنا، تجربة مميزة ولذيذة إن شاء الله .
//
//
//تكرماً : إيداع المبلغ لإعتماد الطلب
//
//0345043777450011
//منى العيسائي
//بنك مسقط
//
//تحويل سريع
//95519234
//
//الفاتوره  $totalPrice ريال
//TEXT;

      return  Whatsapp::sendPdf($request->get('base64'),$order->customer->phone);

    }
    public function sendMsg(Request $request,Order $order)
    {
        if ($order->customer == null){
            return response()->json(['status'=>false,'message'=>'يجب تحديد الزبون   اولا '],404);
        }
        $meals_names = $order->orderMealsNames();
        $totalPrice = $order->totalPrice();
        /** @var Settings $settings */
        $settings = Settings::first();
        $msg = $settings->header_content;

      return  Whatsapp::sendMsgWb($order->customer->phone,$msg);

    }
    public function orderMealsStats(Request $request)
    {
        $pdo = \DB::getPdo();
        $date =  $request->get('date');
//        $query = ;
        $data =  $pdo->query("SELECT meals.name as mealName, child_meals.name as childName,   SUM(child_meals.quantity) as totalQuantity FROM `requested_child_meals`
    JOIN child_meals  on child_meals.id = requested_child_meals.child_meal_id
    join order_meals  on order_meals.id = requested_child_meals.order_meal_id
    join meals  on meals.id = child_meals.meal_id
    join orders on orders.id = order_meals.order_id
                                            WHERE orders.delivery_date = '$date' GROUP by child_meals.id,child_meals.name,meals.name")->fetchAll();
//        \DB::table('requested_child_meals')
        return response()->json($data);
    }
    public function orderConfirmed(Request $request , Order $order)
    {

    }
    // Get all orders
    public function index(Request $request)
    {
        if ($request->query('today')) {
            $today = Carbon::today();
            return Order::with(['mealOrders.meal','mealOrders'=>function ($q) {
                $q->with('requestedChildMeals.orderMeal');
            }])->whereDate('created_at', $today)->orderByDesc('id')->get();

        } else {
            return Order::with('mealOrders.meal')->orderByDesc('id')->get();

        }
    }

    // Create a new order
    public function store(Request $request)
    {
        $today = Carbon::today();
        $user = auth()->user();
        /** @var Order $lastOrder */
        $lastOrder = Order::whereDate('created_at', '=', $today)->orderByDesc('id')->first();
        $new_number = 1;
        if ($lastOrder) {
            $new_number = $lastOrder->order_number + 1;
        }
        $order = Order::create(['order_number' => $new_number, 'user_id' => $user->id,'delivery_date'=>$today]);

        return response()->json(['status' => $order, 'data' => $order->load(['mealOrders.meal','mealOrders'])], 201,);
    }

    // Update order status
    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->update(['status' => $request->status]);
        return response()->json($order, 200);
    }

    public function update(Request $request, Order $order)
    {

        if ($request->amount_paid > $order->totalPrice()){
            return response()->json(['status'=>false,'message'=>'عمليه خاطئه'],404);
        }
        if ($request->get('order_confirmed')) {
        }
            if ($request->get('order_confirmed')){

            if ($order->customer == null){
                return response()->json(['status'=>false,'message'=>'يجب تحديد الزبون   اولا '],404);
            }
            if ($order->status == 'cancelled'){
                return response()->json(['status'=>false,'message'=>'يجب تغيير حاله  اولا '],404);
            }
//            return  $request->get('amount_paid');


            $order->amount_paid = $order->totalPrice();
            $order->status = 'confirmed';


        }elseif ($request->get('status') == 'cancelled'){
            $order->order_confirmed = 0;
            $order->amount_paid = 0;

        }

        $result = $order->update($request->all());
        return response()->json(['status' => $result, 'order' => $order->load('customer'),'show'=>$order->order_confirmed == true], 200);
    }


    // Get a specific order
    public function show($id)
    {
        return Order::find($id);
    }


    public function destroy(Request $request ,Order $order)
    {
        return ['status'=>$order->delete()];
    }

    public function exportExcel()
    {
        return Excel::download(new ExportOrder, 'orders.xlsx');
    }

}
