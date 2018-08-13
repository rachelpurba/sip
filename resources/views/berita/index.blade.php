@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<h3>Daftar Berita Biofarmaka</h3>
		</div>
		<div class="col-md-6">
			<div class="pull-right">
				<a href="{{ route('berita.create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Berita</a><hr>
			</div>
		</div>
	</div>
	<div class="box">
    	<div class="box-body">
      		<table id="datatable" class="table table-bordered table-striped">
        		<thead>
				<tr>
					<th width="5%">No.</th>
					<th width="20%">Judul Berita</th>
					<th width="30%">Konten Berita</th>
					<th width="10%">Berkas</th>
					<th width="10%">Dibuat</th>
					<th width="10%">Diperbaharui</th>
					<th width="15%">Aksi</th>
				</tr>
				</thead>
				<tbody>
				<?php $i=1 ?>
				@foreach($beritas as $berita)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$berita->judul_berita}}</td>
					<td>{{ strip_tags(substr($berita->konten_berita, 0, 100)) }}... <a href="{{ route('berita.show', $berita->id)}}">Selengkapnya</a></td>
					<td><a href="{{action('BeritaController@downloadFile', $berita->id)}}">{{$berita->berkas}}</a></td>
					<td>{{ date('d/n/Y', strtotime($berita->created_at)) }}</td>
					<td>{{ date('d/n/Y', strtotime($berita->updated_at)) }}</td>
					<td>
				  	  <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-info">Ubah</a>
			  		  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus" data-delid={{$berita->id}}>Hapus</button>
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
        <h4 class="modal-title text-center" id="myModalLabel">Hapus Berita</h4>
      </div>
      <form action="{{route('berita.destroy','test')}}" method="post">
      		{{method_field('delete')}}
      		{{csrf_field()}}
	      <div class="modal-body">
				<p class="text-center">
					Anda yakin menghapus berita ini beserta seluruh data yang dimiliki?
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