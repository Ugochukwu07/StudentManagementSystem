<?php
namespace App\Service\Admin;

use App\Models\Result;
use App\Models\Session;
use App\Models\Department;
use Illuminate\Support\Collection;

class ResultService{
    public function allResults():Collection
    {
        $departments = Department::all();
        $sessions = Session::all();
        $levels = collect([100, 200, 300, 400, 500, 600, 700, 800, 900]);

        $result_map = array();
        $results = array();
        foreach($departments as $department){
            foreach($sessions as $session){
                foreach($levels as $level){
                    $result = Result::where('department_id', $department->id)
                                ->where('session_id', $session->id)
                                ->where('level', $level)
                                ->first();
                    if($result && !in_array($result->id, $result_map))
                        array_push($result_map, $result->id);
                        array_push($results, $result);
                }
            }
        }

        return collect($results);
    }
}
