@extends('layouts.master')

@section('content')
	<h3>Tambah Peneliti Non Biofarmaka</h3>
	<div class="box box-info">
	    <form action="{{route('penelitinonpsb.store')}}" method="post">
    		{{csrf_field()}}
    		<div class="box-body pad">
    			<div class="form-group">
    				<label for=nama>Nama Peneliti</label>
    				<input type="text" class="form-control" name="nama_peneliti" id="nama">
    			</div>
    			<div class="form-group">
    				<label for=tipe>Tipe Identitas</label>
    				<select type="text" class="form-control" name="tipe_identitas" id="tipe">
						<option>KTP</option>
						<option>KIP</option>
					</select>
    			</div>
    			<div class="form-group">
    				<label for=tipe>Nomor Identitas</label>
    				<input type="text" class="form-control" name="no_identitas" id="nomor">
    			</div>
    		</div>
   			<div class="box-footer">
   				<a href="{{route('penelitinonpsb.index')}}"><button type="button" class="btn btn-default">Batal</button></a>
			    <button type="submit" class="btn btn-primary">Simpan</button>
   			</div>
    	</form>
	</div>
@endsection