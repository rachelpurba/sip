@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<h3>Daftar Fakultas</h3>
		</div>
		<div class="col-md-6">
			<div class="pull-right">
				<a href="{{ route('fakultas.create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Fakultas Peneliti</a><hr>
			</div>
		</div>
	</div>
	<div class="box">
    	<div class="box-body">
			<table id="datatable" class="table table-bordered table-striped">
				<thead>
					<th width="4%">No.</th>
					<th width="32%">Nama Fakultas</th>
					<th width="32%">Aksi</th>
				</thead>
				<?php $i=1 ?>
				@foreach($fakultass as $fakultas)	
				<tr>
					<td>{{$i++}}</td>
					<td>{{$fakultas->nama_fakultas}}</td>
					<td>
						<a href="{{ route('fakultas.edit', $fakultas->id) }}" class="btn btn-info">Ubah</a>
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus" data-delid={{$fakultas->id}}>
		                Hapus
		                </button>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center" id="myModalLabel">Hapus Fakultas</h4>
      </div>
      <form action="{{route('fakultas.destroy','test')}}" method="post">
      		{{method_field('delete')}}
      		{{csrf_field()}}
	      <div class="modal-body">
				<p class="text-center">
					Anda yakin menghapus fakultas ini beserta seluruh data yang dimiliki?
				</p>
	      		<input type="hidden" name="delete_id" id="del_id" value="">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-danger">Hapus</button>
	      </div>
      </form>
    </div>
  </div>
</div>
@endsection