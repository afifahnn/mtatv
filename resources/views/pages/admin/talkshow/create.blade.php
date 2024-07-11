@extends('admin-main-layout')

@section('contents')
    <div class="container">
        <h2>Tambah Talkshow Baru</h2>
        <form action="{{ route('admin.talkshow.store') }}" method="post">
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
                <select name="jenis" id="jenis" class="form-control" required>
                    <option value="">Jenis</option>
                    <option value="Hikmah">Hikmah</option>
                    <option value="Anugerah">Anugerah</option>
                    <option value="Wedangan">Wedangan</option>
                    <option value="Sowan Dokter">Sowan Dokter</option>
                    <option value="SAR">SAR</option>
                    <option value="Wirausaha">Wirausaha</option>
                    <option value="BIM">BIM</option>
                    <option value="Saatnya Wanita Berbicara (SWB)">Saatnya Wanita Berbicara (SWB)</option>
                    <option value="Fajar Hidayah">Fajar Hidayah</option>
                    <option value="Risalah Tafsir">Risalah Tafsir</option>
                    <option value="Tahsin">Tahsin</option>
                    <option value="Risalah Hadits">Risalah Hadits</option>
                    <option value="Gempita Nusa Terunan">Gempita Nusa Terunan</option>
                    <option value="Kota Kita">Kota Kita</option>
                    <option value="Risalah Mudzakaroh">Risalah Mudzakaroh</option>
                    <option value="Hidup Sehat Alami">Hidup Sehat Alami</option>
                    <option value="Kopi Istimewa">Kopi Istimewa</option>
                    <option value="Sehati/Shinta">Sehati/Shinta</option>
                    <option value="Ruang Psikologi">Ruang Psikologi</option>
                    <option value="Tempo Doeloe">Tempo Doeloe</option>
                    <option value="Klinik Kita">Klinik Kita</option>
                    <option value="Seputar Haji">Seputar Haji</option>
                    <option value="Ngleluri">Ngleluri</option>
                    <option value="Basa Jawi">Basa Jawi</option>
                    <option value="Stara">Stara</option>
                    <option value="Gurit Macapat">Gurit Macapat</option>
                    <option value="Gareng Mudheng">Gareng Mudheng</option>
                </select>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary" id="button-secondary">Batal</a>
        </form>
    </div>
@endsection
