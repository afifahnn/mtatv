@extends('admin-main-layout')

@section('contents')
    <div class="container">
        <h2>Edit Talkshow</h2>
        <form action="{{ route('admin.talkshow.update', $talkshow->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" value="{{ $talkshow->judul }}" required>
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" id="link" class="form-control" value="{{ $talkshow->link_embed }}" required>
            </div>
            <div class="form-group">
                <label for="tanggal_upload">Tanggal Upload</label>
                <input type="date" name="tanggal_upload" id="tanggal_upload" class="form-control" value="{{ $talkshow->tanggal_upload }}" required>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis</label>
                <select name="jenis" id="jenis" class="form-control" required>
                    <option value="">Jenis</option>
                    <option value="Hikmah" {{ $talkshow->jenis == 'Hikmah' ? 'selected' : '' }}>Hikmah</option>
                    <option value="Anugerah" {{ $talkshow->jenis == 'Anugerah' ? 'selected' : '' }}>Anugerah</option>
                    <option value="Wedangan" {{ $talkshow->jenis == 'Wedangan' ? 'selected' : '' }}>Wedangan</option>
                    <option value="Sowan Dokter" {{ $talkshow->jenis == 'Sowan Dokter' ? 'selected' : '' }}>Sowan Dokter</option>
                    <option value="SAR" {{ $talkshow->jenis == 'SAR' ? 'selected' : '' }}>SAR</option>
                    <option value="Wirausaha" {{ $talkshow->jenis == 'Wirausaha' ? 'selected' : '' }}>Wirausaha</option>
                    <option value="BIM" {{ $talkshow->jenis == 'BIM' ? 'selected' : '' }}>BIM</option>
                    <option value="Saatnya Wanita Berbicara (SWB)" {{ $talkshow->jenis == 'Saatnya Wanita Berbicara (SWB)' ? 'selected' : '' }}>Saatnya Wanita Berbicara (SWB)</option>
                    <option value="Fajar Hidayah" {{ $talkshow->jenis == 'Fajar Hidayah' ? 'selected' : '' }}>Fajar Hidayah</option>
                    <option value="Risalah Tafsir" {{ $talkshow->jenis == 'Risalah Tafsir' ? 'selected' : '' }}>Risalah Tafsir</option>
                    <option value="Tahsin" {{ $talkshow->jenis == 'Tahsin' ? 'selected' : '' }}>Tahsin</option>
                    <option value="Risalah Hadits" {{ $talkshow->jenis == 'Risalah Hadits' ? 'selected' : '' }}>Risalah Hadits</option>
                    <option value="Gempita Nusa Terunan" {{ $talkshow->jenis == 'Gempita Nusa Terunan' ? 'selected' : '' }}>Gempita Nusa Terunan</option>
                    <option value="Kota Kita" {{ $talkshow->jenis == 'Kota Kita' ? 'selected' : '' }}>Kota Kita</option>
                    <option value="Risalah Mudzakaroh" {{ $talkshow->jenis == 'Risalah Mudzakaroh' ? 'selected' : '' }}>Risalah Mudzakaroh</option>
                    <option value="Hidup Sehat Alami" {{ $talkshow->jenis == 'Hidup Sehat Alami' ? 'selected' : '' }}>Hidup Sehat Alami</option>
                    <option value="Kopi Istimewa" {{ $talkshow->jenis == 'Kopi Istimewa' ? 'selected' : '' }}>Kopi Istimewa</option>
                    <option value="Sehati/Shinta" {{ $talkshow->jenis == 'Sehati/Shinta' ? 'selected' : '' }}>Sehati/Shinta</option>
                    <option value="Ruang Psikologi" {{ $talkshow->jenis == 'Ruang Psikologi' ? 'selected' : '' }}>Ruang Psikologi</option>
                    <option value="Tempo Doeloe" {{ $talkshow->jenis == 'Tempo Doeloe' ? 'selected' : '' }}>Tempo Doeloe</option>
                    <option value="Klinik Kita" {{ $talkshow->jenis == 'Klinik Kita' ? 'selected' : '' }}>Klinik Kita</option>
                    <option value="Seputar Haji" {{ $talkshow->jenis == 'Seputar Haji' ? 'selected' : '' }}>Seputar Haji</option>
                    <option value="Ngleluri" {{ $talkshow->jenis == 'Ngleluri' ? 'selected' : '' }}>Ngleluri</option>
                    <option value="Basa Jawi" {{ $talkshow->jenis == 'Basa Jawi' ? 'selected' : '' }}>Basa Jawi</option>
                    <option value="Stara" {{ $talkshow->jenis == 'Stara' ? 'selected' : '' }}>Stara</option>
                    <option value="Gurit Macapat" {{ $talkshow->jenis == 'Gurit Macapat' ? 'selected' : '' }}>Gurit Macapat</option>
                    <option value="Gareng Mudheng" {{ $talkshow->jenis == 'Gareng Mudheng' ? 'selected' : '' }}>Gareng Mudheng</option>
                </select>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ $talkshow->deskripsi }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary" id="button-secondary">Batal</a>
        </form>
    </div>
@endsection
