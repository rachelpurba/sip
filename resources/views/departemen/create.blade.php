@extends('layouts.master')

@section('content')
	<h3>Tambah Depertemen</h3>
	<div class="box box-info">
	    <form action="{{route('departemen.store')}}" method="post">
    		{{csrf_field()}}
    		<div class="box-body pad">
    			<div class="form-group">
    				<label for=nama>Nama Departemen</label>
    				<input type="text" class="form-control" name="nama_departemen" id="nama">
    			</div>
    			<div class="form-group">
            <label for="fakultas">Nama Fakultas</label>
            <select name="fakultas" class="form-control" data-placeholder="Pilih Fakultas">
            	@foreach($fakultass as $fakultas)
              		<option value='{{ $fakultas->id }}'>{{ $fakultas->nama_fakultas }}</option>
              	@endforeach
            </select>
          </div>
    		</div>
   			<div class="box-footer">
   				<a href="{{route('departemen.index')}}"><button type="button" class="btn btn-default">Batal</button></a>
			    <button type="submit" class="btn btn-primary">Simpan</button>
   			</div>
    	</form>
	</div>
@endsection