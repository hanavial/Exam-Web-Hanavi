@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
       <h4 class="card-header">Edit Data</h4>
        @if (Auth::guard('admin')->check())
            <form action="{{ route('admin.informasi.update', $informasi->id) }}" method="POST" enctype="multipart/form-data">
        @elseif (Auth::guard('guru')->check())
            <form action="{{ route('guru.informasi.update', $informasi->id) }}" method="POST" enctype="multipart/form-data">
        @endif
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="form-group">
                <label>Judul Informasi</label>
                <input type="text" name="judul" class="form-control" value="{{ $informasi->judul }}"/>
                @if($errors->has('judul'))
                   {{ $errors->first('judul') }}
                @endif
            </div>
            <div class="form-group">
                <label>Detail Informasi</label>
                <textarea class="form-control" name="detail_info" rows="3" >{{ $informasi->detail_info }}</textarea>
                @if($errors->has('detail_info'))
                    {{ $errors->first('detail_info') }}
                @endif
            </div>
            <div class="form-group">
                <label>Upload Foto</label>
                <div class="col-md-6 pl-0">
                    @if ($informasi->foto != NULL)
                        <img width="auto" height="200" src="{{ url('storage/informasi/' . $informasi->foto) }}"/>
                        <input type="file" name="foto" class="form-control-file mt-3"/>
                    @else
                        <input type="file" name="foto" class="form-control-file"/>
                    @endif
                </div>
                @if($errors->has('foto'))
                   {{ $errors->first('foto') }}
                @endif
            </div>
          </div>
          <div class="card-footer">
             <div class="form-group mb-0">
                <div class="row px-3 align-items-center justify-content-end">
                    @if (Auth::guard('admin')->check())
                        <a href="{{ route('admin.informasi.index') }}" class="btn btn-secondary mr-2">Kembali</a>
                    @elseif (Auth::guard('guru')->check())
                        <a href="{{ route('guru.informasi.index') }}" class="btn btn-secondary mr-2">Kembali</a>
                    @endif
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
             </div>
          </div>
       </form>
    </div>
 </div>
@endsection
