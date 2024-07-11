@extends('admin-main-layout')

@section('contents')
    <div class="container">
        <h2>Tambah Jihad Pagi Baru</h2>
        <form action="{{ route('admin.jihad.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" id="link" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tanggal_upload">Tanggal Upload</label>
                <input style="font-family: 'Poppins', sans-serif" type="date" name="tanggal_upload" id="tanggal_upload" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary" id="button-secondary">Batal</a>
        </form>
    </div>
@endsection
