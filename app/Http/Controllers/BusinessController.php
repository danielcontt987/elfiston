<?php

namespace App\Http\Controllers;

use App\Microservices\Business as BusinessMS;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function list()
    {
        return response()->json(["status" => 200, "business" => BusinessMS::list()]);
    }
}
