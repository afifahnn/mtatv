<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jihad;
use App\Models\Talkshow;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\JadwalAcara;
use App\Models\Video;
use App\Models\Berita;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.admin.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('admin.jadwal');
        }
        return redirect()->route('admin.login')->with('error', 'Invalid credentials');
    }


    public function logout(Request $request)
    {
        // Hapus informasi admin dari session
        $request->session()->forget('admin');
        return redirect()->route('admin.login');
    }

    public function jadwal()
    {
        $admin = session('admin');

        // Fetch all schedules and order them by the "hari" column
        $sortedJadwals = JadwalAcara::orderBy('hari')->get();

        return view('pages.admin.jadwal-acara', compact('admin', 'sortedJadwals'));
    }



    public function createJadwal()
    {
        $admin = session('admin');
        return view('pages.admin.jadwal-acara.create', compact('admin'));
    }

    public function storeJadwal(Request $request)
    {
        $request->validate([
            'program_acara' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'hari' => 'required',
        ]);

        JadwalAcara::create($request->all());

        return redirect()->route('admin.jadwal.create')->with('success', 'Jadwal acara berhasil ditambahkan.');
    }

    public function editJadwal($id)
    {
        $admin = session('admin');
        $jadwal = JadwalAcara::findOrFail($id);
        return view('pages.admin.jadwal-acara.edit', compact('admin', 'jadwal'));
    }

    public function updateJadwal(Request $request, $id)
    {
        $request->validate([
            'program_acara' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'hari' => 'required',
        ]);

        $jadwal = JadwalAcara::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('admin.jadwal')->with('success', 'Jadwal acara berhasil diperbarui.');
    }

    public function deleteJadwal($id)
    {
        $jadwal = JadwalAcara::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('admin.jadwal')->with('success', 'Jadwal acara berhasil dihapus.');
    }

    public function video()
    {
        $admin = session('admin');
        $videos = Video::all();
        return view('pages.admin.video', compact('admin', 'videos'));
    }

    public function createVideo()
    {
        $admin = session('admin');
        return view('pages.admin.video.create', compact('admin'));
    }

    public function storeVideo(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'link' => 'required',
            'tanggal_upload' => 'required',
            'jenis' => 'required',
        ]);

        Video::create($request->all());

        return redirect()->route('admin.video')->with('success', 'Video berhasil ditambahkan.');
    }

    public function editVideo($id)
    {
        $admin = session('admin');
        $video = Video::findOrFail($id);
        return view('pages.admin.video.edit', compact('admin', 'video'));
    }

    public function updateVideo(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'link' => 'required',
            'tanggal_upload' => 'required',
            'jenis' => 'required',
        ]);

        $video = Video::findOrFail($id);
        $video->update($request->all());

        return redirect()->route('admin.video')->with('success', 'Video berhasil diperbarui.');
    }

    public function deleteVideo($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return redirect()->route('admin.video')->with('success', 'Video berhasil dihapus.');
    }

    public function berita()
    {
        $admin = session('admin');
        $beritas = Berita::all();
        return view('pages.admin.berita', compact('admin', 'beritas'));
    }

    public function createBerita()
    {
        $admin = session('admin');
        return view('pages.admin.berita.create', compact('admin'));
    }

    public function storeBerita(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal_publish' => 'required',
        ]);

        Berita::create($request->all());

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function editBerita($id)
    {
        $admin = session('admin');
        $berita = Berita::findOrFail($id);
        return view('pages.admin.berita.edit', compact('admin', 'berita'));
    }

    public function updateBerita(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal_publish' => 'required',
        ]);

        $berita = Berita::findOrFail($id);
        $berita->update($request->all());

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil diperbarui.');
    }

    public function deleteBerita($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil dihapus.');
    }

    public function talkshow()
    {
        $admin = session('admin');
        $talkshows = Talkshow::all();
        return view('pages.admin.talkshow', compact('admin', 'talkshows'));
    }

    public function createTalkshow()
    {
        $admin = session('admin');
        return view('pages.admin.talkshow.create', compact('admin'));
    }

    public function storeTalkshow(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'link' => 'required',
            'tanggal_upload' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'required',
        ]);

        Talkshow::create($request->all());

        return redirect()->route('admin.talkshow')->with('success', 'Talkshow berhasil ditambahkan.');
    }

    public function editTalkshow($id)
    {
        $admin = session('admin');
        $talkshow = Talkshow::findOrFail($id);
        return view('pages.admin.talkshow.edit', compact('admin', 'talkshow'));
    }

    public function updateTalkshow(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'link' => 'required',
            'tanggal_upload' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'required',
        ]);

        $talkshow = Talkshow::findOrFail($id);
        $talkshow->update($request->all());

        return redirect()->route('admin.talkshow')->with('success', 'Talkshow berhasil diperbarui.');
    }

    public function deleteTalkshow($id)
    {
        $jihad = Talkshow::findOrFail($id);
        $jihad->delete();

        return redirect()->route('admin.talkshow')->with('success', 'Talkshow berhasil dihapus.');
    }

    public function editJihad($id)
    {
        $admin = session('admin');
        $jihad = Video::findOrFail($id);
        return view('pages.admin.jihad.edit', compact('admin', 'jihad'));
    }

    public function updateJihad(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'link' => 'required',
            'tanggal_upload' => 'required',
        ]);

        $jihad = Jihad::findOrFail($id);
        $jihad->update($request->all());

        return redirect()->route('admin.jihad')->with('success', 'Jihad Pagi berhasil diperbarui.');
    }

    public function deleteJihad($id)
    {
        $jihad = Jihad::findOrFail($id);
        $jihad->delete();

        return redirect()->route('admin.jihad')->with('success', 'Jihad Pagi berhasil dihapus.');
    }

    public function jihad()
    {
        $admin = session('admin');
        $jihads = Jihad::all();
        return view('pages.admin.jihad', compact('admin', 'jihads'));
    }

    public function createJihad()
    {
        $admin = session('admin');
        return view('pages.admin.jihad.create', compact('admin'));
    }

    public function storeJihad(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'link' => 'required',
            'tanggal_upload' => 'required',
        ]);

        Jihad::create($request->all());

        return redirect()->route('admin.jihad')->with('success', 'Jihad Pagi berhasil ditambahkan.');
    }
}
