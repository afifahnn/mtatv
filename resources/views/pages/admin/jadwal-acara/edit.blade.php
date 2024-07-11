@extends('admin-main-layout')

@section('contents')
    <div class="container">
        <h2>Edit Jadwal Acara</h2>
        <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="program_acara">Program Acara</label>
                <input type="text" name="program_acara" id="program_acara" class="form-control" value="{{ $jadwal->program_acara }}" required>
            </div>
            <div class="form-group">
                <label for="jam_mulai">Jam Mulai</label>
                <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" value="{{ $jadwal->jam_mulai }}" required>
            </div>
            <div class="form-group">
                <label for="jam_selesai">Jam Selesai</label>
                <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" value="{{ $jadwal->jam_selesai }}" required>
            </div>
            <div class="form-group">
                <label for="hari">Hari</label>
                <select name="hari" id="hari" class="form-control" required>
                    <option value="Senin" {{ $jadwal->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                    <option value="Selasa" {{ $jadwal->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                    <option value="Rabu" {{ $jadwal->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                    <option value="Kamis" {{ $jadwal->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                    <option value="Jumat" {{ $jadwal->hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                    <option value="Sabtu" {{ $jadwal->hari == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                    <option value="Minggu" {{ $jadwal->hari == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary" id="button-secondary">Batal</a>
        </form>
    </div>
@endsection
