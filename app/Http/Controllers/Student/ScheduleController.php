<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    protected function id(){ return auth()->user()->id; }

    public function schedules()
    {
        $schedules = Schedule::where('student_id', $this->id())->get();

        return view('student.schedule.index', compact('schedules'));
    }
}
