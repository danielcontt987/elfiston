<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $table = 'business';

    protected $fillable = [
        'name',
        'description',
        'sort_description',
        'phone',
        'email',
        'address',
        'lat',
        'long',
        'price',
        'municipality_id',
        'category_id',
    ];

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);   
    }

    public function category()
    {
        return $this->belongsTo(Category::class);   
    }

    public function service()
    {
        return $this->hasOne(Service::class, 'business_id', 'id');   
    }
}
