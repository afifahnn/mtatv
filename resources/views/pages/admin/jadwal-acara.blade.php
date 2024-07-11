@extends('admin-main-layout')

@section('contents')
    <div class="container">
        <h2>Welcome to the Admin Dashboard</h2>
        <p>This is the main content area for the admin dashboard.</p>
    </div>
    <div class="container">
        <div class="head">
            <h2>Daftar Jadwal Acara</h2>
            <a href="{{ route('admin.jadwal.create') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Tambah Jadwal
            </a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Program Acara</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Hari</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($sortedJadwals as $jadwal)
                <tr>
                    <td>{{ $jadwal->program_acara }}</td>
                    <td>{{ $jadwal->jam_mulai }}</td>
                    <td>{{ $jadwal->jam_selesai }}</td>
                    <td>{{ $jadwal->hari }}</td>
                    <td>
                        <div class="aksi">
                            <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}" class="btn btn-sm btn-primary" id="button-secondary">Edit</a>
                            <form action="{{ route('admin.jadwal.delete', $jadwal->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button style="font-family: 'Poppins', sans-serif" type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus jadwal acara ini?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
