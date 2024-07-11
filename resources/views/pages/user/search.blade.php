@extends('main-layout')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/search.css">

@section('main-content')
<div class="search">
    <div class="search-bar">
        <div class="col-md-6">
            <form action="/search">
                <div class="input-group mb-3">
                    <input type="text" class="form-control fs-6" placeholder="Cari di sini . . ." name="search">
                    <button class="btn btn-success fs-6" type="submit">Search</button>
                  </div>
            </form>
        </div>
    </div>

    @if(request('search'))
        @if($posts->isEmpty() && $videos->isEmpty())
            <div class="view-search">
                <div>Pencarian "{{ $search }}" tidak ditemukan</div>
            </div>
        @else
            <div class="view-search">
                <span>Hasil pencarian "{{ $search }}"</span>
                <div>
                    @forelse ($posts as $post)
                        <div>{{ $post->title }}</div>
                    @empty
                        <div></div>
                    @endforelse
                </div>
            </div>
        @endif
    @endif

    {{-- All Videos --}}
    <div class="all-videos-content">
        @foreach($videos as $video)
            <a style="height: 280px; text-decoration: none" href="{{ route('video-detail', ['id' => $video->id]) }}" class="videos-container" data-jenis="{{ $video->jenis }}">
                <div class="youtube" style="height: 50%">
                    <iframe width="200" src="{{ $video->link }}" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="video-details" style="height: 50%">
                    <p class="video-type">{{ $video->jenis }}</p>
                    <div class="title-container" style="height: 4em">
                        <p class="video-title" style="margin-bottom: 1em; text-decoration: none; color: #333"><b>{{ strlen($video->judul) > 80 ? substr($video->judul, 0, 80) . '...' : $video->judul }}</b></p>
                    </div>
                    <div class="video-info">
                        <i class="fa fa-clock-o" style="color: #2a8939;"></i>
                        <p style="color: #333">{{ \Carbon\Carbon::parse($video->tanggal_upload)->translatedFormat('d F Y') }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $posts->links() }}
        {{ $videos->links() }}
    </div>
</div>

@endsection
