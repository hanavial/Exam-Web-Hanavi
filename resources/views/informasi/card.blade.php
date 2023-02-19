@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4 px-3 align-items-center justify-content-between">
        <h4>Informasi Sekolah</h4>
        <div>
            @if (Auth::guard('admin')->check())
                <a class="btn btn-primary" href="{{ route('admin.informasi.create') }}">Tambah Data</a>
            @elseif (Auth::guard('guru')->check())
                <a class="btn btn-outline-info" href="{{ route('guru.informasi.index') }}">Lihat dalam Table View</a>
                <a class="btn btn-primary" href="{{ route('guru.informasi.create') }}">Tambah Data</a>
            @endif
        </div>
    </div>
    @foreach ($informasi as $item)
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title">{{ $item->judul }}</h4>
                <p class="card-text">Diupload pada {{ $item->created_at->format("j F, Y")}}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('guru.informasi.detail', $item->id) }}" class="btn btn-sm btn-primary mr-1">Lihat Detail</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
