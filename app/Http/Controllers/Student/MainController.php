<?php

namespace App\Http\Controllers\Student;

use App\Models\Feed;
use App\Models\User;
use App\Models\Profile;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Student\MainService;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View as Factory;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Student\ProfileUpdateRequest;
use App\Models\Session;

class MainController extends Controller
{
    /**
     * student account overview
     *
     * @return Factory
     */
    public function overview(): Factory
    {
        $feeds = Feed::where('user_id', auth()->user()->id)->where('status', 0)->orderBy('created_at', 'desc')->take(10)->get();
        return view('student.overview', compact('feeds'));
    }


    /**
     * update student profile
     *
     * @return Factory
     */
    public function profile(): Factory
    {
        $profile = Profile::where('user_id', auth()->user()->id)->first();
        $departments = Department::all();
        $sessions = Session::all();
        return view('student.profile', compact('profile', 'departments', 'sessions'));
    }


    /**
     * Save Student profile to database
     *
     * @param  mixed $id
     * @param  ProfileUpdateRequest $request
     * @return RedirectResponse
     */
    public function profileSave($id, ProfileUpdateRequest $request)
    {
        $profile = (new MainService())->updateProfile($request, auth()->user()->id, $id);

        if($profile)
            return redirect()->route('student.overview')->with('success', 'Profile Updated Successfully');

        return back()->with('error', 'Sorry, something went wrong');
    }


    /**
     * update authentication account details
     *
     * @return Factory
     */
    public function account(): Factory
    {
        return view('student.profile',);
    }



    /**
     * save updated authentication student details to database
     *
     * @param  mixed $id
     * @param  Request $request
     * @return RedirectResponse
     */
    public function accountSave($id, Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|confirmed',
            'password_confirmation' => 'require|string',
        ]);

        $user = User::where('id', $id)->update([
            'email' => $request->email,
            'password' => isset($request->password) ? Hash::make($request->password) : User::find($id)->password,
        ]);

        if($user)
            return redirect()->route('student.overview')->with('success', 'Account Updated Successfully');

        return back()->with('error', 'Sorry, something went wrong');
    }
}
