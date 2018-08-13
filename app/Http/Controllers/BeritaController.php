<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Berita;

class BeritaController extends Controller
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

    public function index()
    {
        $beritas = Berita::orderBy('updated_at', 'desc')->get();
        if (Auth::check()) {
            return view('berita.index', compact('beritas'));
        }
        if (Auth::guest()) {
            return view('beritaUmum.index', compact('beritas'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita.create');
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
            'judul_berita' => 'required',
            'konten_berita' => 'required',
            'berkas' => 'file|nullable|max:2000',
        ]); 

        if($request->hasFile('berkas')){
            $fileNameWithExt = $request->file('berkas')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('berkas')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('berkas')->storeAs('public/berita_berkas', $fileNameToStore);
        }

        $berita = new Berita;
        $berita->judul_berita = $request->input('judul_berita');
        $berita->konten_berita = $request->input('konten_berita');
        $berita->berkas = $fileNameToStore;
        $berita->save();

        Session::flash('success', 'Berita Berhasil Ditambah');
        return redirect()->route('berita.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = Berita::find($id);
        if (Auth::check()) {
            return view('berita.show', compact('berita'));
        }
        if (Auth::guest()) {
            return view('beritaUmum.show', compact('berita'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::find($id);
        return view('berita.edit', compact('berita'));
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
        $this->validate($request, [
            'judul_berita' => 'required',
            'konten_berita' => 'required',
        ]); 

        if($request->hasFile('berkas')){
            $fileNameWithExt = $request->file('berkas')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('berkas')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('berkas')->storeAs('public/berita_berkas', $fileNameToStore);
        }
        
        $berita = Berita::find($id);
        $berita->judul_berita = $request->input('judul_berita');
        $berita->konten_berita = $request->input('konten_berita');
        if($request->hasFile('berkas')){
            $oldFileName = $berita->berkas;
            $berita->berkas = $fileNameToStore;
            Storage::delete('public/berita_berkas/'.$oldFileName);
        }

        $berita->save();

        Session::flash('success', 'Berita Berhasil Diubah');
        return redirect()->route('berita.show', $berita->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $berita = Berita::findOrFail($request->delete_id);
        if(!empty($berita->berkas)){
            Storage::delete('public/berita_berkas/'.$berita->berkas);
        }
        $berita->delete();
        Session::flash('success', 'Berita Berhasil Dihapus');
        return redirect()->route('berita.index');
    }

    public function downloadFile($id)
    {
        $berita = Berita::findOrFail($id);
        return response()->download(storage_path("app/public/berita_berkas/{$berita->berkas}"));
    }
}
