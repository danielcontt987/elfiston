<?php

namespace App\Microservices;
use App\Models\ScheduleService;

class Schedule extends Microservice
{
    public static function list($id) 
    {
        return ScheduleService::where('id', $id)->get();
    }

    public static function get($id) 
    {
        return ScheduleService::where('id', $id)->first();
    }

    public static function store($request) 
    {
        $hour = $request->hour;
        $split = explode(":",$hour);

        $hour = $request->hour;
        $split = explode(":",$hour);

        return ScheduleService::create([
            'service_id' => $request->service_id,
            'schedule_at' => $request->date . ' ' . $request->hour . ':00',
            'date' => $request->date,
            'hour' => $split[0],
        ]);
    }
}
