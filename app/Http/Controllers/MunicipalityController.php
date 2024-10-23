<?php

namespace App\Http\Controllers;

use App\Microservices\Municipality;

class MunicipalityController extends Controller
{
    public function list()
    {
        $municipality = Municipality::list();
        return response()->json(['status' => 200, 'municipality' => $municipality], 200);
    }
}
