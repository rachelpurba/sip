<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Peran;
use App\TipeKegiatan;

class PeranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('preventBackLogout');
        $this->middleware('auth');
    }
    
    public function index()
    {
        $perans = Peran::orderBy('nama_peran', 'asc')->get();
        return view('peran.index', compact('perans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tipekegiatans = TipeKegiatan::all();
        return view('peran.create', compact('tipekegiatans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_peran' => 'required'
        ]);
        $peran = new Peran;
        $peran->nama_peran = $request->input('nama_peran');
        $peran->save();

        $peran->tipekegiatan()->sync($request->tipekegiatans, false);
        Session::flash('success', 'Peran Peneliti Berhasil Ditambah');
        return redirect()->route('peran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peran = Peran::findOrFail($id);
        $tipekegiatans = TipeKegiatan::all();
        return view('peran.edit', compact('peran', 'tipekegiatans'));
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
        $peran = Peran::findOrFail($id);
        $this->validate($request, [
            'nama_peran' => 'required'
        ]);
        $peran = Peran::findOrFail($id);
        $peran->nama_peran = $request->input('nama_peran');
        $peran->save();

        $peran->tipekegiatan()->detach();
        $peran->tipekegiatan()->attach($request->tipekegiatans);
        Session::flash('success', 'Peran Peneliti Berhasil Diubah');
        return redirect()->route('peran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $peran = Peran::findOrFail($request->delete_id);
        $peran->tipekegiatan()->detach();
        $peran->delete();
        Session::flash('success', 'Peran Peneliti Berhasil Dihapus');
        return redirect()->route('peran.index');
    }
}
