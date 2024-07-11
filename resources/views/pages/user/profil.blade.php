@extends('main-layout')

@section('main-content')
    <div id="profil-container">
        <div class="title">
            <p>PROFIL</p>
        </div>
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="logo">
        </div>
        <div class="mtatv">
            <h4 class="profile-title">MTATV</h4>
            <p>Majlis Tafsir Al Qur’an (MTA) merupakan sebuah badan hukum berbentuk Yayasan yang bergerak dibidang Dakwah Islamiyyah, sosial dan Pendidikan dengan kedudukan (kantor pusat) di Surakarta. MTA didirikan oleh Almarhum Al Ustadz Abdullah Thufail Saputra di Surakarta pada tanggal 19 September 1972. Majelis Tafsir Al-Quran (MTA) menghadirkan stasiun televisi (TV) yang diplot menjadi sebuah TV dakwah. TV tersebut diberi nama MTA TV. MTA TV merupakan media dakwah yang akan menyiarkan program-program berkaitan dengan Islam.</p>
        </div>
        <div class="program">
            <h4 class="profile-title">Program</h4>
            <p>Beberapa program yang diproduksi MTATV antara lain:</p>
            <ul>
                <li>Talkshow</li>
                <li>Program Eksternal</li>
                <li>Live Streaming</li>
            </ul>
        </div>
        <div class="alamat2">
            <h4 class="profile-title">Alamat</h4>
            <p>Jl. Serayu No.12, Semanggi, Kec. Pasar Kliwon, Kota Surakarta, Jawa Tengah 57117<br>
                Telp/Fax (0271) 664 748.<br>
                Marketing & Adv : 085-2929-99906.<br>
                On Air : (0271) 679 3000 | SMS/WA : 0811-255-3000</p>
        </div>
        <div class="sosial-media">
            <h4 class="profile-title">Sosial Media</h4>
            <table style="margin-bottom: 2em">
                <tr>
                    <td>Youtube</td>
                    <td>:</td>
                    <td>MTATV</td>
                </tr>
                <tr>
                    <td>Facebook</td>
                    <td>:</td>
                    <td>____</td>
                </tr>
                <tr>
                    <td>Instagram</td>
                    <td>:</td>
                    <td>@mtatv_official</td>
                </tr>
                <tr>
                    <td>Tiktok</td>
                    <td>:</td>
                    <td>____</td>
                </tr>
            </table >
        </div>
    </div>
@endsection
