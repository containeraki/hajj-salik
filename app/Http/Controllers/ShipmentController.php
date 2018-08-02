<?php

namespace App\Http\Controllers;

use App\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShipmentController extends Controller
{
    //
    public function index()
    {
        $current_user = Auth::guard('api')->user()->id;

        return (new Shipment())->where('user_id', $current_user)->get();
    }
}
