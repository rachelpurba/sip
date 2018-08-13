<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\TipeKegiatan;

class TipeKegiatanController extends Controller
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
        $tipekegiatans = TipeKegiatan::orderBy('nama_tipe_kegiatan', 'asc')->get();
        return view('tipekegiatan.index', compact('tipekegiatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('tipekegiatan.create', compact('tipekegiatans'));
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
            'nama_tipe_kegiatan' => 'required',
            'dokumentasi' => 'required'
        ]);
        $tipekegiatan = new TipeKegiatan;
        $tipekegiatan->nama_tipe_kegiatan = $request->input('nama_tipe_kegiatan');
        $tipekegiatan->dokumentasi = $request->input('dokumentasi');
        $tipekegiatan->save();

        Session::flash('success', 'Tipe Kegiatan Berhasil Ditambah');
        return redirect()->route('tipekegiatan.index');
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
        $tipekegiatan = TipeKegiatan::findOrFail($id);
        return view('tipekegiatan.edit', compact('tipekegiatan'));
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
        $tipekegiatan = TipeKegiatan::findOrFail($id);
        $this->validate($request, [
            'nama_tipe_kegiatan' => 'required',
            'dokumentasi' => 'required'
        ]);
        $tipekegiatan = TipeKegiatan::findOrFail($id);
        $tipekegiatan->nama_tipe_kegiatan = $request->input('nama_tipe_kegiatan');
        $tipekegiatan->dokumentasi = $request->input('dokumentasi');
        $tipekegiatan->save();

        Session::flash('success', 'Tipe Kegiatan Peneliti Berhasil Diubah');
        return redirect()->route('tipekegiatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tipekegiatan = TipeKegiatan::findOrFail($request->delete_id);
        $tipekegiatan->delete();
        Session::flash('success', 'Tipe Kegiatan Berhasil Dihapus');
        return redirect()->route('tipekegiatan.index');
    }
}
