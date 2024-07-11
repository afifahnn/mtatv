@extends('admin-main-layout')

@section('contents')
    <div class="container">
        <h2>Tambah Video Baru</h2>
        <form action="{{ route('admin.video.store') }}" method="post">
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
            <div class="form-group">
                <label for="jenis">Jenis</label>
                <select name="jenis" id="jenis" class="form-control" required>
                    <option value="">Jenis</option>
                    <option value="Raih Asa">Raih Asa</option>
                    <option value="Aku Bisa Prestasi (ABP)">Aku Bisa Prestasi (ABP)</option>
                    <option value="SRU">SRU</option>
                    <option value="Taman Indria">Taman Indria</option>
                    <option value="Kilau Ananda">Kilau Ananda</option>
                    <option value="Masjidku">Masjidku</option>
                    <option value="Ghirah">Ghirah</option>
                    <option value="Si Sopan">Si Sopan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary" id="button-secondary">Batal</a>
        </form>
    </div>
@endsection
