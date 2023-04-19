<?php
namespace App\Service\Admin;

use stdClass;
use App\Models\User;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Session;

class MainService{
    public function overviewData()
    {
        $departments = Department::all();
        $faculties = Faculty::all();
        $students = User::where('admin', 0)->get();
        $sessions = Session::all();

        return compact('departments', 'faculties', 'students', 'sessions');
    }
}
