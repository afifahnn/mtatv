@extends('admin-main-layout')

@section('contents')
    <div class="container">
        <h2>Buat Jadwal Acara Baru</h2>
        <form action="{{ route('admin.jadwal.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="program_acara">Program Acara</label>
                <input type="text" name="program_acara" id="program_acara" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jam_mulai">Jam Mulai</label>
                <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jam_selesai">Jam Selesai</label>
                <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="hari">Hari</label>
                <select name="hari" id="hari" class="form-control" required>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary" id="button-secondary">Batal</a>
        </form>
    </div>
@endsection
