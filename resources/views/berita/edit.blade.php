@extends('layouts.master')

@section('content')
	<h3>Ubah Berita</h3>
	<div class="box box-info">
	    <form action="{{route('berita.update', $berita->id)}}" method="post" enctype="multipart/form-data">
	    {{csrf_field()}}
	    <div class="box-body pad">
	    	<div class="form-group">
				<input type="hidden" name="_method" value="PUT">
			</div>
	      	<div class="form-group">
				<label for=judul>Judul Berita</label>
				<input type="text" class="form-control" name="judul_berita" id="judul" value="{{$berita->judul_berita}}">
			</div>
			<div class="form-group">
				<label for=berkas>Gambar</label>
				<input type="file" class="form-control" name="berkas" id="berkas">
			</div>
			<div class="form-group">
			   <label for=konten>Konten Berita</label>
			    <textarea id="editor1" name="konten_berita" class="form-control" rows="10" cols="80">{!! $berita->konten_berita !!}</textarea>
		    </div>
		   <div class="box-footer">
			    <a href="{{route('berita.index')}}"><button type="button" class="btn btn-default">Batal</button></a>
			    <button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	    </form>
	</div>
@endsection