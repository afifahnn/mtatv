<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('pages.user.video', ['videos' => $videos]);
    }
}
