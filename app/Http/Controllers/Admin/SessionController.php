<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feed;
use Illuminate\Http;
use App\Models\Session;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SessionController extends Controller
{
    /**
     * all sessions on the database
     *
     * @return View
     */
    public function all() : View
    {
        return view('admin.session', [
            'sessions' => Session::all()
        ]);
    }


    /**
     * add new session to db
     *
     * @return View
     */
    public function add(): View
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
            'year' => $request->year,
            'added_by' => auth()->user()->id
        ]);

        if($session){
            Feed::create([
                'type' => 1,
                'title' => 'Session Added',
                'message' => auth()->user()->name . ' Added a Session',
                'user_id' => auth()->user()->id,
                'status' => false
            ]);
            return redirect()->route('admin.session.all')->with('success', 'Session Added Successfully');
        }

        return back()->with('error', 'Sorry, something went wrung');
    }


    /**
     * edit session
     *
     * @param  Session $id
     * @return View
     */
    public function edit($id): View
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

        if($session){
            Feed::create([
                'type' => 1,
                'title' => 'Session Updated',
                'message' => auth()->user()->name . ' Updated a Session',
                'user_id' => auth()->user()->id,
                'status' => false
            ]);
            return redirect()->route('admin.session.all')->with('success', 'Session Updated Successfully');
        }

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

        if($session->delete()){
            Feed::create([
                'type' => 1,
                'title' => 'Session Deleted',
                'message' => auth()->user()->name . ' Deleted a Session',
                'user_id' => auth()->user()->id,
                'status' => false
            ]);
            return redirect()->route('admin.session.all')->with('success', 'Session Deleted Successfully');
        }

        return back()->with('error', 'Sorry, something went wrung');
    }
}
