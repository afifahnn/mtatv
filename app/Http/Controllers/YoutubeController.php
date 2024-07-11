<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class YoutubeController extends Controller
{
    public function getPlaylists()
    {
        $key = env('YOUTUBE_KEY');
        $base_url = env('BASE_URL');
        $channel_id = env('CHANNEL_ID');
        $maxResult = 50; // Sesuaikan dengan jumlah video yang ingin Anda ambil

// URL API untuk mendapatkan playlist
        $playlist_url = $base_url . "playlists?order=date&part=snippet&channelId=" . $channel_id . "&maxResults=" . $maxResult . "&key=" . $key;

// Mendapatkan data playlist
        $playlist_response = Http::get($playlist_url);
        $playlist_data = json_decode($playlist_response->body(), true);

// Variabel untuk menyimpan informasi video-video dari playlist "Jihad Pagi MTATV Solo"
        $videos = [];

        foreach ($playlist_data['items'] as $playlist) {
            if ($playlist['snippet']['title'] === 'AKU BISA PRESTASI') {
                // Playlist ID
                $playlist_id = $playlist['id'];

                // URL API untuk mendapatkan video dalam playlist
                $playlist_items_url = $base_url . "playlistItems?part=snippet&playlistId=" . $playlist_id . "&maxResults=" . $maxResult . "&key=" . $key;

                // Mendapatkan data video dalam playlist
                $playlist_items_response = Http::get($playlist_items_url);
                $playlist_items_data = json_decode($playlist_items_response->body(), true);

                // Menambahkan informasi video ke dalam array $videos
                foreach ($playlist_items_data['items'] as $video) {
                    $videos[] = [
                        'link_embed' => 'https://www.youtube.com/embed/' . $video['snippet']['resourceId']['videoId'],
                        'playlist_title' => $playlist['snippet']['title'],
                        'title' => $video['snippet']['title'],
                        'published_at' => $video['snippet']['publishedAt'],
                        'thumbnail' => $video['snippet']['thumbnails']['default']['url'],
                        'description' => $video['snippet']['description']
                    ];
                }
            }
        }

        echo "INSERT INTO talkshows (jenis, link, judul, tanggal_upload, thumbnail, deskripsi) VALUES <br>" . PHP_EOL;
        foreach ($videos as $video) {
            echo "('AKU BISA PRESTASI', " . PHP_EOL;
            echo "'" . $video['link_embed'] . "', " . PHP_EOL;
            echo "'" . $video['title'] . "', " . PHP_EOL;
            echo "'" . $video['published_at'] . "', " . PHP_EOL;
            echo "'" . $video['thumbnail'] . "'), " . PHP_EOL;
            echo PHP_EOL;
        }
    }
}
