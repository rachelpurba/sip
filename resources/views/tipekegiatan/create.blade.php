@extends('layouts.master')

@section('content')
	<h3>Tambah Tipe Kegiatan</h3>
	<div class="box box-info">
	    <form action="{{route('tipekegiatan.store')}}" method="post">
    		{{csrf_field()}}
    		<div class="box-body pad">
    			<div class="form-group">
    				<label for=nama>Nama Tipe Kegiatan</label>
    				<input type="text" class="form-control" name="nama_tipe_kegiatan" id="nama">
    			</div>
    			<div class="form-group">
            <label for="dokumentasi">Dokumentasi</label>
            <select name="dokumentasi" class="form-control select2" data-placeholder="Pilih Tipe Kegiatan" style="width: 100%;">
            	<option>ya</option>
              <option>tidak</option>
            </select>
          </div>
    		</div>
   			<div class="box-footer">
   				<a href="{{route('tipekegiatan.index')}}"><button type="button" class="btn btn-default">Batal</button></a>
			    <button type="submit" class="btn btn-primary">Simpan</button>
   			</div>
    	</form>
	</div>
@endsection