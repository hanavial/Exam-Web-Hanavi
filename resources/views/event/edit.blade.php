@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
       <h4 class="card-header">Edit Data</h4>
        @if (Auth::guard('admin')->check())
            <form action="{{ route('admin.event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @elseif (Auth::guard('guru')->check())
            <form action="{{ route('guru.event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @endif
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="form-group">
                <label>Nama Event</label>
                <input type="text" name="nama" class="form-control" value="{{ $event->nama }}"/>
                @if($errors->has('nama'))
                   {{ $errors->first('nama') }}
                @endif
            </div>
            <div class="form-group">
                <label>Tanggal Event</label>
                <input type="date" name="tanggal_event" class="form-control" value="{{ $event->tanggal_event }}"/>
                @if($errors->has('tanggal_event'))
                   {{ $errors->first('tanggal_event') }}
                @endif
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" name="keterangan" rows="3" >{{ $event->keterangan }}</textarea>
                @if($errors->has('keterangan'))
                    {{ $errors->first('keterangan') }}
                @endif
            </div>
          </div>
          <div class="card-footer">
             <div class="form-group mb-0">
                <div class="row px-3 align-items-center justify-content-end">
                    @if (Auth::guard('admin')->check())
                        <a href="{{ route('admin.event.index') }}" class="btn btn-secondary mr-2">Kembali</a>
                    @elseif (Auth::guard('guru')->check())
                        <a href="{{ route('guru.event.index') }}" class="btn btn-secondary mr-2">Kembali</a>
                    @endif
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
             </div>
          </div>
       </form>
    </div>
 </div>
@endsection
