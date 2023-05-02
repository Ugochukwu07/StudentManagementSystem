<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http;
use App\Models\Session;
use App\Models\Schedule;
use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Service\Admin\ScheduleService;
use App\Http\Requests\Admin\Schedule\AddRequest;

class ScheduleController extends Controller
{
    public function view(Http\Request $request)
    {
        $request->validate([
            'department_id' => 'required|numeric|exists:departments,id',
            'session_id' => 'required|numeric|exists:sessions,id'
        ]);

        $schedule = Schedule::where('department_id', '');
    }


    /**
     * all schedules for all students on the database
     *
     * @return View
     */
    public function all()
    {
        return view('admin.session.index', [
            'schedules' => (new ScheduleService())->allSchedules()
        ]);
    }

    /**
     * allBySessionAndDepartment
     *
     * @param  mixed $session_id
     * @param  mixed $department_id
     * @return View\View
     */
    public function allBySessionAndDepartment($session_id, $department_id)
    {
        return view('admin.session.index', [
            'schedule' => Schedule::where('session_id', $session_id)->where('department_id', $department_id)->get()
        ]);
    }


    /**
     * add new schedule to db
     *
     * @return View\View
     */
    public function add()
    {
        $departments = Department::all();
        $sessions = Session::all();

        return view('admin.schedule.add', compact('departments', 'sessions'));
    }


    /**
     * Save schedule to db
     *
     * @param  mixed $request
     * @return Http\RedirectResponse
     */
    public function addSave(AddRequest $request): Http\RedirectResponse
    {
        dd($request->all());
        $schedule = (new ScheduleService())->storeSchedule($request);

        if($schedule)
            return redirect()
                    ->route('admin.schedule.all.session.department', [
                            'department_id' => $schedule->department_id,
                            'session_id' => $schedule->session_id
                    ])->with('success', 'Schedule Added Successfully');

        return back()->with('error', 'Sorry, something went wrong');
    }

    /**
     * choose new schedule to db
     *
     * @return View\View
     */
    public function choose()
    {
        $departments = Department::all();
        $sessions = Session::all();

        return view('admin.schedule.choose', compact('departments', 'sessions'));
    }


    /**
     * Save schedule to db
     *
     * @param  mixed $request
     * @return Http\RedirectResponse
     */
    public function chooseSave(Http\Request $request): Http\RedirectResponse
    {
        $schedule = (new ScheduleService())->storeSchedule($request);

        if($schedule)
            return redirect()
                    ->route('admin.schedule.all.session.department', [
                            'department_id' => $schedule->department_id,
                            'session_id' => $schedule->session_id
                    ])->with('success', 'Schedule Added Successfully');

        return back()->with('error', 'Sorry, something went wrong');
    }


    /**
     * edit Schedule
     *
     * @param  Schedule $id
     * @return View
     */
    public function edit($id)
    {

        $departments = Department::all();
        $sessions = Session::all();

        $schedule = Schedule::find($id);

        return view('admin.schedule.edit', compact('sessions', 'departments', 'schedule'));
    }


    /**
     * Save updated Schedule
     *
     * @param  Schedule $id
     * @param  mixed $request
     * @return Http\RedirectResponse
     */
    public function editSave($id, AddRequest $request): Http\RedirectResponse
    {
        $updated = (new ScheduleService())->updateSchedule($request, $id);

        if($updated)
            $schedule = Schedule::find($id);
            return redirect()
                    ->route('admin.schedule.all.session.department', [
                        'department_id' => $schedule->department_id,
                        'session_id' => $schedule->session_id
                    ])->with('success', 'Schedule Updated Successfully');

        return back()->with('error', 'Sorry, something went wrung');
    }


    /**
     * delete Schedule from database
     *
     * @param  Schedule $id
     * @return Http\RedirectResponse
     */
    public function delete($id): Http\RedirectResponse
    {
        $schedule = Schedule::find($id);

        if($schedule->delete())
            return redirect()->route('admin.schedule.all')->with('success', 'Schedule Deleted Successfully');

        return back()->with('error', 'Sorry, something went wrung');
    }
}
