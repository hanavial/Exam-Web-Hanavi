@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4 px-3 align-items-center justify-content-between">
        <h4>Event Sekolah</h4>
        <div>
            @if (Auth::guard('admin')->check())
                <a class="btn btn-primary" href="{{ route('admin.event.create') }}">Tambah Data</a>
            @elseif (Auth::guard('guru')->check())
                <a class="btn btn-primary" href="{{ route('guru.event.create') }}">Tambah Data</a>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped table-inverse table-hover mb-0">
                <thead class="thead-inverse">
                    <tr>
                        <th style="border-top: none">Nama Event</th>
                        <th style="border-top: none">Tanggal Event</th>
                        <th style="border-top: none">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($event as $item)
                    <tr>
                        <td scope="row">{{ $item->nama }}</td>
                        <td>{{ $item->tanggal_event }}</td>
                        <td>
                            @if (Auth::guard('admin')->check())
                                <div class="row justify-content-start pl-3">
                                    <a href="{{ route('admin.event.show', $item->id) }}" class="btn btn-info btn-sm mr-1">Detail</a>
                                    <a href="{{ route('admin.event.edit', $item->id) }}" class="btn btn-secondary btn-sm mr-1">Edit</a>
                                    <form action="{{ route('admin.event.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Hapus</button>
                                    </form>
                                </div>
                            @elseif (Auth::guard('guru')->check())
                                <div class="row justify-content-start pl-3">
                                    <a href="{{ route('guru.event.show', $item->id) }}" class="btn btn-info btn-sm mr-1">Detail</a>
                                    <a href="{{ route('guru.event.edit', $item->id) }}" class="btn btn-secondary btn-sm mr-1">Edit</a>
                                    <form action="{{ route('guru.event.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Hapus</button>
                                    </form>
                                </div>
                            @elseif (Auth::guard('web')->check())
                                <div class="row justify-content-start pl-3">
                                    <a href="{{ route('user.event.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
