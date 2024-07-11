<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JadwalAcara;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function index()
    {
        $hariTranslations = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu',
        ];

        $jadwalMingguan = [];

        foreach ($hariTranslations as $englishDay => $hari) {
            $jadwalMingguan[$hari] = JadwalAcara::where('hari', $hari)->get();
        }

        $hariIniEnglish = Carbon::now()->englishDayOfWeek;
        $hariIni = $hariTranslations[$hariIniEnglish];

        return view('pages.user.jadwal-acara', [
            'hariIni' => $hariIni,
            'jadwalMingguan' => $jadwalMingguan,
        ]);
    }
}
