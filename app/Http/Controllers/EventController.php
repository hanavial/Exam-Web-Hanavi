<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::orderBy('tanggal_event', 'ASC')->get();
        return view('event.index',compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
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
            'tanggal_event' => ['required', 'date'],
            'keterangan' => ['required'],
        ]);

        Event::create([
            'nama' => $request->nama,
            'tanggal_event' => $request->tanggal_event,
            'keterangan' => $request->keterangan,
        ]);

        if (auth()->guard('admin')->user()) {
            return redirect()->route('admin.event.index');
        } elseif (auth()->guard('guru')->user()) {
            return redirect()->route('guru.event.index');
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
        $event = Event::findOrFail($id);
        return view('event.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('event.edit',compact('event'));
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
        $event = Event::findOrFail($id);

        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tanggal_event' => ['required', 'date'],
            'keterangan' => ['required'],
        ]);

        $event->update([
            'nama' => $request->nama,
            'tanggal_event' => $request->tanggal_event,
            'keterangan' => $request->keterangan,
        ]);

        if (auth()->guard('admin')->user()) {
            return redirect()->route('admin.event.index');
        } elseif (auth()->guard('guru')->user()) {
            return redirect()->route('guru.event.index');
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
        $event = Event::findOrFail($id);
        $event->delete();

        if (auth()->guard('admin')->user()) {
            return redirect()->route('admin.event.index');
        } elseif (auth()->guard('guru')->user()) {
            return redirect()->route('guru.event.index');
        }
    }
}
