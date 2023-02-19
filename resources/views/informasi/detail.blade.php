@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if ($informasi->foto != NULL)
                    <img class="mb-3 card-img-top"  src="{{ url('storage/informasi/' . $informasi->foto) }}"/>
                @endif
                <div class="card-body">
                    {{-- @if ($informasi->foto != NULL)
                        <img class="mb-3" width="auto" height="320" src="{{ url('storage/informasi/' . $informasi->foto) }}"/>
                    @endif --}}
                    <h3 class="card-title">{{ $informasi->judul }}</h3>
                    <p class="card-text text-secondary">Diupload pada {{ $informasi->created_at->format("j F, Y")}}</p>
                    <p class="card-text">{{ $informasi->detail_info }}</p>
                </div>
                <div class="card-footer">
                    <div class="form-group mb-0">
                    <div class="row px-3 align-items-center justify-content-end">
                        @if (Auth::guard('admin')->check())
                            <a href="{{ route('admin.informasi.index') }}" class="btn btn-secondary">Kembali</a>
                        @elseif (Auth::guard('guru')->check())
                            <a href="{{ route('guru.informasi.card') }}" class="btn btn-secondary">Kembali</a>
                        @elseif (Auth::guard('web')->check())
                            <a href="{{ route('user.informasi.index') }}" class="btn btn-secondary">Kembali</a>
                        @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection
