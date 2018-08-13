<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Berkas;
use App\Kegiatan;

class BerkasController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'id_kegiatan' => 'required',
            'id_tipe_berkas' => 'required',
            'nama_berkas' => 'file|nullable|max:2000',
            'judul' => 'required',
        ]); 

        $fileNameWithExt = $request->file('nama_berkas')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('nama_berkas')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        $path = $request->file('nama_berkas')->storeAs('public/berkas', $fileNameToStore);

        $berkas = new Berkas;
        $berkas->id_kegiatan = $request->input('id_kegiatan');
        $berkas->id_tipe_berkas = $request->input('id_tipe_berkas');
        $berkas->nama_berkas = $fileNameToStore;
        $berkas->judul = $request->input('judul');
        $berkas->save();
        $kegiatan = Kegiatan::where('id', $berkas->id_kegiatan)->first();
        Session::flash('success', 'Berkas Berhasil Ditambah');
        return redirect()->route('kegiatan.show', $kegiatan->id);
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
        //
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
        $berkas = Berkas::findOrFail($id);
        $this->validate($request, [
            'id_kegiatan' => 'required',
            'id_tipe_berkas' => 'required',
            'nama_berkas' => 'file|nullable|max:2000',
            'judul' => 'required',
        ]); 

        if($request->hasFile('nama_berkas')){
            $fileNameWithExt = $request->file('nama_berkas')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('nama_berkas')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('nama_berkas')->storeAs('public/berkas', $fileNameToStore);
        }

        $berkas = Berkas::findOrFail($id);
        $berkas->id_kegiatan = $request->input('id_kegiatan');
        $berkas->id_tipe_berkas = $request->input('id_tipe_berkas');
        if($request->hasFile('nama_berkas')){
            $oldFileName = $berkas->nama_berkas;
            $berkas->nama_berkas = $fileNameToStore;
            Storage::delete('public/berkas/'.$oldFileName);
        }
        $berkas->judul = $request->input('judul');
        $berkas->save();
        Session::flash('success', 'Berkas Berhasil Diubah');
        return redirect()->route('kegiatan.show', $berkas->id_kegiatan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        $berkas = Berkas::findOrFail($request->delete_id);
        if(!empty($berkas->nama_berkas)){
            Storage::delete('public/berkas/'.$berkas->nama_berkas);
        }
        $berkas->delete();
        Session::flash('success', 'Berkas Berhasil Dihapus');
        return redirect()->route('kegiatan.show', $berkas->id_kegiatan);
    }

    public function downloadFile($id)
    {
        $berkas = Berkas::findOrFail($id);
        return response()->download(storage_path("app/public/berkas/{$berkas->nama_berkas}"));
    }
}
