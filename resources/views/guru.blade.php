@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard Guru') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hello {{ Auth::user()->name }}!
                </div>
            </div>
            <div class="row mb-3 mt-4 px-3 align-items-center justify-content-between">
                <h5 class="mb-1">Informasi Sekolah</h5>
                <div>
                    <a class="btn btn-sm btn-primary" href="{{ route('guru.informasi.card') }}">Lihat Semua</a>
                </div>
            </div>
            @foreach ($informasi as $item)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <p class="card-text">Diupload pada {{ $item->created_at->format("j F, Y")}}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('guru.informasi.detail', $item->id) }}" class="btn btn-sm btn-primary mr-1">Lihat Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
