@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-6">
		  <h3>Daftar {{$tipekegiatan->nama_tipe_kegiatan}}</h3>
		</div>
		<div class="col-md-6">
		  <div class="pull-right">
		    <a href="{{ route('kegiatan.create', $tipekegiatan->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> {{$tipekegiatan->nama_tipe_kegiatan}}</a><hr>
		  </div>
		</div>
	</div>
	
  	<div class="box">
    	<div class="box-body">
      		<table id="datatable" class="table table-bordered table-striped">
        		<thead>
				<tr>
					<th>No.</th>
					<th>Nama Kegiatan</th>
					<th>Peneliti Biofarmaka</th>
					<th>Peneliti Non Biofarmaka</th>
					<th>Tanggal Awal</th>
					<th>Tanggal Akhir</th>
					<th>Keterangan</th>
					<th>Berkas</th>
					<th>Aksi</th>
				</tr>
				</thead>
				<tbody>
				<?php $i=1 ?>
				@foreach($kegiatans as $kegiatan)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$kegiatan->nama_kegiatan}}</td>
					<td>
						@foreach($kegiatan->penelitipsb as $penelitipsb)
							<a href="{{ route('penelitipsb.show', $penelitipsb->id_peneliti)}}">{{$penelitipsb->pegawai->nama}}</a>, 
						@endforeach
					</td>
					<td>
						@foreach($kegiatan->penelitinonpsb as $penelitinonpsb)
							<a href="{{ route('penelitinonpsb.show', $penelitinonpsb->id_peneliti)}}">{{$penelitinonpsb->nama_peneliti}}</a>, 
						@endforeach
					</td>
					<td>{{ date('d F Y', strtotime($kegiatan->tanggal_awal)) }}</td>
					<td>{{ date('d F Y', strtotime($kegiatan->tanggal_akhir)) }}</td>
					<td>{{$kegiatan->keterangan}}</td>
					<td><a href="{{ route('kegiatan.show', $kegiatan->id) }}" class="btn btn-info">Lihat</a></td>
					<td>
				  	  <a href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="btn btn-info">Ubah</a>
			  		  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus" data-delid={{$kegiatan->id}}>Hapus</button>
					</td>
				</tr>
				@endforeach
				</tbody>
      		</table>
    	</div>
  	</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center" id="myModalLabel">Hapus Kegiatan</h4>
      </div>
      <form action="{{route('kegiatan.destroy','test')}}" method="post">
      		{{method_field('delete')}}
      		{{csrf_field()}}
	      <div class="modal-body">
				<p class="text-center">
					Anda yakin menghapus kegiatan ini beserta seluruh data yang dimiliki?
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