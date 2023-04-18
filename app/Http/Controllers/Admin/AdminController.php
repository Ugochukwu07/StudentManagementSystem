<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Metadata\BackupGlobals;

class AdminController extends Controller
{
    public function all()
    {
        $admins = User::where('admin', 1)->get();

        return view('admin.admin', compact('admins'));
    }

    public function addSave(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|string',
        ]);

        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'admin' => 1,
            'password' => Hash::make($request->password),
            'image' => 'images/user3-128x128.jpg'
        ]);

        if (!$admin)
            return back()->with('error', 'Sorry, something went wrung while registering student');


        //when everything went right
        return redirect()->route('admin.admin.all')->with('success', 'Admin Account Created Successfully');
    }

    public function editSave(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|confirmed',
            'password_confirmation' => 'nullable|string',
        ]);
        $admin = User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => isset($request->password) ? Hash::make($request->password) : User::select('password')->where('id', $id)->first()->password
        ]);

        if (!$admin)
            return back()->with('error', 'Sorry, something went wrong while registering student');


        //when everything went right
        return redirect()->route('admin.admin.all')->with('success', 'Admin Account Updated Successfully');
    }

    public function delete($id)
    {
        $admin = User::find($id);
        $admin->delete();

        return redirect()->route('admin.admin.all')->with('success', 'Admin Account Deleted Successfully');
    }
}
