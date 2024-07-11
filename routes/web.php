<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\BerandaController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\YoutubeController;
use App\Http\Controllers\User\BeritaDetailController;
use App\Http\Controllers\User\VideoController;
use App\Http\Controllers\User\VideoDetailController;
use App\Http\Controllers\User\JihadPagiController;
use App\Http\Controllers\User\BeritaController;
use App\Http\Controllers\User\JadwalController;
use App\Http\Controllers\User\ProfilController;
use App\Http\Controllers\User\TalkshowController;
use Illuminate\Support\Facades\Route;

// Beranda
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// Search
Route::get('/search', [PostController::class, 'index'])->name('search');

// Video
Route::get('/video', [VideoController::class, 'index'])->name('video');
Route::get('/video-detail/{id}', [VideoDetailController::class, 'showVideoDetail'])->name('video-detail');
Route::get('/talkshow-detail/{id}', [VideoDetailController::class, 'showTalkshowDetail'])->name('talkshow-detail');
Route::get('/jihad-pagi-detail/{id}', [VideoDetailController::class, 'showJihadDetail'])->name('jihad-pagi-detail');

// Jadwal Acara
Route::get('/jadwal-acara', [JadwalController::class, 'index'])->name('jadwal-acara');
Route::post('/fetch-schedule', [JadwalController::class, 'fetchSchedule']);

// Talkshow
Route::get('/talkshow', [TalkshowController::class, 'index'])->name('talkshow');

// Profil
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');

// Berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita-detail/{id}', [BeritaDetailController::class, 'showDetail'])->name('berita-detail');

// Jihad Pagi
Route::get('/jihad-pagi', [JihadPagiController::class, 'index'])->name('jihad-pagi');

//Admin

// Rute untuk login admin
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'authenticate'])->name('admin.login.post');
// Grup rute untuk admin
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Rute untuk dashboard admin
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Rute untuk jadwal acara
    Route::get('jadwal', [AdminController::class, 'jadwal'])->name('admin.jadwal');
    Route::get('jadwal/create', [AdminController::class, 'createJadwal'])->name('admin.jadwal.create');
    Route::post('jadwal', [AdminController::class, 'storeJadwal'])->name('admin.jadwal.store');
    Route::get('jadwal/{id}/edit', [AdminController::class, 'editJadwal'])->name('admin.jadwal.edit');
    Route::put('jadwal/{id}', [AdminController::class, 'updateJadwal'])->name('admin.jadwal.update');
    Route::delete('jadwal/{id}', [AdminController::class, 'deleteJadwal'])->name('admin.jadwal.delete');

    // Rute untuk video
    Route::get('video', [AdminController::class, 'video'])->name('admin.video');
    Route::get('video/create', [AdminController::class, 'createVideo'])->name('admin.video.create');
    Route::post('video', [AdminController::class, 'storeVideo'])->name('admin.video.store');
    Route::get('video/{id}/edit', [AdminController::class, 'editVideo'])->name('admin.video.edit');
    Route::put('video/{id}', [AdminController::class, 'updateVideo'])->name('admin.video.update');
    Route::delete('video/{id}', [AdminController::class, 'deleteVideo'])->name('admin.video.delete');

    // Rute untuk berita
    Route::get('berita', [AdminController::class, 'berita'])->name('admin.berita');
    Route::get('berita/create', [AdminController::class, 'createBerita'])->name('admin.berita.create');
    Route::post('berita', [AdminController::class, 'storeBerita'])->name('admin.berita.store');
    Route::get('berita/{id}/edit', [AdminController::class, 'editBerita'])->name('admin.berita.edit');
    Route::put('berita/{id}', [AdminController::class, 'updateBerita'])->name('admin.berita.update');
    Route::delete('berita/{id}', [AdminController::class, 'deleteBerita'])->name('admin.berita.delete');

    // Rute untuk video
});

Route::get('admin/talkshow', [AdminController::class, 'talkshow'])->name('admin.talkshow');
Route::get('admin/talkshow/create', [AdminController::class, 'createTalkshow'])->name('admin.talkshow.create');
Route::post('admin/talkshow', [AdminController::class, 'storeTalkshow'])->name('admin.talkshow.store');
Route::get('admin/talkshow/{id}/edit', [AdminController::class, 'editTalkshow'])->name('admin.talkshow.edit');
Route::put('admin/talkshow/{id}', [AdminController::class, 'updateTalkshow'])->name('admin.talkshow.update');
Route::delete('admin/talkshow/{id}', [AdminController::class, 'deleteTalkshow'])->name('admin.talkshow.delete');

Route::get('admin/jihad', [AdminController::class, 'jihad'])->name('admin.jihad');
Route::get('admin/jihad/create', [AdminController::class, 'createJihad'])->name('admin.jihad.create');
Route::post('admin/jihad', [AdminController::class, 'storeJihad'])->name('admin.jihad.store');
Route::get('admin/jihad/{id}/edit', [AdminController::class, 'editJihad'])->name('admin.jihad.edit');
Route::put('admin/jihad/{id}', [AdminController::class, 'updateJihad'])->name('admin.jihad.update');
Route::delete('admin/jihad/{id}', [AdminController::class, 'deleteJihad'])->name('admin.jihad.delete');

Route::get('/try', function () {
    return view('pages.user.try');
});

Route::get('/store-playlist', [YoutubeController::class, 'getPlaylists']);

