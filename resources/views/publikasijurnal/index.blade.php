@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6">
      <h3>Daftar Publikasi Jurnal Biofarmaka</h3>
    </div>
    <div class="col-md-6">
      <div class="pull-right">
        <a href="{{ route('publikasijurnal.create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Publikasi Jurnal</a><hr>
      </div>
    </div>
</div>
<div class="box">
    <div class="box-body">
		<table id="datatable" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Peneliti Biofarmaka</th>
					<th>Peneliti Non Biofarmaka</th>
					<th>Tipe</th>
					<th>Nama Jurnal</th>
					<th>Tahun Publikasi</th>
					<th>Volume/Halaman</th>
					<th>URL</th>
					<th>Berkas</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<?php $i=1 ?>
			<tbody>
				<?php $i=1 ?>
				@foreach($publikasijurnals as $publikasijurnal)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$publikasijurnal->judul_artikel}}</td>
					<td>
						@foreach($publikasijurnal->penelitipsb as $penelitipsb)
							<a href="{{ route('penelitipsb.show', $penelitipsb->id_pegawai)}}">{{$penelitipsb->pegawai->nama}}</a>, 
						@endforeach
					</td>
					<td>
						@foreach($publikasijurnal->penelitinonpsb as $penelitinonpsb)
							<a href="{{ route('penelitinonpsb.show', $penelitinonpsb->id_peneliti)}}">{{$penelitinonpsb->nama_peneliti}}</a>, 
						@endforeach
					</td>
					<td>{{$publikasijurnal->status_akreditasi}}</td>
					<td>{{$publikasijurnal->nama_berkala}}</td>
					<td>{{$publikasijurnal->tahun_terbit}}</td>
					<td>{{$publikasijurnal->volume_halaman}}</td>
					<td><a href="http://{{$publikasijurnal->url}}" target="_blank" class="btn btn-info">Lihat</a></td>
					<td><a href="{{action('PublikasiJurnalController@downloadFile', $publikasijurnal->id)}}">{{$publikasijurnal->berkas_jurnal}}</a></td>
					<td>
				  	  <a href="{{ route('publikasijurnal.edit', $publikasijurnal->id) }}" class="btn btn-info">Ubah</a>
			  		  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus" data-delid={{$publikasijurnal->id}}>Hapus</button>
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
        <h4 class="modal-title text-center" id="myModalLabel">Hapus Publikasi Jurnal</h4>
      </div>
      <form action="{{route('publikasijurnal.destroy','test')}}" method="post">
      		{{method_field('delete')}}
      		{{csrf_field()}}
	      <div class="modal-body">
				<p class="text-center">
					Anda yakin menghapus publikasi jurnal ini beserta seluruh data yang dimiliki?
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