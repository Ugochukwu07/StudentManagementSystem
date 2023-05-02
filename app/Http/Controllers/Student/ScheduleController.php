<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\Profile;
use App\Models\Schedule;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Student\ScheduleService;

class ScheduleController extends Controller
{
    public function schedules()
    {
        $profile = Profile::where('user_id', $this->id())->first();
        $schedules = Schedule::where('department_id', $profile->department_id)->where('session_id', $profile->session_id)->get();
        $sortedSchedules = $schedules->sortBy(function($schedule){
            return [
                [$schedule->day, 'asc'],
                [$schedule->start_time, 'asc']
            ];
        });

        return view('admin.schedule.class', [
            'schedules' => $sortedSchedules
        ]);

        // return view('admin.schedule.class', compact('schedules'));
    }

    public function details($id)
    {
        $schedule = Schedule::find($id);
        return view('student.schedule.details', compact('schedule'));
    }
}
