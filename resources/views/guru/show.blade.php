@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
       <h4 class="card-header">Data Detail - {{ $guru->name }}</h4>
       <form action="" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value="{{ $guru->name }}" readonly/>
                @if($errors->has('name'))
                   {{ $errors->first('name') }}
                @endif
            </div>
            <div class="row">
                <div class="col pr-0">
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="{{ $guru->tempat_lahir }}" readonly/>
                        @if($errors->has('tempat_lahir'))
                           {{ $errors->first('tempat_lahir') }}
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="{{ $guru->tanggal_lahir }}" readonly/>
                        @if($errors->has('tanggal_lahir'))
                           {{ $errors->first('tanggal_lahir') }}
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" required="" disabled>
                    <option value=""></option>
                    <option value="Laki-Laki" {{$guru->jenis_kelamin === "Laki-Laki" ? "selected" : ""}}>Laki - Laki</option>
                    <option value="Perempuan" {{$guru->jenis_kelamin === "Perempuan" ? "selected" : ""}}>Perempuan</option>
                </select>
                @if($errors->has('jenis_kelamin'))
                    {{ $errors->first('jenis_kelamin') }}
                @endif
            </div>
            <div class="form-group">
                <label>Guru Mata Pelajaran</label>
                <input type="text" name="guru_mapel" class="form-control" value="{{ $guru->guru_mapel }}" readonly/>
                @if($errors->has('guru_mapel'))
                   {{ $errors->first('guru_mapel') }}
                @endif
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" rows="3" readonly>{{ $guru->alamat }}</textarea>
                @if($errors->has('alamat'))
                    {{ $errors->first('alamat') }}
                @endif
            </div>
            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" name="nomor_telepon" class="form-control" value="{{ $guru->nomor_telepon }}" readonly/>
                @if($errors->has('nomor_telepon'))
                   {{ $errors->first('nomor_telepon') }}
                @endif
            </div>
            <div class="form-group">
                <label>Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $guru->email }}" required autocomplete="email" readonly>
                @if($errors->has('email'))
                    {{ $errors->first('email') }}
                @endif
            </div>
          </div>
          <div class="card-footer">
             <div class="form-group mb-0">
                <div class="row px-3 align-items-center justify-content-end">
                    @if (Auth::guard('admin')->check())
                        <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">Kembali</a>
                    @elseif (Auth::guard('guru')->check())
                        <a href="{{ route('guru.guru.index') }}" class="btn btn-secondary">Kembali</a>
                    @endif
                </div>
             </div>
          </div>
       </form>
    </div>
 </div>
@endsection
