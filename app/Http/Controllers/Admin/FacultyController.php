<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Faculty\AddFacultyRequest;
use App\Http\Requests\Admin\Faculty\EditFacultyRequest;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::orderBy('created_at', 'desc')->get();
        return view('admin.faculty', compact('faculties'));
    }

    public function add()
    {
        return view('admin.faculty.add');
    }

    public function addSave(AddFacultyRequest $request)
    {
        $faculty = Faculty::create([
            'name' => $request->name,
            'active' => true,
            'added_by' => auth()->user()->id
        ]);

        if($faculty != null)
            return redirect()->route('admin.faculty.index')->with('success', 'Faculty Added Successfully');

        return back()->with('error', 'Something went wrung try again');
    }

    public function edit($id)
    {
        $faculty = Faculty::find($id);
        return view('admin.faculty.edit', compact('faculty'));
    }

    public function editSave($id, EditFacultyRequest $request)
    {
        $request->validate([
            'name' => 'unique:faculties,name,'.$id
        ]);

        $updated = Faculty::where('id', $id)->update([
            'name' => $request->name,
            'active' => $request->active ? true : false,
            'added_by' => auth()->user()->id
        ]);

        if($updated)
            return redirect()->route('admin.faculty.index')->with('success', 'Faculty Updated Successfully');

        return back()->with('error', 'Something went wrung try again');
    }

    public function delete($id, $soft = true)
    {
        $faculty = Faculty::find($id);
        // if($soft){
            $faculty->active = true;
            $faculty->save();
            return back()->with('success', 'Faculty Deactivated Successfully');
        // }

        // $faculty->delete();
        // return back()->with('success', 'Faculty Deleted Successfully');
    }
}
