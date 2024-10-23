<?php

namespace App\Microservices;

use App\Models\Business as ModelsBusiness;

class Business extends Microservice
{
    public static function list()
    {
        
        return ModelsBusiness::with(['category'])->with(['municipality'])->with(['service'])->get();
    }
}
