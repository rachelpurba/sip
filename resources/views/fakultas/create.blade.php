@extends('layouts.master')

@section('content')
	<h3>Tambah Fakultas</h3>
	<div class="box box-info">
	    <form action="{{route('fakultas.store')}}" method="post">
    		{{csrf_field()}}
    		<div class="box-body pad">
    			<div class="form-group">
    				<label for=nama>Nama Fakultas</label>
    				<input type="text" class="form-control" name="nama_fakultas" id="nama">
    			</div>
    		</div>
   			<div class="box-footer">
   				<a href="{{route('fakultas.index')}}"><button type="button" class="btn btn-default">Batal</button></a>
			    <button type="submit" class="btn btn-primary">Simpan</button>
   			</div>
    	</form>
	</div>
@endsection