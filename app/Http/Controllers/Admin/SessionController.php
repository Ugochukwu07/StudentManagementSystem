<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Contracts\View;
use Illuminate\Http;

class SessionController extends Controller
{
    /**
     * all sessions on the database
     *
     * @return View\Factory
     */
    public function all(): View\Factory
    {
        return view('admin.session.index', [
            'sessions' => Session::all()
        ]);
    }
    

    /**
     * add new session to db
     *
     * @return View\Factory
     */
    public function add(): View\Factory
    {
        return view('admin.session.add');
    }


    /**
     * Save session to db
     *
     * @param  mixed $request
     * @return Http\RedirectResponse
     */
    public function addSave(Http\Request $request): Http\RedirectResponse
    {
        $request->validate([
            'year' => 'string|required|unique:sessions,year'
        ]);

        $session = Session::create([
            'name' => $request->year,
            'added_by' => auth()->user()->id
        ]);

        if($session)
            return redirect()->route('admin.session.all')->with('success', 'Session Added Successfully');

        return back()->with('error', 'Sorry, something went wrung');
    }


    /**
     * edit session
     *
     * @param  Session $id
     * @return View\Factory
     */
    public function edit($id): View\Factory
    {
        $session = Session::find($id);

        return view('admin.session.edit', compact('session'));
    }


    /**
     * Save updated session
     *
     * @param  Session $id
     * @param  mixed $request
     * @return Http\RedirectResponse
     */
    public function editSave($id, Http\Request $request): Http\RedirectResponse
    {
        $request->validate([
            'year' => 'string|required|unique:sessions,year,'.$id
        ]);

        $session = Session::where('id', $id)->update([
            'name' => $request->year,
            'added_by' => auth()->user()->id
        ]);

        if($session)
            return redirect()->route('admin.session.all')->with('success', 'Session Added Successfully');

        return back()->with('error', 'Sorry, something went wrung');
    }


    /**
     * delete session from database
     *
     * @param  Session $id
     * @return Http\RedirectResponse
     */
    public function delete($id): Http\RedirectResponse
    {
        $session = Session::find($id);

        if($session->delete())
            return redirect()->route('admin.session.all')->with('success', 'Session Deleted Successfully');

        return back()->with('error', 'Sorry, something went wrung');
    }
}
