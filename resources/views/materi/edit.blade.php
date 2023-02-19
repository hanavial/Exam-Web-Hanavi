@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
       <h4 class="card-header">Edit Data</h4>
        @if (Auth::guard('admin')->check())
            <form action="{{ route('admin.materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
        @elseif (Auth::guard('guru')->check())
            <form action="{{ route('guru.materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
        @endif
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="form-group">
                <label>Nama Materi</label>
                <input type="text" name="nama" class="form-control" value="{{ $materi->nama }}"/>
                @if($errors->has('nama'))
                   {{ $errors->first('nama') }}
                @endif
            </div>
            <div class="row">
                <div class="col pr-0">
                    <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <input type="text" name="mapel" class="form-control" value="{{ $materi->mapel }}"/>
                        @if($errors->has('mapel'))
                           {{ $errors->first('mapel') }}
                        @endif
                    </div>
                </div>
                <div class="col pr-0">
                    <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" name="kelas" class="form-control" value="{{ $materi->kelas }}"/>
                        @if($errors->has('kelas'))
                           {{ $errors->first('kelas') }}
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" name="keterangan" rows="3" >{{ $materi->keterangan }}</textarea>
                @if($errors->has('keterangan'))
                    {{ $errors->first('keterangan') }}
                @endif
            </div>
            <div class="form-group">
                <label>Upload File Materi</label>
                <input type="file" name="file" class="form-control-file"/>
                @if($materi->file != NULL)
                    @if (Auth::guard('admin')->check())
                        <a href="{{ route('admin.materi.download', $materi->file) }}" class="mt-2 btn btn-primary">Download File Materi</a>
                    @elseif (Auth::guard('guru')->check())
                        <a href="{{ route('guru.materi.download', $materi->file) }}" class="mt-2 btn btn-primary">Download File Materi</a>
                    @elseif (Auth::guard('web')->check())
                        <a href="{{ route('user.materi.download', $materi->file) }}" class="mt-2 btn btn-primary">Download File Materi</a>
                    @endif
                @endif
                @if($errors->has('file'))
                   {{ $errors->first('file') }}
                @endif
            </div>
          </div>
          <div class="card-footer">
             <div class="form-group mb-0">
                <div class="row px-3 align-items-center justify-content-end">
                    @if (Auth::guard('admin')->check())
                        <a href="{{ route('admin.materi.index') }}" class="btn btn-secondary mr-2">Kembali</a>
                    @elseif (Auth::guard('guru')->check())
                        <a href="{{ route('guru.materi.index') }}" class="btn btn-secondary mr-2">Kembali</a>
                    @endif
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
             </div>
          </div>
       </form>
    </div>
 </div>
@endsection
