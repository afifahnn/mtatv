<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTA TV</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/videos.css">
    <link rel="stylesheet" href="css/jadwal-acara.css">
    <link rel="stylesheet" href="css/profil.css">
    <link rel="stylesheet" href="css/berita.css">

    {{-- Icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">"
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
<div id="header">
    <div class="navbar">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="logo">
        </div>
        <ul class="menus">
            <li class="nav_links {{ \Route::is('beranda') ? 'active' : '' }}"><a href='{{ url('/') }}'>Beranda</a></li>
            <li class="nav_links {{ \Route::is('video') ? 'active' : '' }}"><a href='{{ url('/video') }}'>Video</a></li>
            <li class="nav_links {{ \Route::is('jadwal-acara') ? 'active' : '' }}"><a href='{{ url('/jadwal-acara') }}'>Jadwal Acara</a></li>
            <li class="nav_links {{ \Route::is('talkshow') ? 'active' : '' }}"><a href='{{ url('/talkshow') }}'>Talkshow</a></li>
            <li class="nav_links {{ \Route::is('jihad-pagi') ? 'active' : '' }}"><a href='{{ url('/jihad-pagi') }}'>Jihad Pagi</a></li>
            <li class="nav_links {{ \Route::is('berita', 'berita-detail') ? 'active' : '' }}"><a href='{{ url('/berita') }}'>Berita</a></li>
            <li class="nav_links {{ \Route::is('profil') ? 'active' : '' }}"><a href='{{ url('/profil') }}'>Profil</a></li>
            <li class="nav_links {{ \Route::is('search') ? 'active' : '' }}"><a href="{{ url('/search') }}"><i class="fas fa-search" id="search-icon"></i></a></li>
        </ul>
    </div>
</div>

<!-- Modal Structure -->
{{-- <div id="search-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="search-bar">
            <form action="/search" method="GET" style="display: flex; width: 100%;">
                <input placeholder="Ketik di sini . . .">
                <button class="btn-search" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>
</div> --}}

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var modal = document.getElementById("search-modal");
        var searchIcon = document.getElementById("search-icon");
        var span = document.getElementsByClassName("close")[0];

        searchIcon.onclick = function() {
            modal.style.visibility = "visible";
        }

        span.onclick = function() {
            modal.style.visibility = "hidden";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.visibility = "hidden";
            }
        }
    });

</script>

</body>
</html>
