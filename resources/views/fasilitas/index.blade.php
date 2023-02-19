@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4 px-3 align-items-center justify-content-between">
        <h4>Fasilitas Sekolah</h4>
        <div>
            @if (Auth::guard('admin')->check())
                <a class="btn btn-primary" href="{{ route('admin.fasilitas.create') }}">Tambah Data</a>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped table-inverse table-hover mb-0">
                <thead class="thead-inverse">
                    <tr>
                        <th style="border-top: none">Nama Fasilitas</th>
                        <th style="border-top: none">Kategori</th>
                        @if (Auth::guard('admin')->check())
                            <th style="border-top: none">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fasilitas as $item)
                    <tr>
                        <td scope="row">{{ $item->nama }}</td>
                        <td>{{ $item->kategori }}</td>
                        @if (Auth::guard('admin')->check())
                            <td>
                                <div class="row justify-content-start pl-3">
                                    <a href="{{ route('admin.fasilitas.edit', $item->id) }}" class="btn btn-secondary btn-sm mr-1">Edit</a>
                                    <form action="{{ route('admin.fasilitas.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
