@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-6">
	  <h3>Daftar Publikasi Buku Biofarmaka</h3>
	</div>
	<div class="col-md-6">
	  <div class="pull-right">
	    <a href="{{ route('publikasibuku.create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Publikasi Buku</a><hr>
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
			<th>Nama Penerbit</th>
			<th>ISBN</th>
			<th>Tahun Terbit</th>
			<th>Aksi</th>
		</tr>
		</thead>
		<tbody>
		<?php $i=1 ?>
		@foreach($publikasibukus as $publikasibuku)
		<tr>
			<td>{{$i++}}</td>
			<td>{{$publikasibuku->judul_buku}} Chapter: {{$publikasibuku->judul_book_chapter}}</td>
			<td>
				@foreach($publikasibuku->penelitipsb as $penelitipsb)
					<a href="{{ route('penelitipsb.show', $penelitipsb->id_pegawai)}}">{{$penelitipsb->pegawai->nama}}</a>, 
				@endforeach
			</td>
			<td>
				@foreach($publikasibuku->penelitinonpsb as $penelitinonpsb)
					<a href="{{ route('penelitinonpsb.show', $penelitinonpsb->id_peneliti)}}">{{$penelitinonpsb->nama_peneliti}}</a>, 
				@endforeach
			</td>
			<td>{{$publikasibuku->nama_penerbit}}</td>
			<td>{{$publikasibuku->isbn}}</td>
			<td>{{$publikasibuku->tahun_terbit}}</td>
			<td>
			  <a href="{{ route('publikasibuku.edit', $publikasibuku->id) }}" class="btn btn-info">Ubah</a>
			  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus" data-delid={{$publikasibuku->id}}>Hapus</button>
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
        <h4 class="modal-title text-center" id="myModalLabel">Hapus Publikasi Buku</h4>
      </div>
      <form action="{{route('publikasibuku.destroy','test')}}" method="post">
      		{{method_field('delete')}}
      		{{csrf_field()}}
	      <div class="modal-body">
				<p class="text-center">
					Anda yakin menghapus pubikasi buku ini beserta seluruh data yang dimiliki?
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