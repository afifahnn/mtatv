<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin MTA TV</title>
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
{{--    <script src="{{ mix('js/app.js') }}" defer></script>--}}
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="side-bar">
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>
    <ul>
        <li><a href="{{ url('/admin/jadwal') }}">Jadwal</a></li>
        <li><a href="{{ url('/admin/video') }}">Video</a></li>
        <li><a href="{{ url('/admin/berita') }}">Berita</a></li>
        <li><a href="{{ url('/admin/talkshow') }}">Talkshow</a></li>
        <li><a href="{{ url('/admin/jihad') }}">Jihad Pagi</a></li>
    </ul>
</div>
</body>
</html>
