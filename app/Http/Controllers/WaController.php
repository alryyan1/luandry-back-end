<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Settings;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class WaController extends Controller
{
    public function sendMsg(Request $request,Order $order)
    {
        $meals_names = $order->orderMealsNames();
        $totalPrice = $order->totalPrice();
        /** @var Settings $settings */
        $settings = Settings::first();
        $msg = $settings->header_content;
        $client = new \GuzzleHttp\Client();
        try {

            $response = $client->post( 'https://waapi.app/api/v1/instances/32144/client/action/send-message', [
                'body' => json_encode([
                    'message' => $msg,
                    'chatId' => '249991961111@c.us',
                ]),
                'headers' => [
                    'accept' => 'application/json',
                    'authorization' => 'Bearer TkMjJdSCXophIf50uG91iG6xkIe3JhKABg2Z2lkB3b0575ea',
                    'content-type' => 'application/json',
                ],
            ]);
            $body = $response->getBody()->getContents();

            return ["Response" =>json_decode($body),'show'=>true,'message'=>json_decode($body)->status];
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $error = $e->getResponse()->getBody()->getContents();
                echo "Error: " . $error;
            } else {
                echo "Error: " . $e->getMessage();
            }
        }
    }
    public function sendLocation(Request $request,Order $order)
    {

        $client = new \GuzzleHttp\Client();
        try {

            $response = $client->post( 'https://waapi.app/api/v1/instances/32144/client/action/send-location', [
                'body' => json_encode([
                    'longitude' => 56.822308144953524,
                    'latitude' => 24.258748156049695,
                    'chatId' => '249991961111@c.us',
                ]),
                'headers' => [
                    'accept' => 'application/json',
                    'authorization' => 'Bearer TkMjJdSCXophIf50uG91iG6xkIe3JhKABg2Z2lkB3b0575ea',
                    'content-type' => 'application/json',
                ],
            ]);

            $body = $response->getBody()->getContents();

            return ["Response" =>json_decode($body),'show'=>true,'message'=>json_decode($body)->status];
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $error = $e->getResponse()->getBody()->getContents();
                echo "Error: " . $error;
            } else {
                echo "Error: " . $e->getMessage();
            }
        }


    }
    public function sendDocument(Request $request,$data)
    {
//        return $data;

        $client = new \GuzzleHttp\Client();
        try {



$client = new \GuzzleHttp\Client();

$response = $client->request('POST', 'https://waapi.app/api/v1/instances/32144/client/action/send-media', [
    'body' => json_encode(["mediaBase64"=>"$data","mediaName"=>"file.pdf","chatId"=>"249991961111@c.us"]),
    'headers' => [
        'accept' => 'application/json',
        'authorization' => 'Bearer TkMjJdSCXophIf50uG91iG6xkIe3JhKABg2Z2lkB3b0575ea',
        'content-type' => 'application/json',
    ],
]);
            $body = $response->getBody()->getContents();

            return ["Response" =>json_decode($body),'show'=>true,'message'=>json_decode($body)->status];
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $error = $e->getResponse()->getBody()->getContents();
                return "Error: " . $error;
            } else {
                return "Error: " . $e->getMessage();
            }
        }


    }
}
