<?php
namespace App\Service\Admin;

use stdClass;
use App\Models\User;
use App\Models\Faculty;
use App\Models\Session;
use App\Models\ClassRoom;
use App\Models\Department;

class MainService{
    public function overviewData()
    {
        $departments = Department::all();
        $faculties = Faculty::all();
        $students = User::where('admin', 0)->get();
        $admins = User::where('admin', 1)->get();
        $sessions = Session::all();
        $classes = ClassRoom::orderBy('created_at', 'desc')->get();

        return compact('departments', 'faculties', 'students', 'sessions', 'admins', 'classes');
    }
}
