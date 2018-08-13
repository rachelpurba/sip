<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Kategori;
use App\TipeKegiatan;

class KategoriController extends Controller
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
        $kategoris = Kategori::orderBy('nama_kategori', 'asc')->get();
        return view('kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tipekegiatans = TipeKegiatan::all();
        return view('kategori.create', compact('tipekegiatans'));
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
            'nama_kategori' => 'required',
            'tipekegiatan' => 'required',
            'keterangan' => 'required',
        ]);
        $kategori = new Kategori;
        $kategori->nama_kategori = $request->input('nama_kategori');
        $kategori->id_tipe_kegiatan = $request->input('tipekegiatan');
        $kategori->keterangan = $request->input('keterangan');
        $kategori->save();

        Session::flash('success', 'Kategori Peneliti Berhasil Ditambah');
        return redirect()->route('kategori.index');
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
        $kategori = Kategori::findOrFail($id);
        $tipekegiatans = TipeKegiatan::all();
        return view('kategori.edit', compact('kategori', 'tipekegiatans'));
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
        $kategori = Kategori::findOrFail($id);
        $this->validate($request, [
            'nama_kategori' => 'required',
            'tipekegiatan' => 'required',
            'keterangan' => 'required',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->input('nama_kategori');
        $kategori->id_tipe_kegiatan = $request->input('tipekegiatan');
        $kategori->keterangan = $request->input('keterangan');
        $kategori->save();

        Session::flash('success', 'Kategori Kegiatan Berhasil Diubah');
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $kategori = Kategori::findOrFail($request->delete_id);
        $kategori->delete();
        Session::flash('success', 'Kategori Kegiatan Berhasil Dihapus');
        return redirect()->route('kategori.index');
    }
}
