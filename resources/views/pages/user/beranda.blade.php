@extends('main-layout')

@section('main-content')
    <div id="beranda-container">
        {{-- LIVE STREAMING --}}
        <div class="beranda-contents">
            <div class="title">
                <h3>LIVE STREAMING MTATV 24 JAM</h3>
                <hr>
            </div>
            <div class="live-streaming">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/kLz7KKL-Os8?si=798TTL1BdKmDV19E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>

        {{-- VIDEO POPULER --}}
        <div class="video-populer">
            <div class="title">
                <h3>VIDEO POPULER</h3>
                <hr>
            </div>
            <div class="videos-content">
                @foreach($videos_populer as $video)
                    <div class="videos" style="height: 280px; width: 300px">
                        <div class="video-container" style="height: 50%">
                            <iframe width="560" height="315" src="{{ $video['link_embed'] }}" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="video-description" style="padding: 20px; background: #F3F3F3; height: 50%; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px">
                            <p style="color: #2a8939; margin-bottom: 1em; font-weight: 700" class="jenis">{{ $video['jenis'] }}</p>
                            <div class="judul-container">
                                <p style="margin-bottom: 1em; font-weight: 700" class="judul">{{ $video['title'] }}</p>
                            </div>
                            <div class="video-info">
                                <i class="fa fa-clock-o" style="color: #2a8939;"></i>
                                <p>{{ \Carbon\Carbon::parse($video['tanggal_upload'])->translatedFormat('d F Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- TALKSHOW --}}
        <div class="talkshow">
            <div class="title">
                <h3>TALKSHOW</h3>
                <hr>
            </div>
            <div class="news-content">
                @foreach($talkshow as $index => $video)
                    <a style="width: 100%; height: 190px; text-decoration: none" href="{{ route('talkshow-detail', ['id' => $video->id]) }}" class="news-videos {{ $index >= 4 ? 'hidden' : '' }}" data-jenis="{{ $video->jenis }}">
                        <div class="youtube" style="width: 50%">
                            <iframe width="100%" height="100%" src="{{ $video->link }}" frameborder="0" allowfullscreen style="border-bottom-left-radius: 20px; border-top-left-radius: 20px"></iframe>
                        </div>
                        <div class="video-description-talkshow" style="width: 50%; padding: 20px; background: #f3f3f3; border-bottom-right-radius: 20px; border-top-right-radius: 20px">
                            <p class="jenis" style="margin-bottom: 1em; color: #2a8939"><b>{{ $video->jenis }}</b></p>
                            <div class="video-info" style="margin-bottom: 1em">
                                <i class="fa fa-clock-o" style="color: #2a8939;"></i>
                                <p style="color: #333">{{ \Carbon\Carbon::parse($video->tanggal_upload)->translatedFormat('d F Y') }}</p>
                            </div>
                            <div class="judul-container" style="height: 3em">
                                <p style="color: #333; font-weight: 700" class="judul">{{ $video->judul }}</p>
                            </div>
                            <p class="deskripsi" style="margin-bottom: 2em; font-weight: 400; color: #333">{{ $video->deskripsi }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="arrow-down">
                <button onclick="showAll()"><i class="fa fa-angle-down" style="font-size:70px; color:rgb(63, 63, 63);"></i></button>
            </div>
            <div class="arrow-up" style="display: none;">
                <button onclick="showLess()"><i class="fa fa-angle-up" style="font-size:70px; color:rgb(63, 63, 63);"></i></button>
            </div>
        </div>

        {{-- VIDEO --}}
        <div class="video">
            <div class="videos-videos">
                <div class="title">
                    <h3>VIDEO</h3><hr>
                </div>
                <div class="video-cat">
                    @foreach($videos->groupBy('jenis') as $jenis => $videoItems)
                        <p class="filtered">{{ $jenis }}</p>
                        <div class="videos-content" >
                            @foreach($videoItems as $video)
                                <div class="videos" style="width: 300px; height: 280px">
                                    <div class="video-container" style="width: 100%; height: 50%">
                                        <iframe width="100%" height="100%" src="{{ $video->link }}" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                    <div class="video-description" style="width: 87%; height: 37%; padding: 20px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px; background: #F3F3F3">
                                        <p class="jenis" style="color: #2a8939; margin-bottom: 1em"><b>{{ $video->jenis }}</b></p>
                                        <div class="judul-container" style="height: 3em; margin-bottom: 1em">
                                            <p class="judul">{{ $video->judul }}</p>
                                        </div>
                                        <div class="video-info" style="margin-bottom: 2em">
                                            <i class="fa fa-clock-o" style="color: #2a8939;"></i>
                                            <p>{{ \Carbon\Carbon::parse($video->tanggal_upload)->translatedFormat('d F Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <div class="isAdmin">
                    <a href="{{ url('/admin/login') }}" class="floating-link">Login as Admin</a>
                </div>
            </div>
        </div>

        <script>
            function showAll() {
                var videos = document.querySelectorAll('.news-videos');
                videos.forEach(function(video) {
                    video.style.display = 'flex';
                });

                document.querySelector('.arrow-down').style.display = 'none';
                document.querySelector('.arrow-up').style.display = 'flex';
            }

            function showLess() {
                var videos = document.querySelectorAll('.news-videos');
                videos.forEach(function(video, index) {
                    if (index >= 4) {
                        video.style.display = 'none';
                    }
                });

                document.querySelector('.arrow-down').style.display = 'flex';
                document.querySelector('.arrow-up').style.display = 'none';
            }
        </script>

@endsection
