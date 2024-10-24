<?php

namespace App\Http\Controllers;

use App\Microservices\Schedule as ScheduleMS;
use App\Models\ScheduleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function list(Request $request) 
    {
       return response()->json(["status" => 200, "schedules" => ScheduleMS::list($request->id)], 200);
    }

    public function store(Request $request) 
    {
        try {
            $hour = $request->hour;
            $split = explode(":",$hour);

            $schedule = DB::table('schedule_services')
            ->where('service_id', 1)
            ->where('date', $request->date)
            ->where('hour', $split[0])
            ->first();


            if (isset($schedule)) {
                return response()->json(["status" => 401, "msg" => "Ya se encentra reservado, favor de elegir otro día"], 401);
            }
            return response()->json(["status" => 200, "schedules" => ScheduleMS::store($request)], 200);
        } catch (\Exception $e) {
            return response()->json(["status" => 500, "error" => $e->getMessage()], 500);
        }
    }
}
