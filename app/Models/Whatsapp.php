<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Whatsapp
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Whatsapp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Whatsapp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Whatsapp query()
 * @mixin \Eloquent
 */
class Whatsapp extends Model
{
    use HasFactory;
    static string $token = '199su5ud5hyxz4dm';
    static string $instance = 'instance101527';
    public static function sendMsgWb( $mobile, $msg,$prefix = false)

    {
        if ($prefix){
        }else{
            $mobile = '968'. $mobile;
        }


        $token = self::$token;
        $instance = self::$instance;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ultramsg.com/$instance/messages/chat",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "", CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 5,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "token=$token&to=".$mobile."&body=" . $msg . "&priority=1&referenceId=",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return ["cURL Error" => $err];
        } else {
            return  ['status'=> $response,'show'=>true];
        }
    }
    public static function sendLocation($mobile,$lat='24.258777500463474',$lng='56.82232960262458')
    {

        $params=array(
            'token' => 'tqybmie1iogy3rbk',
            'to' => '+249991961111',
            'address' => 'ABC company \n Sixth floor , office 38',
            'lat' => '25.197197',
            'lng' => '55.2721877'
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ultramsg.com/instance101422/messages/location",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query($params),
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

//        $token = self::$token;
//        $instance = self::$instance;
//        $params = array(
//            'token' => "$token",
//            'to' => "$mobile",
//            'address' => 'Del Pasta',
//            'lat' => "25.197197",
//            'lng' => "55.2721877"
//        );
//        $curl = curl_init();
//        curl_setopt_array($curl, array(
//            CURLOPT_URL => "https://api.ultramsg.com/$instance/messages/chat",
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_ENCODING => "",
//            CURLOPT_SSL_VERIFYPEER => 0,
//            CURLOPT_MAXREDIRS => 10,
//            CURLOPT_TIMEOUT => 30,
//            CURLOPT_SSL_VERIFYHOST => 0,
//            CURLOPT_SSL_VERIFYPEER => 0,
//            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//            CURLOPT_CUSTOMREQUEST => "POST",
//            CURLOPT_POSTFIELDS => http_build_query($params),
//            CURLOPT_HTTPHEADER => array(
//                "content-type: application/x-www-form-urlencoded"
//            ),
//        ));
//
//        $response = curl_exec($curl);
//        $err = curl_error($curl);
//        curl_close($curl);
//
//        if ($err) {
//            return ["cURL Error" => $err];
//        } else {
//            return  ['message'=> $response,'show'=>true];
//        }


    }
    public static function  sendPdf($document, $phone,$prefix = false)
    {

        if ($prefix){
        }else{
            $mobile = '968'. $phone;
        }
        $instance = self::$instance;
        $token = self::$token;
        //Encodes data base64
        $img_base64 = base64_encode($document);
        //urlencode — URL-encodes string
        $img_base64 = urlencode($img_base64);
        ////////////
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ultramsg.com/$instance/messages/document",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "token=$token&to=$mobile&document=$img_base64&filename=report.pdf",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
}
