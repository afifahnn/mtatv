@extends('main-layout')

@section('main-content')
    <div class="all-videos-container">
        <div class="title">
            <h3>TALKSHOW</h3>
            <hr>
        </div>
        <div class="filtering-container">
            <div class="category">
                @php
                    $uniqueJenis = [];
                @endphp
                <button class="each-category active" onclick="filterVideos('all')">All</button>
                @foreach($talkshows as $video)
                    @if (!in_array($video->jenis, $uniqueJenis))
                        <button style="font-family: Poppins, sans-serif" class="each-category" onclick="filterVideos('{{ $video->jenis }}')">{{$video->jenis}}</button>
                        @php
                            $uniqueJenis[] = $video->jenis;
                        @endphp
                    @endif
                @endforeach
            </div>
        </div>
        <div class="all-videos-content">
            @foreach($talkshows as $index => $talkshow)
                <a style="text-decoration: none" href="{{ route('talkshow-detail', ['id' => $talkshow->id]) }}" class="videos-container {{ $index >= 6 ? 'hidden' : '' }}" data-jenis="{{ $talkshow->jenis }}">
                    <div class="youtube" style="height: 50%">
                        <iframe width="200" src="{{ $talkshow->link }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="video-details" style="height: 50%">
                        <p class="video-type">{{ $talkshow->jenis }}</p>
                        <div class="title-container">
                            <p class="video-title" style="color: #333"><b>{{ $talkshow->judul }}</b></p>
                        </div>
                        <div class="video-info">
                            <i class="fa fa-clock-o" style="color: #2a8939;"></i>
                            <p style="color: #333">{{ \Carbon\Carbon::parse($talkshow->tanggal_upload)->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div class="showAll">
        <hr><button onclick="showAll()" id="myBtn">Lihat Semua</button><hr>
    </div>
    <div class="showLess" style="display: none;">
        <hr><button onclick="showLess()" id="myBtn">Lihat Lebih Sedikit</button><hr>
    </div>
    <div class="mp3">
        <p style="margin-bottom: 1em">Download MP3 Jihad Pagi</p>
        <button style="margin-bottom: 3.5em"  id="button"><a href="http://mp3.mtafm.com/">▶ Download MP3</a></button>
    </div>

    <script>
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

        // Filter Videos by Category
        function filterVideos(jenis) {
            var videos = document.querySelectorAll('.videos-container');
            videos.forEach(function(video) {
                if (jenis === 'all' || video.getAttribute('data-jenis') === jenis) {
                    video.style.display = 'flex';
                    video.style.height = '100%';
                    video.querySelector('.youtube').style.height ='50%';
                    video.querySelector('.video-details').style.height = '50%';
                } else {
                    video.style.display = 'none';
                }
            });

            // Update active class
            document.querySelectorAll('.each-category').forEach(function(button) {
                button.classList.remove('active');
            });
            document.querySelector('.each-category[onclick="filterVideos(\'' + jenis + '\')"]').classList.add('active');
        }

        // NAVIGATE TO
        function navigateTo(url) {
            window.location.href = url;
        }
    </script>
@endsection
