<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasi = Informasi::orderBy('created_at', 'DESC')->get();
        return view('informasi.index',compact('informasi'));
    }

    public function card()
    {
        $informasi = Informasi::orderBy('created_at', 'DESC')->get();
        return view('informasi.card',compact('informasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('informasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'detail_info' => ['required'],
            'foto' => ['mimes:jpeg,jpg,bmp,png,gif,svg'],
        ]);

        if ($request->file('foto')) {
            $datetime = Carbon::now();
            $file = $request->file('foto');
            $file_name = $datetime->format("Y-m-d-H-i-s").'-'.$file->getClientOriginalName();
            $file->storeAs('public/informasi',$file_name);
            $file_foto = $file_name;
        } else {
            $file_foto = NULL;
        }

        Informasi::create([
            'judul' => $request->judul,
            'detail_info' => $request->detail_info,
            'foto' => $file_foto,
        ]);

        if (auth()->guard('admin')->user()) {
            return redirect()->route('admin.informasi.index');
        } elseif (auth()->guard('guru')->user()) {
            return redirect()->route('guru.informasi.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('informasi.show',compact('informasi'));
    }

    public function detail($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('informasi.detail',compact('informasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('informasi.edit',compact('informasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $informasi = Informasi::findOrFail($id);

        $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'detail_info' => ['required'],
            'foto' => ['mimes:jpeg,jpg,bmp,png,gif,svg'],
        ]);

        if ($request->file('foto')) {
            $datetime = Carbon::now();
            $file = $request->file('foto');
            $file_name = $datetime->format("Y-m-d-H-i-s").'-'.$file->getClientOriginalName();
            $file->storeAs('public/informasi',$file_name);
            $file_foto = $file_name;
            Storage::delete('public/informasi/' . $informasi->foto);

            $informasi->update([
                'judul' => $request->judul,
                'detail_info' => $request->detail_info,
                'foto' => $file_foto,
            ]);
        } else {
            $informasi->update([
                'judul' => $request->judul,
                'detail_info' => $request->detail_info,
            ]);
        }

        if (auth()->guard('admin')->user()) {
            return redirect()->route('admin.informasi.index');
        } elseif (auth()->guard('guru')->user()) {
            return redirect()->route('guru.informasi.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);
        Storage::delete('public/informasi/' . $informasi->foto);
        $informasi->delete();

        if (auth()->guard('admin')->user()) {
            return redirect()->route('admin.informasi.index');
        } elseif (auth()->guard('guru')->user()) {
            return redirect()->route('guru.informasi.index');
        }
    }
}
