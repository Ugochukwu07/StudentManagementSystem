<?php

namespace App\View\Components\Layout;

use Closure;
use App\Models\Faculty;
use App\Models\Department;
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

    // public function offices()
    // {
    //     return Office::all();
    // }

    public function departments()
    {
        return Department::all();
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.sidebar');
    }
}
