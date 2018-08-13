@extends('layouts.master')

@section('content')
	<h3>Tambah Kategori Kegiatan</h3>
	<div class="box box-info">
	    <form action="{{route('kategori.store')}}" method="post">
    		{{csrf_field()}}
    		<div class="box-body pad">
    			<div class="form-group">
    				<label for=nama>Nama Kategori Kegiatan</label>
    				<input type="text" class="form-control" name="nama_kategori" id="nama">
    			</div>
    			<div class="form-group">
            <label for="tipekegiatan">Tipe Kegiatan</label>
            <select name="tipekegiatan" class="form-control select2" data-placeholder="Pilih Tipe Kegiatan" style="width: 100%;">
            	@foreach($tipekegiatans as $tipekegiatan)
              		<option value='{{ $tipekegiatan->id }}'>{{ $tipekegiatan->nama_tipe_kegiatan }}</option>
              	@endforeach
            </select>
          </div>
          <div class="form-group">
            <label for=keterangan>Keterangan</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan">
          </div>
    		</div>
   			<div class="box-footer">
   				<a href="{{route('kategori.index')}}"><button type="button" class="btn btn-default">Batal</button></a>
			    <button type="submit" class="btn btn-primary">Simpan</button>
   			</div>
    	</form>
	</div>
@endsection