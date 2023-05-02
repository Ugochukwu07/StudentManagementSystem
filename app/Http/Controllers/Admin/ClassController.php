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
    public function all()
    {
        $departments = Department::orderBy('created_at', 'desc')->get();
        $sessions = Session::orderBy('created_at', 'desc')->get();
        $classes = ClassRoom::orderBy('created_at', 'desc')->get();

        return view('admin.class', compact('departments', 'sessions', 'classes'));
    }
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
            'added_by' => auth()->user()->id
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


    public function editSave(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'department_id' => 'required|numeric|exists:departments,id',
            'session_id' => 'required|numeric|exists:sessions,id'
        ]);

        $class = ClassRoom::find($id)->update([
            'name' => $request->name,
            'department_id' => $request->department_id,
            'session_id' => $request->session_id,
            'added_by' => auth()->user()->id
        ]);

        if(!$class)
            return back()->with('error', "Something went wrong.");

         //when everything went right
         Feed::create([
            'type' => 1,
            'title' => 'Updated Class',
            'message' => auth()->user()->name . ' just updated a classroom',
            'user_id' => auth()->user()->id,
            'status' => false
        ]);
        return redirect()->route('admin.class.all')->with('success', 'Class added successfully');
    }
}
