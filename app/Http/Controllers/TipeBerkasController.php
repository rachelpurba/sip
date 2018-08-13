<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\TipeBerkas;
use App\TipeKegiatan;

class TipeBerkasController extends Controller
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
        $tipeberkass = TipeBerkas::orderBy('nama_tipe_berkas', 'asc')->get();
        return view('tipeberkas.index', compact('tipeberkass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tipekegiatans = TipeKegiatan::all();
        return view('tipeberkas.create', compact('tipekegiatans'));
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
            'nama_tipe_berkas' => 'required'
        ]);
        $tipeberkas = new TipeBerkas;
        $tipeberkas->nama_tipe_berkas = $request->input('nama_tipe_berkas');
        $tipeberkas->save();

        $tipeberkas->tipekegiatan()->sync($request->tipekegiatans, false);
        Session::flash('success', 'Tipe Berkas Kegiatan Berhasil Ditambah');
        return redirect()->route('tipeberkas.index');
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
        $tipeberkas = TipeBerkas::findOrFail($id);
        $tipekegiatans = TipeKegiatan::all();
        return view('tipeberkas.edit', compact('tipeberkas', 'tipekegiatans'));
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
        $tipeberkas = TipeBerkas::findOrFail($id);
        $this->validate($request, [
            'nama_tipe_berkas' => 'required'
        ]);
        $tipeberkas = TipeBerkas::findOrFail($id);
        $tipeberkas->nama_tipe_berkas = $request->input('nama_tipe_berkas');
        $tipeberkas->save();

        $tipeberkas->tipekegiatan()->detach();
        $tipeberkas->tipekegiatan()->attach($request->tipekegiatans);
        Session::flash('success', 'Tipe Berkas Kegiatan Berhasil Diubah');
        return redirect()->route('tipeberkas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tipeberkas = TipeBerkas::findOrFail($request->delete_id);
        $tipeberkas->tipekegiatan()->detach();
        $tipeberkas->delete();
        Session::flash('success', 'Tipe Berkas Kegiatan Berhasil Dihapus');
        return redirect()->route('tipeberkas.index');
    }
}
