@extends('layouts.master')

@section('content')
	<h3>Ubah Peneliti Non Biofarmaka</h3>
	<div class="box box-info">
	    <form action="{{route('penelitinonpsb.update', $penelitinonpsb->id_peneliti)}}" method="post">
    		{{csrf_field()}}
    		<div class="box-body pad">
                <div class="form-group">
                    <input type="hidden" name="_method" value="PUT">
                </div>
    			<div class="form-group">
    				<label for=nama>Nama Peneliti</label>
    				<input type="text" class="form-control" name="nama_peneliti" id="nama" value="{{$penelitinonpsb->nama_peneliti}}">
    			</div>
    			<div class="form-group">
    				<label for=tipe>Tipe Identitas</label>
    				<select type="text" class="form-control" name="tipe_identitas" id="tipe">
						<option {{ old('tipe_identitas', $penelitinonpsb->tipe_identitas)=="KTP"?  'selected' : '' }}>KTP</option>
						<option {{ old('tipe_identitas', $penelitinonpsb->tipe_identitas)=="KIP"? 'selected' : '' }}>KIP</option>
					</select>
    			</div>
    			<div class="form-group">
    				<label for=tipe>Nomor Identitas</label>
    				<input type="text" class="form-control" name="no_identitas" id="nomor" value="{{$penelitinonpsb->no_identitas}}">
    			</div>
    		</div>
   			<div class="box-footer">
   				<a href="{{route('penelitinonpsb.index')}}"><button type="button" class="btn btn-default">Batal</button></a>
			    <button type="submit" class="btn btn-primary">Simpan</button>
   			</div>
    	</form>
	</div>
@endsection