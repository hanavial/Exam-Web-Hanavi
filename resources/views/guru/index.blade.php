@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4 px-3 align-items-center justify-content-between">
        <h4>Data Guru</h4>
        <div>
            @if (Auth::guard('admin')->check())
                <a class="btn btn-primary" href="{{ route('admin.guru.create') }}">Tambah Data</a>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped table-inverse table-hover mb-0">
                <thead class="thead-inverse">
                    <tr>
                        <th style="border-top: none">Nama</th>
                        <th style="border-top: none">TTL</th>
                        <th style="border-top: none">Jenis Kelamin</th>
                        <th style="border-top: none">Guru Mata Pelajaran</th>
                        <th style="border-top: none">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guru as $item)
                    <tr>
                        @if (Auth::guard('guru')->check())
                            @if (Auth::guard('guru')->user()->name == $item->name)
                                <td scope="row">{{ $item->name }} (Anda)</td>
                            @else
                                <td scope="row">{{ $item->name }}</td>
                            @endif
                        @else
                            <td scope="row">{{ $item->name }}</td>
                        @endif
                        <td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->guru_mapel }}</td>
                        <td>
                            @if (Auth::guard('admin')->check())
                                <div class="row justify-content-start pl-3">
                                    <a href="{{ route('admin.guru.show', $item->id) }}" class="btn btn-info btn-sm mr-1">Detail</a>
                                    <a href="{{ route('admin.guru.edit', $item->id) }}" class="btn btn-secondary btn-sm mr-1">Edit</a>
                                    <form action="{{ route('admin.guru.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Hapus</button>
                                    </form>
                                </div>
                            @elseif (Auth::guard('guru')->check())
                                @if (Auth::guard('guru')->user()->name == $item->name)
                                    <div class="row justify-content-start pl-3">
                                        <a href="{{ route('guru.guru.show', $item->id) }}" class="btn btn-info btn-sm mr-1">Detail</a>
                                        <a href="{{ route('guru.guru.edit', $item->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                    </div>
                                @else
                                    <div class="row justify-content-start pl-3">
                                        <a href="{{ route('guru.guru.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    </div>
                                @endif
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
