<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feed;
use App\Models\User;
use App\Models\Profile;
use App\Models\Department;
use App\Mail\NewStudentMail;
use App\Service\AuthService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Student\RegisterRequest;

class StudentController extends Controller
{
    public function all()
    {
        $students = User::where('admin', 0)->get();
        $departments = Department::all();

        return view('admin.student', compact('students', 'departments'));
    }

    public function addSave(RegisterRequest $request)
    {
        $user = (new AuthService())->storeStudent($request);

        if (!$user)
            return back()->with('error', 'Sorry, something went wrung while registering student');


        $profile = (new AuthService())->storeProfile($request, $user->id);
        if (!$profile)
            return redirect()->route('admin.student.all')->with('error', 'Sorry, something went wrung while creating profile');


        Mail::to($user)->send(new NewStudentMail($user));
        //when everything went right
        Feed::create([
            'type' => 1,
            'title' => 'Account Creation',
            'message' => auth()->user()->name . ' just add a student',
            'user_id' => auth()->user()->id,
            'status' => false
        ]);
        return redirect()->route('admin.student.all')->with('success', 'Account Created Successfully');
    }

    public function editSave(Request $request, $id)
    {
        $pro = Profile::where('user_id', $id)->first();
        $request->validate([
            'name' => 'string|required',
            'reg_number' => 'string|required|unique:profiles,reg_number,'. $pro->id,
            'email' => 'required|email|unique:users,email,' . $id,
            'department_id' => 'nullable|numeric|exists:departments,id',
            'password' => 'nullable|string|confirmed',
            'password_confirmation' => 'nullable|string',
        ]);
        $user = User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => isset($request->password) ? Hash::make($request->password) : User::select('password')->where('id', $id)->first()->password
        ]);

        if (!$user)
            return back()->with('error', 'Sorry, something went wrung while registering student');


        $profile = Profile::where('user_id', $id)->update([
            'reg_number' => $request->reg_number,
            'department_id' => $request->department_id,
        ]);
        if (!$profile)
            return redirect()->route('admin.student.all')->with('error', 'Sorry, something went wrung while creating profile');


        //when everything went right
        Feed::create([
            'type' => 1,
            'title' => 'Account Updated',
            'message' => auth()->user()->name . ' just updated a new student',
            'user_id' => auth()->user()->id,
            'status' => false
        ]);
        return redirect()->route('admin.student.all')->with('success', 'Student Account Updated Successfully');
    }


    public function delete($id)
    {
        $admin = User::find($id);
        $admin->delete();

        return redirect()->route('admin.student.all')->with('success', 'Student Account Deleted Successfully');
    }
}
