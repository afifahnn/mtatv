@extends('admin-main-layout')

@section('contents')
    <div class="container">
        <h2>Tambah Berita Baru</h2>
        <form action="{{ route('admin.berita.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="isi">Isi</label>
                <textarea name="isi" id="isi" class="form-control" rows="10" required></textarea>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#isi' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>
            </div>
            <div class="form-group">
                <label for="tanggal_upload">Tanggal Upload</label>
                <input type="date" name="tanggal_upload" id="tanggal_upload" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary" id="button-secondary">Batal</a>
        </form>
    </div>
@endsection
