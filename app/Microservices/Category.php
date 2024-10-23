<?php

namespace App\Microservices;

use App\Models\Category as ModelsCategory;

class Category extends Microservice
{
    public static function list() 
    {
        return ModelsCategory::get();
    }
}
