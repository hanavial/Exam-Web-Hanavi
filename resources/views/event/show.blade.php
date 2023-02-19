@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
       <h4 class="card-header">Data Detail - {{ $event->nama }}</h4>
       <form action="" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
                <label>Nama Event</label>
                <input type="text" name="nama" class="form-control" value="{{ $event->nama }}" readonly/>
                @if($errors->has('nama'))
                   {{ $errors->first('nama') }}
                @endif
            </div>
            <div class="form-group">
                <label>Tanggal Event</label>
                <input type="date" name="tanggal_event" class="form-control" value="{{ $event->tanggal_event }}" readonly/>
                @if($errors->has('tanggal_event'))
                   {{ $errors->first('tanggal_event') }}
                @endif
            </div>
            <div class="form-group">
                <label>Keterangam</label>
                <textarea class="form-control" name="keterangan" rows="3" readonly>{{ $event->keterangan }}</textarea>
                @if($errors->has('keterangan'))
                    {{ $errors->first('keterangan') }}
                @endif
            </div>
          </div>
          <div class="card-footer">
             <div class="form-group mb-0">
                <div class="row px-3 align-items-center justify-content-end">
                    @if (Auth::guard('admin')->check())
                        <a href="{{ route('admin.event.index') }}" class="btn btn-secondary">Kembali</a>
                    @elseif (Auth::guard('guru')->check())
                        <a href="{{ route('guru.event.index') }}" class="btn btn-secondary">Kembali</a>
                    @elseif (Auth::guard('web')->check())
                        <a href="{{ route('user.event.index') }}" class="btn btn-secondary">Kembali</a>
                    @endif
                </div>
             </div>
          </div>
       </form>
    </div>
 </div>
@endsection
