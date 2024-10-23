<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'user_id',
        //Mesero
        'experience',
        'skills',
        'additional_waiters',
        'hour_work',
        'is_waiter',
        //Cocina
        'local_type',
        'service_include',
        'is_kitchen',
        'is_waiter_kitchen',
        'qty_waiter',
        'is_banquets',
        'banquet_include',
        'is_drink_open',
        'drink_open',
        'is_dance_floor',
        'is_waiting_room',
        'is_bricolin',
        'bricolin_c',
        'is_children_area',
        'children_area_c',
        'is_green_area',
        'kitchen_c',
        //Musica
        'is_music',
        //Musica Y Alimentos
        'is_others',
        'is_food',
        'description',
        'extras',
        'price',
        'extra_price',
        'images',
    ];
}
