<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Talkshow;

class TalkshowController extends Controller
{
    public function index()
    {
        $talkshows = Talkshow::all();
        return view('pages.user.talkshow', ['talkshows' => $talkshows]);
    }
}
