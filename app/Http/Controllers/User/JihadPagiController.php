<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Jihad;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class JihadPagiController extends Controller
{
    public function index()
    {
        $jihads = Jihad::all();
        return view('pages.user.jihad-pagi', ['jihads' => $jihads]);
    }
}


