<?php
namespace App\Service\Student;

use App\Models\User;
use App\Models\Profile;
use App\Models\Schedule;
use Illuminate\Support\Collection;

class ScheduleService{
    /**
     * sort schedules By Time Start
     *
     * @param  array $data
     * @return Collection
     */
    public function sortByTime(array $data): Collection
    {
        $data = collect($data);
        $sorted = $data->sortByDesc(function($datum){
            return strtotime($datum->start_time);
        });
        return $sorted;
    }


    /**
     * get one student Schedules
     *
     * @param  User $user_id
     * @return array
     */
    public function getSchedules(User $user_id):array
    {
        $profile = Profile::where('user_id', $user_id->id)->first();

        $schedules = Schedule::where('session_id', $profile->session_id)->where('department_id', $profile->department_id)->get();
        $monday = $tuesday = $wednesday = $thursday = $friday = $saturday = $sunday = array();
        foreach($schedules as $schedule){
            switch ($schedule->day) {
                case 1:
                    array_push($monday, $schedule);
                    break;
                case 2:
                    array_push($tuesday, $schedule);
                    break;
                case 3:
                    array_push($wednesday, $schedule);
                    break;
                case 4:
                    array_push($thursday, $schedule);
                    break;
                case 5:
                    array_push($friday, $schedule);
                    break;
                case 6:
                    array_push($saturday, $schedule);
                    break;
                case 7:
                    array_push($sunday, $schedule);
                    break;

                default:
                    continue;
                    break;
            }
        }

        $weekdays = compact('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');

        $schedules = [];
        foreach($weekdays as $key => $weekday){
            $schedules[$key] = $this->sortByTime($weekday);
        }

        return $schedules;
    }
}

