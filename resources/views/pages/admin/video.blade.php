@extends('admin-main-layout')

@section('contents')
    <div class="container">
        <h2>Welcome to the Admin Dashboard</h2>
        <p>This is the main content area for the admin dashboard.</p>
    </div>
    <div class="container">
        <div class="head">
            <h2>Daftar Video</h2>
            <a href="{{ route('admin.video.create') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Tambah Video
            </a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Judul</th>
{{--                <th>Link Embed</th>--}}
                <th>Tanggal Upload</th>
                <th>Jenis</th>
{{--                <th>Deskripsi</th>--}}
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($videos as $video)
                <tr>
                    <td>{{ $video->judul }}</td>
{{--                    <td>{{ $video->link_embed }}</td>--}}
                    <td>{{ $video->tanggal_upload }}</td>
                    <td>{{ $video->jenis }}</td>
{{--                    <td>{{ $video->deskripsi }}</td>--}}
                    <td>
                        <div class="aksi">
                            <a href="{{ route('admin.video.edit', $video->id) }}" class="btn btn-sm btn-primary" id="button-secondary">Edit</a>
                            <form action="{{ route('admin.video.delete', $video->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button style="font-family: 'Poppins', sans-serif" type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus video ini?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
