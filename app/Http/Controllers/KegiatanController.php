<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use App\PenelitiPSB;
use App\PenelitiNonPSB;
use App\Kegiatan;
use App\TipeKegiatan;
use App\Berkas;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('preventBackLogout');
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    
    public function index($id)
    {
        $kegiatans = Kegiatan::where('id_tipe_kegiatan', $id)->orderBy('tanggal_awal', 'desc')->get();
        $tipekegiatan = TipeKegiatan::find($id);
        if (Auth::check()) {
            return view('kegiatan.index', compact('kegiatans', 'tipekegiatan'));
        }
        if (Auth::guest()) {
            return view('kegiatanUmum.index', compact('kegiatans', 'tipekegiatan'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $tipekegiatan = TipeKegiatan::find($id);
        $penelitipsbs = PenelitiPSB::all();
        $penelitinonpsbs = PenelitiNonPSB::all();
        return view('kegiatan.create', compact('tipekegiatan', 'penelitipsbs', 'penelitinonpsbs', 'perankegiatans'));
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
            'id_tipe_kegiatan' => 'required',
            'nama_kegiatan' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'nullable',
        ]);
        $kegiatan = new Kegiatan;
        $kegiatan->id_tipe_kegiatan = $request->input('id_tipe_kegiatan');
        $kegiatan->nama_kegiatan = $request->input('nama_kegiatan');
        $kegiatan->tanggal_awal = $request->input('tanggal_awal');
        $kegiatan->tanggal_akhir = $request->input('tanggal_akhir');
        $kegiatan->id_kategori_tipe_kegiatan = $request->input('kategori');
        $kegiatan->lokasi = $request->input('lokasi');
        $kegiatan->keterangan = $request->input('keterangan');
        $kegiatan->save();
        $tipekegiatan = TipeKegiatan::find($kegiatan->id_tipe_kegiatan);
        foreach ($tipekegiatan->peran as $peran) {
            if (!empty($request->psb[$peran->id])) {
                $kegiatan->penelitipsb()->attach($request->psb[$peran->id], ['status_konfirm'=>'menunggu', 'id_peran'=>$peran->id]);
            }
            if (!empty($request->nonpsb[$peran->id])) {
                $kegiatan->penelitinonpsb()->attach($request->nonpsb[$peran->id], ['status_konfirm'=>'menunggu', 'id_peran'=>$peran->id]);
            }
        }
        Session::flash('success', 'Penelitian Dikti Berhasil Ditambah');
        return redirect()->route('kegiatan.index', $kegiatan->id_tipe_kegiatan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kegiatan = Kegiatan::find($id);
        $berkass = Berkas::where('id_kegiatan', $id)->get();
        return view('kegiatan.show', compact('kegiatan', 'berkass'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $tipekegiatan = TipeKegiatan::where('id', $kegiatan->id_tipe_kegiatan)->first();
        $penelitipsbs = PenelitiPSB::all();
        $penelitinonpsbs = PenelitiNonPSB::all();
        return view('kegiatan.edit', compact('kegiatan', 'tipekegiatan', 'penelitipsbs', 'penelitinonpsbs'));
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
        $kegiatan = Kegiatan::findOrFail($id);
        $this->validate($request, [
            'id_tipe_kegiatan' => 'required',
            'nama_kegiatan' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'nullable',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->id_tipe_kegiatan = $request->input('id_tipe_kegiatan');
        $kegiatan->nama_kegiatan = $request->input('nama_kegiatan');
        $kegiatan->tanggal_awal = $request->input('tanggal_awal');
        $kegiatan->tanggal_akhir = $request->input('tanggal_akhir');
        $kegiatan->id_kategori_tipe_kegiatan = $request->input('kategori');
        $kegiatan->lokasi = $request->input('lokasi');
        $kegiatan->keterangan = $request->input('keterangan');
        $kegiatan->save();
        $kegiatan->penelitipsb()->detach();
        $kegiatan->penelitinonpsb()->detach();
        $tipekegiatan = TipeKegiatan::find($kegiatan->id_tipe_kegiatan);
        foreach ($tipekegiatan->peran as $peran) {
            if (!empty($request->psb[$peran->id])) {
                $kegiatan->penelitipsb()->attach($request->psb[$peran->id], ['status_konfirm'=>'menunggu', 'id_peran'=>$peran->id]);
            }
            if (!empty($request->nonpsb[$peran->id])) {
                $kegiatan->penelitinonpsb()->attach($request->nonpsb[$peran->id], ['status_konfirm'=>'menunggu', 'id_peran'=>$peran->id]);
            }
        }
        Session::flash('success', 'Kegiatan Berhasil Diubah');
        return redirect()->route('kegiatan.index', $kegiatan->id_tipe_kegiatan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $kegiatan = Kegiatan::findOrFail($request->delete_id);
        $berkas = Berkas::where('id_kegiatan', $kegiatan->id)->get();
        foreach ($berkas as $berkas) {
            Storage::delete('public/berkas/'.$berkas->nama_berkas);
            $berkas->delete();
        }
        $kegiatan->penelitipsb()->detach();
        $kegiatan->penelitinonpsb()->detach();
        $kegiatan->delete();
        Session::flash('success', 'Kegiatan Berhasil Dihapus');
        return redirect()->route('kegiatan.index', $kegiatan->id_tipe_kegiatan);
    }
}