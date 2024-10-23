<?php

namespace App\Http\Controllers;

use App\Microservices\Category as CategoryMS;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        return response()->json(["status" => 200, "categories" => CategoryMS::list()]);
    }
}
