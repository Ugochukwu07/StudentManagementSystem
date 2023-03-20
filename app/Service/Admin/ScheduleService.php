<?php
namespace App\Service\Admin;

use App\Models\Session;
use App\Models\Schedule;
use App\Models\Department;
use Illuminate\Support\Collection;

class ScheduleService{

    /**
     * allSchedules
     *
     * @return Collection
     */
    public function allSchedules():Collection
    {
        $departments = Department::all();
        $sessions = Session::all();

        $schedule_map = array();
        $schedules = array();
        foreach($departments as $department){
            $s_dept = [];
            foreach($sessions as $session){
                $schedule = Schedule::where('department_id', $department->id)->where('session_id', $session->id)->first();
                if($schedule && !in_array($schedule->id, $schedule_map))
                    array_push($schedule_map, $schedule->id);
                    array_push($schedules, $schedule);
            }
            
        }

        return collect($schedules);
    }

    /**
     * storeSchedule
     *
     * @param  mixed $data
     * @return Schedule
     */
    public function storeSchedule($data): Schedule
    {
        $schedule = Schedule::create([
            'session_id' => $data->session_id,
            'department_id' => $data->department_id,
            'course' => $data->course,
            'course_code' => $data->course_code,
            'start_time' => $data->start_time,
            'end_time' => $data->end_time,
            'day' => $data->day,
            'venue' => $data->venue,
            'lecture' => $data->lecture,
            'added_by' => auth()->user()->id
        ]);

        return $schedule;
    }

    /**
     * updateSchedule
     *
     * @param  mixed $data
     * @return Schedule
     */
    public function updateSchedule($data, $id): bool
    {
        $schedule = Schedule::where('id', $id)->update([
            'session_id' => $data->session_id,
            'department_id' => $data->department_id,
            'course' => $data->course,
            'course_code' => $data->course_code,
            'start_time' => $data->start_time,
            'end_time' => $data->end_time,
            'day' => $data->day,
            'venue' => $data->venue,
            'lecture' => $data->lecture,
            'added_by' => auth()->user()->id
        ]);

        return $schedule;
    }
}
