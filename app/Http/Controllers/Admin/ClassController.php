<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feed;
use App\Models\Session;
use App\Models\ClassRoom;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassController extends Controller
{
    public function add()
    {
        $departments = Department::all();
        $sessions = Session::all();

        return view('admin.schedule.choose', compact('departments', 'sessions'));
    }

    public function addSave(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'department_id' => 'required|numeric|exists:departments,id',
            'session_id' => 'required|numeric|exists:sessions,id'
        ]);

        $class = ClassRoom::create([
            'name' => $request->name,
            'department_id' => $request->department_id,
            'session_id' => $request->session_id,
        ]);

        if(!$class)
            return back()->with('error', "Something went wrong.");

         //when everything went right
         Feed::create([
            'type' => 1,
            'title' => 'New Class',
            'message' => auth()->user()->name . ' just a new classroom',
            'user_id' => auth()->user()->id,
            'status' => false
        ]);
        return redirect()->route('admin.class.all')->with('success', 'Class added successfully');
    }
}
