<?php

namespace App\View\Components\Layout;

use App\Models\ClassRoom;
use Closure;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Session;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function faculties()
    {
        return Faculty::all();
    }

    public function sessions()
    {
        return Session::all();
    }

    public function departments()
    {
        return Department::all();
    }

    public function classes()
    {
        return ClassRoom::all();
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.sidebar');
    }
}
