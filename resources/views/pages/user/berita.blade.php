@extends('main-layout')

@section('main-content')
    <div id="berita-container">
        <div class="title">
            <h3>BERITA</h3>
            <hr>
        </div>
        <div class="news-content">
            @foreach($beritas as $index => $berita)
                <a style="text-decoration: none" href="{{ route('berita-detail', ['id' => $berita->id]) }}" class="news-videos {{ $index >= 4 ? 'hidden' : '' }}">
                    <div class="youtube-berita">
                        <iframe width="100%" height="100%" src="{{ $berita->link_youtube }}" frameborder="0" allowfullscreen style="border-bottom-left-radius: 20px; border-top-left-radius: 20px"></iframe>
                    </div>
                    <div class="video-details" style="padding: 20px; width: 60%">
                        <p class="video-type" style="margin-top: 0.5em"><b>{{ $berita->jenis }}</b></p>
                        <div class="title-container">
                            <p style="color: #333" class="video-title" style="color: #333"><b>{{ $berita->judul }}</b></p>
                        </div>
                        <p class="news-description" style="color: #333">{{ $berita->isi }}</p>
                        <div class="video-info" style="margin-top: 1em">
                            <i class="fa fa-clock-o" style="color: #2a8939;"></i>
                            <p style="color: #333;">{{ \Carbon\Carbon::parse($berita->tanggal_upload)->translatedFormat('d F Y') }}</p>
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
        function showAll() {
            var videos = document.querySelectorAll('.news-videos');
            videos.forEach(function(video) {
                video.classList.remove('hidden');
            });

            document.querySelector('.showAll').style.display = 'none';
            document.querySelector('.showLess').style.display = 'flex';
        }

        function showLess() {
            var videos = document.querySelectorAll('.news-videos');
            videos.forEach(function(video, index) {
                if (index >= 4) {
                    video.classList.add('hidden');
                }
            });

            document.querySelector('.showAll').style.display = 'flex';
            document.querySelector('.showLess').style.display = 'none';
        }
    </script>
@endsection
