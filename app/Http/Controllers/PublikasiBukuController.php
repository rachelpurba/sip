<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use App\PenelitiPSB;
use App\PenelitiNonPSB;
use App\PublikasiBuku;

class PublikasiBukuController extends Controller
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
        $publikasibukus = PublikasiBuku::orderBy('tahun_terbit', 'asc')->get();
        if (Auth::check()) {
            return view('publikasibuku.index', compact('publikasibukus'));
        }
        if (Auth::guest()) {
            return view('publikasibukuUmum.index', compact('publikasibukus'));
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
        return view('publikasibuku.create', compact('penelitipsbs', 'penelitinonpsbs'));
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
            'judul_buku' => 'required',
            'judul_book_chapter' => 'required',
            'nama_penerbit' => 'required',
            'tahun_terbit' => 'required',
            'isbn' => 'required',
        ]);
        $publikasibuku = new PublikasiBuku;
        $publikasibuku->judul_buku = $request->input('judul_buku');
        $publikasibuku->judul_book_chapter = $request->input('judul_book_chapter');
        $publikasibuku->nama_penerbit = $request->input('nama_penerbit');
        $publikasibuku->tahun_terbit = $request->input('tahun_terbit');
        $publikasibuku->isbn = $request->input('isbn');
        $publikasibuku->save();

        $publikasibuku->penelitipsb()->sync($request->penelitipsbs, false);
        $publikasibuku->penelitinonpsb()->sync($request->penelitinonpsbs, false);
        Session::flash('success', 'Publikasi Buku Berhasil Ditambah');
        return redirect()->route('publikasibuku.index');
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
        $publikasibuku = PublikasiBuku::findOrFail($id);
        $penelitipsbs = PenelitiPSB::all();
        $penelitinonpsbs = PenelitiNonPSB::all();
        return view('publikasibuku.edit', compact('publikasibuku', 'penelitipsbs', 'penelitinonpsbs'));
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
        $publikasibuku = PublikasiBuku::findOrFail($id);
         $this->validate($request, [
            'judul_buku' => 'required',
            'judul_book_chapter' => 'required',
            'nama_penerbit' => 'required',
            'tahun_terbit' => 'required',
            'isbn' => 'required',
        ]);
        $publikasibuku = PublikasiBuku::findOrFail($id);
        $publikasibuku->judul_buku = $request->input('judul_buku');
        $publikasibuku->judul_book_chapter = $request->input('judul_book_chapter');
        $publikasibuku->nama_penerbit = $request->input('nama_penerbit');
        $publikasibuku->tahun_terbit = $request->input('tahun_terbit');
        $publikasibuku->isbn = $request->input('isbn');
        $publikasibuku->save();

        $publikasibuku->penelitipsb()->detach();
        $publikasibuku->penelitinonpsb()->detach();
        $publikasibuku->penelitipsb()->attach($request->penelitipsbs);
        $publikasibuku->penelitinonpsb()->attach($request->penelitinonpsbs);
        
        Session::flash('success', 'Publikasi Buku Berhasil Diubah');
        return redirect()->route('publikasibuku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $publikasibuku = PublikasiBuku::findOrFail($request->delete_id);
        $publikasibuku->penelitipsb()->detach();
        $publikasibuku->penelitinonpsb()->detach();
        $publikasibuku->delete();
        Session::flash('success', 'Publikasi Buku Berhasil Dihapus');
        return redirect()->route('publikasibuku.index');
    }
}
