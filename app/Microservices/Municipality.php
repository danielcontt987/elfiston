<?php

namespace App\Microservices;

use App\Models\Municipality as ModelsMunicipality;

class Municipality extends Microservice
{

    public static function list() 
    {
        return ModelsMunicipality::get();
    }
    
}
