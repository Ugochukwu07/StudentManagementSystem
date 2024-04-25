<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Result;
use App\Models\Session;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    public function all()
    {

    }

    public function addStudent($id)
    {
        $student = User::find($id);
        $sessions = Session::all();
        $students = User::where('admin', 0)->get();

        return view('admin.result.add', compact('student', 'sessions', 'students'));
    }

    public function add()
    {
        $student = NULL;
        $sessions = Session::all();
        $students = User::where('admin', 0)->get();

        return view('admin.result.add', compact('student', 'sessions', 'students'));
    }

    public function addSave(Request $request)
    {
        $request->validate([
            'student_id' => 'required|numeric|exists:users,id',
            'session_id' => 'required|numeric|exists:sessions,id',
            'semester' => 'required|numeric|between:0,3',
            'course_code' => 'required|string',
            'course' => 'required|string',
            'score' => 'required|numeric',
            'grade' => 'required|string',
        ]);

        $result = Result::create([
            'student_id' => $request->student_id,
            'session_id' => $request->session_id,
            'semester' => $request->semester,
            'course_code' => $request->course_code,
            'course' => $request->course,
            'score' => $request->score,
            'grade' => $request->grade,
            'addedBy' => auth()->user()->id
        ]);

        if(!$result)
            return back()->with('error', 'Something went wrong');

        return redirect()->route('admin.student.all')->with('success', 'Result added successfully');
    }
}
