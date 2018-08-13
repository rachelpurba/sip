@extends('layouts.master')

@section('content')
	<h3>Tambah Tipe Berkas Kegiatan</h3>
	<div class="box box-info">
	    <form action="{{route('tipeberkas.store')}}" method="post">
    		{{csrf_field()}}
    		<div class="box-body pad">
    			<div class="form-group">
    				<label for=nama>Nama Tipe Berkas Kegiatan</label>
    				<input type="text" class="form-control" name="nama_tipe_berkas" id="nama">
    			</div>
    			<div class="form-group">
            <label for="tipekegiatan">Tipe Kegiatan</label>
            <select name="tipekegiatans[]" class="form-control select2" multiple="multiple" data-placeholder="Pilih Tipe Kegiatan" style="width: 100%;">
            	@foreach($tipekegiatans as $tipekegiatan)
              		<option value='{{ $tipekegiatan->id }}'>{{ $tipekegiatan->nama_tipe_kegiatan }}</option>
              	@endforeach
            </select>
          </div>
    		</div>
   			<div class="box-footer">
   				<a href="{{route('tipeberkas.index')}}"><button type="button" class="btn btn-default">Batal</button></a>
			    <button type="submit" class="btn btn-primary">Simpan</button>
   			</div>
    	</form>
	</div>
@endsection