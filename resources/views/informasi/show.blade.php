@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
       <h4 class="card-header">Data Detail - {{ $informasi->judul }}</h4>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
                <label>Judul Informasi</label>
                <input type="text" name="judul" class="form-control" value="{{ $informasi->judul }}" readonly/>
                @if($errors->has('judul'))
                   {{ $errors->first('judul') }}
                @endif
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="text" name="created_at" class="form-control" value="{{ $informasi->created_at }}" readonly/>
                @if($errors->has('created_at'))
                   {{ $errors->first('created_at') }}
                @endif
            </div>
            <div class="form-group">
                <label>Detail Informasi</label>
                <textarea class="form-control" name="detail_info" rows="3" readonly>{{ $informasi->detail_info }}</textarea>
                @if($errors->has('detail_info'))
                    {{ $errors->first('detail_info') }}
                @endif
            </div>
            @if ($informasi->foto != NULL)
                <div class="form-group">
                    <label>Foto</label>
                    <div class="col-md-6 pl-0">
                        <img width="auto" height="200" src="{{ url('storage/informasi/' . $informasi->foto) }}"/>
                    </div>
                </div>
            @endif
          </div>
          <div class="card-footer">
             <div class="form-group mb-0">
                <div class="row px-3 align-items-center justify-content-end">
                    @if (Auth::guard('admin')->check())
                        <a href="{{ route('admin.informasi.index') }}" class="btn btn-secondary">Kembali</a>
                    @elseif (Auth::guard('guru')->check())
                        <a href="{{ route('guru.informasi.index') }}" class="btn btn-secondary">Kembali</a>
                    @elseif (Auth::guard('web')->check())
                        <a href="{{ route('user.informasi.index') }}" class="btn btn-secondary">Kembali</a>
                    @endif
                </div>
             </div>
          </div>
       </form>
    </div>
 </div>
@endsection
