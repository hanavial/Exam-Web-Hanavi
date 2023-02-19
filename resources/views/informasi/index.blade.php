@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4 px-3 align-items-center justify-content-between">
        <h4>Informasi Sekolah</h4>
        <div>
            @if (Auth::guard('admin')->check())
                <a class="btn btn-primary" href="{{ route('admin.informasi.create') }}">Tambah Data</a>
            @elseif (Auth::guard('guru')->check())
                <a class="btn btn-outline-info" href="{{ route('guru.informasi.card') }}">Lihat dalam Card View</a>
                <a class="btn btn-primary" href="{{ route('guru.informasi.create') }}">Tambah Data</a>
            @endif
        </div>
    </div>
    @if (Auth::guard('web')->check())
        @foreach ($informasi as $item)
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">{{ $item->judul }}</h4>
                    <p class="card-text">Diupload pada {{ $item->created_at->format("j F, Y")}}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('user.informasi.detail', $item->id) }}" class="btn btn-sm btn-primary mr-1">Lihat Detail</a>
                </div>
            </div>
        @endforeach
    @else
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped table-inverse table-hover mb-0">
                    <thead class="thead-inverse">
                        <tr>
                            <th style="border-top: none">Judul</th>
                            <th style="border-top: none">Tanggal Upload</th>
                            <th style="border-top: none">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($informasi as $item)
                        <tr>
                            <td scope="row">{{ $item->judul }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                @if (Auth::guard('admin')->check())
                                    <div class="row justify-content-start pl-3">
                                        <a href="{{ route('admin.informasi.show', $item->id) }}" class="btn btn-info btn-sm mr-1">Detail</a>
                                        <a href="{{ route('admin.informasi.edit', $item->id) }}" class="btn btn-secondary btn-sm mr-1">Edit</a>
                                        <form action="{{ route('admin.informasi.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Hapus</button>
                                        </form>
                                    </div>
                                @elseif (Auth::guard('guru')->check())
                                    <div class="row justify-content-start pl-3">
                                        <a href="{{ route('guru.informasi.show', $item->id) }}" class="btn btn-info btn-sm mr-1">Detail</a>
                                        <a href="{{ route('guru.informasi.edit', $item->id) }}" class="btn btn-secondary btn-sm mr-1">Edit</a>
                                        <form action="{{ route('guru.informasi.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Hapus</button>
                                        </form>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
