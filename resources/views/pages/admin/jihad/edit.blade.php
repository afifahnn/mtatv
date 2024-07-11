@extends('admin-main-layout')

@section('contents')
    <div class="container">
        <h2>Edit Jihad Pagi</h2>
        <form action="{{ route('admin.jihad.update', $video->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" value="{{ $jihad->judul }}" required>
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" id="link" class="form-control" value="{{ $jihad->link }}" required>
            </div>
            <div class="form-group">
                <label for="tanggal_upload">Tanggal Upload</label>
                <input type="date" name="tanggal_upload" id="tanggal_upload" class="form-control" value="{{ $jihad->tanggal_upload }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary" id="button-secondary">Batal</a>
        </form>
    </div>
@endsection
