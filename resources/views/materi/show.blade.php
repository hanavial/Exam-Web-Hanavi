@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
       <h4 class="card-header">Data Detail - {{ $materi->nama }}</h4>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
                <label>Nama Materi</label>
                <input type="text" name="nama" class="form-control" value="{{ $materi->nama }}" readonly/>
                @if($errors->has('nama'))
                   {{ $errors->first('nama') }}
                @endif
            </div>
            <div class="row">
                <div class="col pr-0">
                    <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <input type="text" name="mapel" class="form-control" value="{{ $materi->mapel }}" readonly/>
                        @if($errors->has('mapel'))
                           {{ $errors->first('mapel') }}
                        @endif
                    </div>
                </div>
                <div class="col pr-0">
                    <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" name="kelas" class="form-control" value="{{ $materi->kelas }}" readonly/>
                        @if($errors->has('kelas'))
                           {{ $errors->first('kelas') }}
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" name="keterangan" rows="3" readonly>{{ $materi->keterangan }}</textarea>
                @if($errors->has('keterangan'))
                    {{ $errors->first('keterangan') }}
                @endif
            </div>
            @if($materi->file != NULL)
            <div class="form-group">
                <label>File Materi</label>
                <div class="col-md-6 pl-0">
                    @if (Auth::guard('admin')->check())
                        <a href="{{ route('admin.materi.download', $materi->file) }}" class="btn btn-primary">Download File Materi</a>
                    @elseif (Auth::guard('guru')->check())
                        <a href="{{ route('guru.materi.download', $materi->file) }}" class="btn btn-primary">Download File Materi</a>
                    @elseif (Auth::guard('web')->check())
                        <a href="{{ route('user.materi.download', $materi->file) }}" class="btn btn-primary">Download File Materi</a>
                    @endif
                </div>
                @if($errors->has('file'))
                   {{ $errors->first('file') }}
                @endif
            </div>
            @endif
          </div>
          <div class="card-footer">
             <div class="form-group mb-0">
                <div class="row px-3 align-items-center justify-content-end">
                    @if (Auth::guard('admin')->check())
                        <a href="{{ route('admin.materi.index') }}" class="btn btn-secondary">Kembali</a>
                    @elseif (Auth::guard('guru')->check())
                        <a href="{{ route('guru.materi.index') }}" class="btn btn-secondary">Kembali</a>
                    @elseif (Auth::guard('web')->check())
                        <a href="{{ route('user.materi.index') }}" class="btn btn-secondary">Kembali</a>
                    @endif
                </div>
             </div>
          </div>
       </form>
    </div>
 </div>
@endsection
