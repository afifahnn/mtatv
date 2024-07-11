@extends('admin-main-layout')

@section('contents')
    <div class="container">
        <h2>Edit Video</h2>
        <form action="{{ route('admin.video.update', $video->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" value="{{ $video->judul }}" required>
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" id="link" class="form-control" value="{{ $video->link }}" required>
            </div>
            <div class="form-group">
                <label for="tanggal_upload">Tanggal Upload</label>
                <input type="date" name="tanggal_upload" id="tanggal_upload" class="form-control" value="{{ $video->tanggal_upload }}" required>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis</label>
                <select name="jenis" id="jenis" class="form-control" required>
                    <option value="">Jenis</option>
                    <option value="Raih Asa" {{ $video->jenis == 'Raih Asa' ? 'selected' : '' }}>Raih Asa</option>
                    <option value="Aku Bisa Prestasi (ABP)" {{ $video->jenis == 'Aku Bisa Prestasi (ABP)' ? 'selected' : '' }}>Aku Bisa Prestasi (ABP)</option>
                    <option value="SRU" {{ $video->jenis == 'SRU' ? 'selected' : '' }}>SRU</option>
                    <option value="Taman Indria" {{ $video->jenis == 'Taman Indria' ? 'selected' : '' }}>Taman Indria</option>
                    <option value="Kilau Ananda" {{ $video->jenis == 'Kilau Ananda' ? 'selected' : '' }}>Kilau Ananda</option>
                    <option value="Masjidku" {{ $video->jenis == 'Masjidku' ? 'selected' : '' }}>Masjidku</option>
                    <option value="Ghirah" {{ $video->jenis == 'Ghirah' ? 'selected' : '' }}>Ghirah</option>
                    <option value="Si Sopan" {{ $video->jenis == 'Si Sopan' ? 'selected' : '' }}>Si Sopan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary" id="button-secondary">Batal</a>
        </form>
    </div>
@endsection
