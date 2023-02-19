<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->guard('web')->user()) {
            $materi = Materi::where('kelas', auth()->guard('web')->user()->kelas)->orderBy('created_at', 'DESC')->get();
        } elseif (auth()->guard('guru')->user()) {
            $materi = Materi::where('mapel', auth()->guard('guru')->user()->guru_mapel)->orderBy('created_at', 'DESC')->get();
        } else {
            $materi = Materi::orderBy('created_at', 'DESC')->get();
        }
        return view('materi.index',compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materi.create');
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
            'nama' => ['required', 'string', 'max:255'],
            'mapel' => ['required', 'string', 'max:255'],
            'kelas' => ['required', 'string', 'max:255'],
            'keterangan' => ['required'],
            'file' => ['required'],
        ]);

        $datetime = Carbon::now();
        $file = $request->file('file');
        $file_name = $datetime->format("Y-m-d-H-i-s").'-'.$file->getClientOriginalName();
        $file->storeAs('public/materi',$file_name);
        $file_materi = $file_name;

        Materi::create([
            'nama' => $request->nama,
            'mapel' => $request->mapel,
            'kelas' => $request->kelas,
            'keterangan' => $request->keterangan,
            'file' => $file_materi,
        ]);


        if (auth()->guard('admin')->user()) {
            return redirect()->route('admin.materi.index');
        } elseif (auth()->guard('guru')->user()) {
            return redirect()->route('guru.materi.index');
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
        $materi = Materi::findOrFail($id);
        return view('materi.show',compact('materi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materi = Materi::findOrFail($id);
        return view('materi.edit',compact('materi'));
    }

    /**
     * Downloading file.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($file)
    {
        $path = public_path('storage/materi/' . $file);
        $file_name = $file;

        return Response::download($path, $file_name);
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
        $materi = Materi::findOrFail($id);

        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'mapel' => ['required', 'string', 'max:255'],
            'kelas' => ['required', 'string', 'max:255'],
            'keterangan' => ['required'],
        ]);

        if ($request->file('file')) {
            $datetime = Carbon::now();
            $file = $request->file('file');
            $file_name = $datetime->format("Y-m-d-H-i-s").'-'.$file->getClientOriginalName();
            $file->storeAs('public/materi',$file_name);
            $file_materi = $file_name;
            Storage::delete('public/materi/' . $materi->file);

            $materi->update([
                'nama' => $request->nama,
                'mapel' => $request->mapel,
                'kelas' => $request->kelas,
                'keterangan' => $request->keterangan,
                'file' => $file_materi,
            ]);
        } else {
            $materi->update([
                'nama' => $request->nama,
                'mapel' => $request->mapel,
                'kelas' => $request->kelas,
                'keterangan' => $request->keterangan,
            ]);
        }

        if (auth()->guard('admin')->user()) {
            return redirect()->route('admin.materi.index');
        } elseif (auth()->guard('guru')->user()) {
            return redirect()->route('guru.materi.index');
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
        $materi = Materi::findOrFail($id);
        Storage::delete('public/materi/' . $materi->file);
        $materi->delete();

        if (auth()->guard('admin')->user()) {
            return redirect()->route('admin.materi.index');
        } elseif (auth()->guard('guru')->user()) {
            return redirect()->route('guru.materi.index');
        }
    }
}
