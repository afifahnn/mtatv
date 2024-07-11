@extends('admin-main-layout')

@section('contents')
    <div class="container">
        <h2>Welcome to the Admin Dashboard</h2>
        <p>This is the main content area for the admin dashboard.</p>
    </div>
    <div class="container">
        <div class="head">
            <h2>Daftar Berita</h2>
            <a href="{{ route('admin.berita.create') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Tambah Berita
            </a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Judul</th>
{{--                <th>Isi</th>--}}
                <th>Tanggal Upload</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($beritas as $berita)
                <tr>
                    <td>{{ $berita->judul }}</td>
{{--                    <td>{{ $berita->isi }}</td>--}}
                    <td>{{ $berita->tanggal_upload }}</td>
                    <td>
                        <div class="aksi">
                            <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-sm btn-primary" id="button-secondary">Edit</a>
                            <form action="{{ route('admin.berita.delete', $berita->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button style="font-family: 'Poppins', sans-serif" type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus berita ini?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
