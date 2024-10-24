<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ScheduleService extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'service_id',
        'schedule_at',
        'date',
        'hour'
    ];
}
