@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
       <h4 class="card-header">Tambah Data</h4>
        <form action="{{ route('admin.fasilitas.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
                <label>Nama Fasilitas</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}"/>
                @if($errors->has('nama'))
                   {{ $errors->first('nama') }}
                @endif
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" name="kategori" required="">
                    <option value=""></option>
                    <option value="Sarana">Sarana</option>
                    <option value="Prasarana">Prasarana</option>
                </select>
                @if($errors->has('kategori'))
                    {{ $errors->first('kategori') }}
                @endif
            </div>
          </div>
          <div class="card-footer">
             <div class="form-group mb-0">
                <div class="row px-3 align-items-center justify-content-end">
                    <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-secondary mr-2">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
             </div>
          </div>
       </form>
    </div>
 </div>
@endsection
