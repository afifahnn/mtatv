<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Talkshow;
use App\Models\Jihad;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoDetailController extends Controller
{
    public function showVideoDetail($id)
    {
        $video = Video::findOrFail($id);
        $videos = Video::where('jenis', $video->jenis)
            ->where('id', '!=', $id)
            ->get();
        return view('pages.user.video-detail', compact('video', 'videos'));
    }

    public function showTalkshowDetail($id)
    {
        $talkshow = Talkshow::findOrFail($id);
        $talkshows = Talkshow::where('jenis', $talkshow->jenis)
            ->where('id', '!=', $id)
            ->get();
        return view('pages.user.talkshow-detail', compact('talkshow', 'talkshows'));
    }

    public function showJihadDetail($id)
    {
        $jihad = Jihad::findOrFail($id);
        $jihads = Jihad::where('id', '!=', $id)->get(); // Mengambil semua jihad kecuali yang sedang ditampilkan
        return view('pages.user.jihad-pagi-detail', compact('jihad', 'jihads'));
    }

}
