<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaDetailController extends Controller
{
    public function showDetail($id)
    {
        $berita = Berita::findOrFail($id);
        return view('pages.user.berita-detail', compact('berita'));
    }
}
