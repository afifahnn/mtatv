@extends('main-layout')

<style>
    /* Navbar */
    .navbar {
        background-color: #F3F3F3;
        overflow: hidden;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-right: 20px;
    }

    .navbar .logo img {
        height: 50px;
        width: auto;
        margin: 10px 20px;
    }

    .navbar .menus {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    .navbar .menus li {
        display: inline-block;
        position: relative;
    }

    .navbar .menus a {
        color: #333;
        font-size: 14px;
        border: none;
        background-color: transparent;
        padding: 8px 16px;
        font-weight: 600;
        display: flex;
        align-items: center;
        cursor: pointer;
        text-decoration: none;
    }

    .navbar .menus a:hover {
        opacity: 80%;
    }

    .navbar .menus li.nav_links.active a {
        color: #FFFFFF !important;
        background-color: #2A8939;
        border-radius: 30px;
    }

    /* Modal */
    .modal {
        visibility: hidden;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        border-radius: 10px;
        position: relative;
    }

    .video-description .judul:hover {
        text-decoration: underline;
    }

    .modal .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        position: absolute;
        right: 5px;
        top: 2px;
    }

    .modal .close:hover, .modal .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .modal .search-bar {
        display: flex;
        background-color: #F3F3F3;
        padding: 10px 20px;
        gap: 10px;
        border: solid 2px #2A8939;
        border-radius: 30px;
    }

    .modal .btn-search {
        background: transparent;
        border: none;
        cursor: pointer;
    }

    .modal .search-bar input {
        width: 100%;
        background: transparent;
        border: none;
        outline: none;
    }

    .modal .search-bar input:focus {
        outline: none;
        border: none;
    }

    /*Footer*/
    #footer-style {
        background-color: #f3f3f3;
        padding: 30px;
        display: flex;
        flex-direction: column;
    }

    .footer-top {
        margin-top: 1.5em;
        display: flex;
        justify-content: space-between;
    }

    .footer-top .logo {
        width: 30%;
        text-align: center;
    }

    .footer-top .logo img {
        max-width: 60%;
    }

    .footer-top .nav-links {
        margin-bottom: 0.5em;
    }

    .footer-top .links, .footer-top .media, .footer-top .alamat {
        flex: 1;
    }

    .footer-top .alamat {
        padding-right: 40px;
    }

    .footer-top .links p a, .footer-top .media p a, .footer-top .alamat a, .footer-top alamat p {
        text-decoration: none;
        color: #333;
        font-weight: 400;
    }

    .footer-top .links p a:hover, .footer-top .media p a:hover, .footer-top .alamat p a:hover {
        text-decoration: underline;
        color: #2a8939;
    }

    .footer-top .titles {
        font-weight: 600;
        color: #2a8939;
        font-size: 20px;
        margin-bottom: 0.5em;
    }

    .footer-bottom::before {
        content: '';
        display: block;
        width: 100%;
        height: 1px;
        background-color: #333;
        margin: 30px 0;
    }

    .footer-bottom {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .footer-bottom .social-media-icons {
        display: flex;
        margin-bottom: 2em;
    }

    .footer-bottom .social-media-icons a {
        display: inline-block;
        margin-right: 15px;
    }

    .footer-bottom .social-media-icons a:last-child {
        margin-right: 0;
    }

    .footer-bottom .social-media-icons i {
        font-size: 30px;
        color: #2a8939;
    }

    .footer-bottom .social-media-icons i:hover {
        color: #1e6d38;
        cursor: pointer;
    }

    .footer-bottom .credit {
        font-weight: bolder;
        font-size: 11px;
    }

    /* Container Detail */
    #detail-container {
        margin: 100px 20px;
    }

    .detail-info {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .detail-info button {
        display: flex;
        align-items: center;
        background-color: #2A8939;
        border: none;
        color: white;
        padding: 10px 20px;
        border-radius: 30px;
        cursor: pointer;
    }

    .detail-info button i {
        margin-right: 10px;
    }

    .detail-info .detail-links {
        display: flex;
        align-items: center;
    }

    .detail-info .detail-links a {
        text-decoration: none;
        color: #2A8939;
        font-weight: 600;
    }

    .detail-info .detail-links i {
        margin: 0 10px;
    }

    .detail-vid-des {
        margin-bottom: 20px;
    }

    .detail-vid-judul {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    .detail-vid-video {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .detail-isi {
        font-size: 16px;
        color: #333;
        line-height: 1.5;
    }

    .detail-vid-terkait {
        margin-top: 30px;
    }

    .detail-vid-terkait .title h3 {
        color: #2A8939;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .videos-content {
        display: flex;
        overflow-x: auto;
        gap: 20px;
    }

    .videos {
        flex: 0 0 auto;
        width: 300px;
        cursor: pointer;
    }

    .video-container {
        margin-bottom: 10px;
    }

    .video-description {
        background-color: #f9f9f9;
        padding: 10px;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
    }

    .video-description .jenis {
        color: #2A8939;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .video-description .judul {
        color: #333;
        margin-bottom: 5px;
    }

    .video-description .video-info {
        display: flex;
        align-items: center;
    }

    .video-description .video-info i {
        margin-right: 5px;
    }

    .video-description .video-info p {
        font-size: smaller;
        color: #333;
    }

    .detail-yt {
        display: flex;
        align-items: center;
        margin-top: 40px;
    }

    .detail-yt-btn {
        display: flex;
        align-items: center;
        background-color: #2A8939;
        color: white;
        padding: 7px 20px;
        border-radius: 30px;
        text-decoration: none;
        margin-left: 10px;
    }

    .detail-yt-btn:hover {
        background: #073E06;

    }

    .detail-yt-btn i {
        margin-right: 10px;
    }
</style>
@section('main-content')
    <div id="detail-container" style="margin-top: 30px">
        {{-- DETAIL BUTTON --}}
        <div class="detail-info" style="padding: 52px">
            <button style="margin-right: 2em; font-family: Poppins">
                <i class="fa fa-arrow-left" aria-hidden="true" style="color: #FFFFFF"></i>
                <div onclick="goBack()">Kembali</div>
            </button>
            <div class="detail-links">
                <a href="{{ route('beranda') }}">Beranda</a>
                <i class="fa fa-angle-right" aria-hidden="true" style="font-size: 20px"></i>
                <a>{{ $talkshow->jenis }}</a>
            </div>
        </div>

        {{-- DETAIL JUDUL --}}
        <div class="detail-vid-des">
            <div class="detail-vid-judul">{{ $talkshow->judul }}</div>
            <div class="video-info" style="display: flex; align-items: center">
                <i class="fa fa-clock-o" style="color: #2a8939; margin-right: 0.5em"></i>
                <p>{{ \Carbon\Carbon::parse($talkshow->tanggal_upload)->translatedFormat('d F Y') }}</p>
            </div>
        </div>

        {{-- DETAIL VIDEO --}}
        <div class="detail-vid-video">
            <iframe width="900" height="400" src="{{ $talkshow->link }}" frameborder="0" allowfullscreen></iframe>
        </div>

        {{-- DETAIL DESKRIPSI --}}
        <div class="detail-vid-des">
            <div class="detail-isi">{{ $talkshow->deskripsi }}</div>
        </div>

        {{-- VIDEO TERKAIT --}}
        @if(count($talkshows) > 1)
            <div class="detail-vid-terkait">
                <div class="title">
                    <h3>VIDEO TERKAIT</h3>
                </div>
                <div class="videos-content">
                    @foreach($talkshows as $videos)
                        <div style="height: 280px" class="videos" onclick="navigateTo('{{ route('talkshow-detail', ['id' => $videos->id]) }}')">
                            <div class="video-container" style="height: 50%">
                                <iframe width="560" height="100%" src="{{ $videos->link }}" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="video-description" style="height: 50%; padding:20px">
                                <p class="video-type" style="margin-bottom: 1em"><b>{{ $videos->jenis }}</b></p>
                                <p class="judul" style="margin-bottom: 1em">{{ strlen($videos->judul) > 80 ? substr($videos->judul, 0, 80) . '...' : $videos->judul }}</p>
                                <div class="video-info" style="display: flex; align-items: center">
                                    <i class="fa fa-clock-o" style="color: #2a8939; margin-right: 0.5em"></i>
                                    <p>{{ \Carbon\Carbon::parse($videos->tanggal_upload)->translatedFormat('d F Y') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="detail-yt" style="display: flex; flex-direction: column; justify-content: center">
            <div style="color: #2a8939; font-weight: 500; margin-bottom: 1em">Lihat video lainnya di</div>
            <a style="margin-bottom: 4em" href="https://www.youtube.com/@OfficialMTATV" target="_blank" class="detail-yt-btn">
                <i class="fa fa-youtube-play" aria-hidden="true" style="font-size: 32px;"></i>
                <div>Youtube MTATV</div>
            </a>
        </div>
    </div>

    <script>
        // NAVIGATE
        function navigateTo(url) {
            window.location.href = url;
        }

        function goBack() {
            window.history.back();
        }
    </script>
@endsection
