<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Talkshow;
use App\Models\Video;
use Illuminate\Support\Facades\Http;

class BerandaController extends Controller
{
    public function index()
    {
        $key = env('YOUTUBE_KEY');
        $base_url = env('BASE_URL');
        $channel_id = env('CHANNEL_ID');

        // Variabel untuk menyimpan semua video populer
        $videos_populer = [];

        // URL API untuk mendapatkan video paling banyak ditonton
        $videos_url = $base_url . "search?order=viewCount&part=snippet&maxResults=5&type=video&channelId=" . $channel_id . "&key=" . $key;

        // Mendapatkan data video paling banyak ditonton
        $videos_response = Http::get($videos_url);
        $videos_data = json_decode($videos_response->body())->items;

        // Menyimpan informasi video ke dalam array
        foreach ($videos_data as $video) {
            $videos_populer[] = [
                'title' => $video->snippet->title,
                'link_embed' => "https://www.youtube.com/embed/" . $video->id->videoId,
                'jenis' => 'Video Populer',
                'tanggal_upload' => $video->snippet->publishedAt,
            ];
        }

        $talkshow = Talkshow::all();
        $videos = Video::all();

        return view('pages.user.beranda', ['videos_populer' => $videos_populer, 'talkshow' => $talkshow, 'videos' => $videos]);
    }
}
