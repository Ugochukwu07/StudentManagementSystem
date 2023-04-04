<?php

namespace App\Http\Controllers\Student;

use App\Models\Profile;
use App\Models\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Result;

class ResultController extends Controller
{
    public function select()
    {
        return view('student.result.select');
    }

    public function selectSave(Request $request)
    {
        $request->validate([
            'level' => 'required|numeric|min:100',
            'semester' => 'required|numeric|between:1,3'
        ]);

        $result = Result::where('level', $request->level)
                            ->where('semester', $request->semester)
                            ->where('department_id', Profile::where('user_id', $this->id())->first()->department_id)
                            ->get();

        // if($result)
            // return redirect()->route('student.result.view', [''])
    }
}
