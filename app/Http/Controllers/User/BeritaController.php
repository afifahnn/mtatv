<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index() {
        $beritas = Berita::all();
        return view('pages.user.berita', ['beritas' => $beritas]);
    }
}
