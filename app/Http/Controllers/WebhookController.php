<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Whatsapp;
use Illuminate\Http\Request;

class WebHookController extends Controller
{
    public function webhook(Request $request)
    {

        $data = file_get_contents("php://input");
        $event = json_decode($data, true);
//        Whatsapp::sendMsgWb('96878622990','from web api');
        if(isset($event)){
            //Here, you now have event and can process them how you like e.g Add to the database or generate a response
            $file = 'log.txt';

            $data =json_encode($event)."\n";
            $from = $event["data"]["from"];
            $msg = $event["data"]["body"];
            $from_sms =  str_replace("c.us","",$from);
            $from_sms =  str_replace("@","",$from_sms);
            $pdfController = new PDFController();
            if ($msg === 'report'){
               // $pdfController->shipping($request,$from_sms);

            }
            Whatsapp::sendMsgWb($from_sms,$msg,true);

            $last_order = Order::whereHas('customer',function($q) use ($from_sms){
                $q->where('phone',substr($from_sms,3));

            })->orderByDesc('id')->first();
            if ($last_order){
                $customer_name = $last_order?->customer?->name;


                $msg = <<<TXT
مرحبا  عزيزي $customer_name

يرجي كتابه لوحه سيارتك

TXT;
//
                if ($last_order->status == 'delivered'){

                }else{
                    Whatsapp::sendMsgWb($from_sms,$msg,true);

                }
            }


//            Whatsapp::sendMsgWb($from_sms,$from_sms);
//            Whatsapp::sendMsgWb($from_sms,substr($from_sms,3));


            file_put_contents(storage_path() .  $file, $data, FILE_APPEND | LOCK_EX);


        }


    }
}
