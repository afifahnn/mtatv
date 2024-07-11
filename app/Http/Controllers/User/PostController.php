<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Video;
use App\Models\Jihad;
use App\Models\Talkshow;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = 9;

        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate($perPage, ['*'], 'posts_page');

        $videos = Video::query()
            ->where('judul', 'LIKE', "%{$search}%")
            ->orwhere('jenis', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate($perPage, ['*'], 'videos_page');

        $talkshows = Talkshow::query()
            ->where('judul', 'LIKE', "%{$search}%")
            ->orwhere('jenis', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate($perPage, ['*'], 'talkshows_page');

        $jihad = Jihad::query()
            ->where('judul', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate($perPage, ['*'], 'jihad_page');

        $berita = Berita::query()
            ->where('judul', 'LIKE', "%{$search}%")
            ->orwhere('jenis', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate($perPage, ['*'], 'berita_page');

        $allVideos = $videos->getCollection()
            ->merge($talkshows->getCollection())
            ->merge($jihad->getCollection())
            ->merge($berita->getCollection());

        if(request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%');
        }

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $paginatedVideos = new LengthAwarePaginator(
            $allVideos->forPage($currentPage, $perPage),
            $allVideos->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );

        return view('pages.user.search', [
            'title' => "Search Results",
            'active' => 'posts',
            'posts' => $posts,
            'search' => $search,
            'videos' => $paginatedVideos
        ]);
    }
}
