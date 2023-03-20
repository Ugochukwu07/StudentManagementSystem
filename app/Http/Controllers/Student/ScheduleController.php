<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Service\Student\ScheduleService;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function schedules()
    {
        $schedules = (new ScheduleService())->getSchedules($this->id());

        return view('student.schedule.index', compact('schedules'));
    }

    public function details($id)
    {
        $schedule = Schedule::find($id);
        return view('student.schedule.details', compact('schedule'));
    }
}
