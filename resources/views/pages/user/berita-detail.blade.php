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

    . modal .search-bar input {
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

    .detail-info {
        padding: 30px 50px;
        display: flex;
        gap: 60px;
        align-items: center;
    }

    .detail-info button {
        border: none;
        background-color: #2A8939;
        color: #FFFFFF;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 30px;
        gap: 10px;
        display: flex;
        cursor: pointer;
    }

    .detail-links {
        color: #2A8939;
        display: flex;
        gap: 10px;
        cursor: pointer;
    }

    .detail-links a {
        text-decoration: none;
        color: #2A8939;
    }

    .detail-info button:hover,
    .detail-links a:hover {
        opacity: 85%;
    }

    .detail-video {
        background-color: #CFE2E0;
        padding: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .detail-des {
        padding: 40px 70px;
    }

    .detail-jenis {
        color: #2A8939;
        font-weight: bold;
        padding: 10px 0px;
    }

    .detail-judul {
        font-size: 25px;
        font-weight: bold;
        padding-bottom: 8px;
    }

    .detail-time {
        display: flex;
        gap: 25px;
    }

    .detail-isi {
        text-align: justify;
        padding-top: 8px;
    }

    .detail-yt {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
    }

    .detail-yt-btn {
        display: flex;
        gap: 10px;
        height: fit-content;
        background-color: #2A8939;
        color: #ffffff;
        padding: 8px 18px;
        border-radius: 30px;
        align-items: center;
        cursor: pointer;
        text-decoration: none;
    }

    .detail-yt-btn:hover {
        opacity: 80%;
    }

</style>

@section('main-content')
    <div class="container">
        <div id="berita-detail-container" style="padding: 2px">
            <div id="detail-container">
                {{-- DETAIL BUTTON --}}
                <div class="detail-info">
                    <button style="font-family: Poppins; display: flex; align-items: center; font-weight: 400">
                        <i class="fa fa-arrow-left" aria-hidden="true" style="color: #FFFFFF"></i>
                        <div onclick="goBack()">Kembali</div>
                    </button>
                    <div class="detail-links" style="margin-left: -35px;">
                        <a style="font-weight: 600" href="{{ route('berita') }}">Kilas Info Terpilih</a>
                        <i class="fa fa-angle-right" aria-hidden="true" style="font-size: 20px"></i>
                    </div>
                </div>
            <div class="berita-detail-contents" style="padding: 40px">
                <div class="embed-responsive embed-responsive-16by9" style="display: flex; justify-content: center">
                    <iframe class="embed-responsive-item" width="900" height="400" src="{{ $berita->link_youtube }}" frameborder="0" allowfullscreen></iframe>
                </div>
                <h1 style="margin-top: 1em">{{ $berita->judul }}</h1>
                <div class="deskripsi-berita" style="margin-top: 0.7em">
                    <div class="row" style="display: flex; align-items: center">
                        <div class="col-md-6" style="display: flex; align-items: center">
                            <div class="tanggal-lihat-upload" style="display: flex; align-items: center">
                                <i class="fa fa-clock-o" style="margin-right: 0.5em; font-size:12px; margin-right: 10px; color: #2a8939; margin-top:15px;"></i>
                                <p style="margin-right: 3em; margin-top: 1em">{{ \Carbon\Carbon::parse($berita->tanggal_upload)->translatedFormat('d F Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p style="margin-top: 1.5em; margin-bottom: 3.5em">{{ $berita->isi }}</p>
                <div class="detail-yt">
                    <div style="color: #2a8939; font-weight: 500; margin-bottom: 0.5em">Lihat berita lainnya di</div>
                    <a style="margin-bottom: 3.5em" href="https://www.youtube.com/@OfficialMTATV" target="_blank" class="detail-yt-btn">
                        <div>
                            <p>NEWS MTATV</p>
                        </div>
                    </a>
                </div>
            </div>
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
