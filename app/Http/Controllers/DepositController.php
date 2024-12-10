<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function store (Request $request)
    {
        $result = Deposit::create($request->all());
        return ['result'=>$result,'show'=>true];

    }


}
