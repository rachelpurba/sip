@extends('layouts.master')

@section('content')
	<h3>Ubah Kategori Kegiatan</h3>
	<div class="box box-info">
	    <form action="{{route('kategori.update', $kategori->id)}}" method="post">
    	{{csrf_field()}}
    		<div class="box-body pad">
    			<div class="form-group">
            <input type="hidden" name="_method" value="PUT">
          </div>
    			<div class="form-group">
    				<label for=nama>Nama Kategori Kegiatan</label>
    				<input type="text" class="form-control" name="nama_kategori" id="nama" value="{{$kategori->nama_kategori}}">
    			</div>
    			<div class="form-group">
            <label for="tipekegiatan">Tipe Kegiatan</label>
            <select name="tipekegiatan" class="form-control select2" data-placeholder="Pilih Tipe Kegiatan" style="width: 100%;">
            	@foreach($tipekegiatans as $tipekegiatan)
              		<option value='{{ $tipekegiatan->id }}' @if($tipekegiatan->id==$kategori->id_tipe_kegiatan) selected='selected' @endif >{{ $tipekegiatan->nama_tipe_kegiatan }}</option>
              	@endforeach
            </select>
          </div>
          <div class="form-group">
            <label for=keterangan>Keterangan</label>
            <input type="text" class="form-control" name="keterangan" id="nama" value="{{$kategori->keterangan}}">
          </div>
    		</div>
   			<div class="box-footer">
   				<a href="{{route('kategori.index')}}"><button type="button" class="btn btn-default">Batal</button></a>
			    <button type="submit" class="btn btn-primary">Simpan</button>
   			</div>
    	</form>
	</div>
@endsection