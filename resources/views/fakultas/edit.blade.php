@extends('layouts.master')

@section('content')
	<h3>Ubah Fakultas</h3>
	<div class="box box-info">
	    <form action="{{route('fakultas.update', $fakultas->id)}}" method="post">
    	{{csrf_field()}}
    		<div class="box-body pad">
    			<div class="form-group">
                    <input type="hidden" name="_method" value="PUT">
                </div>
    			<div class="form-group">
    				<label for=nama>Nama Fakultas</label>
    				<input type="text" class="form-control" name="nama_fakultas" id="nama" value="{{$fakultas->nama_fakultas}}">
    			</div>
    		</div>
   			<div class="box-footer">
   				<a href="{{route('fakultas.index')}}"><button type="button" class="btn btn-default">Batal</button></a>
			    <button type="submit" class="btn btn-primary">Simpan</button>
   			</div>
    	</form>
	</div>
@endsection