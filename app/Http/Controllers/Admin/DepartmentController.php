<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faculty;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Department\AddDepartmentRequest;
use App\Http\Requests\Admin\Department\EditDepartmentRequest;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('created_at', 'desc')->get();
        return view('admin.department.index', compact('departments'));
    }

    public function add()
    {
        $faculties = Faculty::all();

        return view('admin.department.add', compact('faculties'));
    }

    public function addSave(AddDepartmentRequest $request)
    {
        $department = Department::create([
            'name' => $request->name,
            'faculty_id' => $request->faculty_id
        ]);

        if($department != null)
            return redirect()->route('admin.department.index')->with('success', 'Department Added Successfully');

        return back()->with('error', 'Something went wrung try again');
    }

    public function edit($id)
    {
        $department = Department::find($id);
        $faculties = Faculty::all();

        return view('admin.department.edit', compact('department', 'faculties'));
    }

    public function editSave($id, EditDepartmentRequest $request)
    {
        $request->validate([
            'name' => 'unique:departments,name,'.$id
        ]);

        $updated = Department::where('id', $id)->update([
            'name' => $request->name,
            'faculty_id' => $request->faculty_id,
            'active' => $request->active
        ]);

        if($updated)
            return redirect()->route('admin.department.index')->with('success', 'Department Updated Successfully');

        return back()->with('error', 'Something went wrung try again');
    }

    public function delete($id, $soft = true)
    {
        $department = Department::find($id);
        if($soft)
            $department->active = true;
            $department->save();
            return back()->with('success', 'Department Deactivated Successfully');

        $department->delete();
        return back()->with('success', 'Department Deleted Successfully');
    }
}
