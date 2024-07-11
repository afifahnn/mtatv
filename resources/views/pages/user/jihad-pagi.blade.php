@extends('main-layout')

@section('main-content')
    <div id="jihad-pagi-container">
        <div class="title">
            <h3>JIHAD PAGI</h3><hr>
        </div>
        <div class="description">
            Pengajian Ahad Pagi (JIHAD PAGI) selalu hadir menemani ruang dengar Anda setiap hari. Tausiyah bersama Alm. Al-Ustadz Drs. Ahmad Sukina yang selalu dirindukan. Dan juga, tongkat estafet dakwah Yayasan Majlis Tafsir Al-Qur’an (MTA) yang dilanjutkan oleh Al-Ustadz Nur Kholid Syaifullah, Lc, M.Hum.<br><br>

            JIHAD PAGI LIVE, hadir setiap hari Ahad mulai pukul 06.00 – 11.30 WIB bersama Al-Ustadz Nur Kholid Syaifullah, Lc, M.Hum, Pimpinan Pusat Yayasan Majlis Tafsir Al-Qur’an (MTA).<br><br>

            Setiap hari Senin – Sabtu, Anda dapat menyimak kembali rekaman Pengajian Ahad Pagi dari berbagai edisi dengan beragam tema brosur, terbagi dalam tiga segmen : <span id="dots">...</span><span id="more"></span>
            <div class="parsing">
                <hr><button onclick="myFunction()" id="myBtn">Baca Selengkapnya</button><hr>
            </div>
        </div>

        <div class="all-videos-content">
            @foreach($jihads as $index => $video)
                <a style="text-decoration: none; height: 280px" href="{{ route('jihad-pagi-detail', ['id' => $video->id]) }}" class="videos-container {{ $index >= 6 ? 'hidden' : '' }}">
                    <div class="youtube" style="height: 50%">
                        <iframe width="200" src="{{ $video->link }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="video-details" style="height: 50%">
                        <p class="video-type"><b>Jihad Pagi</b></p>
                        <div class="title-container">
                            <p class="video-title" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; margin-bottom: 1em; height: 3em; color: #333"><b>{{ $video->judul }}</b></p>
                        </div>
                        <div class="video-info">
                            <i class="fa fa-clock-o" style="color: #2a8939;"></i>
                            <p style="color: #333">{{ Carbon\Carbon::parse($video->tanggal_upload)->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="showAll">
            <hr><button onclick="showAll()" id="myBtn">Lihat Semua</button><hr>
        </div>
        <div class="showLess" style="display: none;">
            <hr><button onclick="showLess()" id="myBtn">Lihat Lebih Sedikit</button><hr>
        </div>
    </div>

    <script>
        function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Baca Selengkapnya";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Sembunyikan";
                moreText.style.display = "inline";
            }
        }

        function showAll() {
            var videos = document.querySelectorAll('.videos-container');
            videos.forEach(function(video) {
                video.classList.remove('hidden');
            });

            document.querySelector('.showAll').style.display = 'none';
            document.querySelector('.showLess').style.display = 'flex';
        }

        function showLess() {
            var videos = document.querySelectorAll('.videos-container');
            videos.forEach(function(video, index) {
                if (index >= 6) {
                    video.classList.add('hidden');
                }
            });

            document.querySelector('.showAll').style.display = 'flex';
            document.querySelector('.showLess').style.display = 'none';
        }
    </script>

@endsection
