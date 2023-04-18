<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feed;
use Illuminate\Http\Request;
use App\Service\Admin\MainService;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function overview()
    {
        $feeds = Feed::where('user_id', auth()->user()->id)->where('status', 0)->orderBy('created_at', 'desc')->take(10)->get();

        $data = (new MainService())->overviewData();
        $data['feeds'] = $feeds;
        return view('admin.overview', $data);
    }
}
