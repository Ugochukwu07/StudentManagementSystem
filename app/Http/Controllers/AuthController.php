<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Feed;
use App\Models\User;
use Illuminate\Http;
use App\Models\Faculty;
use App\Models\Profile;
use App\Models\Session;
use Illuminate\View\View;
use App\Models\Department;
use App\Service\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Student\RegisterRequest;

class AuthController extends Controller
{
    /**
     * register
     *
     * @return Factory
     */
    public function register(): View
    {
        $sessions = Session::all();
        $faculties = Faculty::all();
        $departments = Department::all();

        $sessionsData = new stdClass;
        $sessionsData->id = 1; $sessionsData->year = '2021/2022';
        $sessions = [$sessionsData];
        $departmentsData = new stdClass;
        $departmentsData->id = 1; $departmentsData->name = 'Computer Science';
        $departments = [$departmentsData];

        return view('auth.register', compact('sessions', 'faculties', 'departments'));
    }


    /**
     * register and Save Students to database
     *
     * @param  RegisterRequest $request
     * @return Http\RedirectResponse
     */
    public function registerSave(RegisterRequest $request): Http\RedirectResponse
    {
        $user = (new AuthService())->storeStudent($request);

        if (!$user)
            return back()->with('error', 'Sorry, something went wrung');

        Auth::attempt(['email' => $request->email, 'password' => $request->password], true);

        $profile = (new AuthService())->storeProfile($request, $user->id);
        if (!$profile)
            return redirect()->route('student.profile')->with('error', 'Sorry, something went wrung');


        //when everything went right
        return redirect()->route('student.overview')->with('success', 'Account Created Successfully');
    }


    /**
     * login student
     *
     * @return void
     */
    public function login()
    {
        return view('auth.login');
    }


    /**
     * authenticate and login User In
     *
     * @param  Request $request
     * @return void
     */
    public function loginSave(Request $request)
    {
        $request->validate([
            'email_reg' => 'required|string',
            'password' => 'required|string'
        ]);

        if (User::where('email', $request->email_reg)->exists()) {
            $email = $request->email_reg;
        } else if (Profile::where('reg_number', $request->email_reg)->exists()) {
            $profile = Profile::where('reg_number', $request->email_reg)->first();
            $email = $profile->user->email;
        } else {
            return back()->with('error', 'Invalid Email Address or Reg Number');
        }

        if (Auth::attempt(['email' => $email, 'password' => $request->password], true)) {
            //when everything went right

            Feed::create([
                'type' => 1,
                'title' => 'Account Access',
                'message' => auth()->user()->name . ' just logged In',
                'user_id' => auth()->user()->id,
                'status' => false
            ]);
            return auth()->user()->admin ?
                    redirect()->route('admin.overview')->with('success', 'Logged In Successfully')
                    :
                    redirect()->route('student.overview')->with('success', 'Logged In Successfully');
        }

        return back()->with('error', 'Login details do not match');
    }

    public function logout(){
        Feed::create([
            'type' => 1,
            'title' => 'Account Access',
            'message' => auth()->user()->name . ' just logged Out',
            'user_id' => auth()->user()->id,
            'status' => false
        ]);
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logged Out Successfully');
    }
}
