<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function update(Request $request){
        $data =  $request->all();
        $rows  =   Settings::all()->count();
        if ($rows ==  0 ){
            Settings::create();
        }

        return ['result'=> Settings::all()->first()->update([$data['colName']=>$data['data']])];
    }
    public function index(Request $request){

        return  Settings::all()->first();
    }



}
