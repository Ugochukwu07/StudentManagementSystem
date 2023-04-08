<?php

namespace App\View\Components\Layout;

use Closure;
use App\Models\Feed;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Feeds extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function datai()
    {
        return [
            'count' => Feed::where('user_id', auth()->user()->id)->where('status', 0)->count(),
            'feeds' => Feed::where('user_id', auth()->user()->id)->where('status', 0)->get()
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.feeds');
    }
}
