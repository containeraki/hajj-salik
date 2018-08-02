<?php

namespace App\Http\Controllers;

use App\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackController extends Controller
{
    public function index()
    {
        $shipment_id = 1;

        return (new Track())->where('shipment_id', $shipment_id)->get();
    }
}
