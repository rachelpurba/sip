<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Session;
use App\PenelitiPSB;
use App\PenelitiNonPSB;
use App\PublikasiJurnal;

class PublikasiJurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('preventBackLogout');
        $this->middleware('auth', ['except' => ['index']]);
    }
    
    public function index()
    {
        $publikasijurnals = PublikasiJurnal::orderBy('tahun_terbit', 'asc')->get();
        if (Auth::check()) {
            return view('publikasijurnal.index', compact('publikasijurnals'));
        }
        if (Auth::guest()) {
            return view('publikasijurnalUmum.index', compact('publikasijurnals'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penelitipsbs = PenelitiPSB::all();
        $penelitinonpsbs = PenelitiNonPSB::all();
        return view('publikasijurnal.create', compact('penelitipsbs', 'penelitinonpsbs'));
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
            'judul_artikel' => 'required',
            'status_akreditasi' => 'required',
            'nama_berkala' => 'required',
            'volume_halaman' => 'required',
            'url' => 'nullable',
            'berkas_jurnal' => 'file|nullable|max:2000',
            'tahun_terbit' => 'required',
        ]);

        if($request->hasFile('berkas_jurnal')){
            $fileNameWithExt = $request->file('berkas_jurnal')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('berkas_jurnal')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('berkas_jurnal')->storeAs('public/jurnal_berkas', $fileNameToStore);
        }

        $publikasijurnal = new PublikasiJurnal;
        $publikasijurnal->judul_artikel = $request->input('judul_artikel');
        $publikasijurnal->status_akreditasi = $request->input('status_akreditasi');
        $publikasijurnal->nama_berkala = $request->input('nama_berkala');
        $publikasijurnal->volume_halaman = $request->input('volume_halaman');
        $publikasijurnal->url = $request->input('url');
        $publikasijurnal->berkas_jurnal = $fileNameToStore;
        $publikasijurnal->tahun_terbit = $request->input('tahun_terbit');
        $publikasijurnal->save();

        $publikasijurnal->penelitipsb()->attach($request->penelitipsbs, ['status_konfirm'=>'menunggu']);
        $publikasijurnal->penelitinonpsb()->attach($request->penelitinonpsbs, ['status_konfirm'=>'menunggu']);
        Session::flash('success', 'Publikasi Jurnal Berhasil Ditambah');
        return redirect()->route('publikasijurnal.index');
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
        $publikasijurnal = PublikasiJurnal::findOrFail($id);
        $penelitipsbs = PenelitiPSB::all();
        $penelitinonpsbs = PenelitiNonPSB::all();
        return view('publikasijurnal.edit', compact('publikasijurnal', 'penelitipsbs', 'penelitinonpsbs'));
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
        $publikasijurnal = PublikasiJurnal::findOrFail($id);
        $this->validate($request, [
            'judul_artikel' => 'required',
            'status_akreditasi' => 'required',
            'nama_berkala' => 'required',
            'volume_halaman' => 'required',
            'berkas_jurnal' => 'file|nullable|max:2000',
            'tahun_terbit' => 'required',
            'tahun_terbit' => 'required',
        ]);

        if($request->hasFile('berkas_jurnal')){
            $fileNameWithExt = $request->file('berkas_jurnal')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('berkas_jurnal')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('berkas_jurnal')->storeAs('public/jurnal_berkas', $fileNameToStore);
        }

        $publikasijurnal = PublikasiJurnal::findOrFail($id);
        $publikasijurnal->judul_artikel = $request->input('judul_artikel');
        $publikasijurnal->status_akreditasi = $request->input('status_akreditasi');
        $publikasijurnal->nama_berkala = $request->input('nama_berkala');
        $publikasijurnal->volume_halaman = $request->input('volume_halaman');
        $publikasijurnal->url = $request->input('url');
        $publikasijurnal->tahun_terbit = $request->input('tahun_terbit');
        if($request->hasFile('berkas_jurnal')){
            $oldFileName = $publikasijurnal->berkas_jurnal;
            $publikasijurnal->berkas_jurnal = $fileNameToStore;
            Storage::delete('public/jurnal_berkas/'.$oldFileName);
        }
        $publikasijurnal->save();

        $publikasijurnal->penelitipsb()->detach();
        $publikasijurnal->penelitinonpsb()->detach();
        $publikasijurnal->penelitipsb()->attach($request->penelitipsbs, ['status_konfirm'=>'menunggu']);
        $publikasijurnal->penelitinonpsb()->attach($request->penelitinonpsbs, ['status_konfirm'=>'menunggu']);
        
        Session::flash('success', 'Publikasi Jurnal Berhasil Diubah');
        return redirect()->route('publikasijurnal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $publikasijurnal = PublikasiJurnal::findOrFail($request->delete_id);
        $publikasijurnal->penelitipsb()->detach();
        $publikasijurnal->penelitinonpsb()->detach();
        if(!empty($publikasijurnal->berkas_jurnal)){
            Storage::delete('public/jurnal_berkas/'.$publikasijurnal->berkas_jurnal);
        }
        $publikasijurnal->delete();
        Session::flash('success', 'Publikasi Jurnal Berhasil Dihapus');
        return redirect()->route('publikasijurnal.index');
    }

    public function downloadFile($id)
    {
        $publikasijurnal = PublikasiJurnal::findOrFail($id);
        return response()->download(storage_path("app/public/jurnal_berkas/{$publikasijurnal->berkas_jurnal}"));
    }
}
