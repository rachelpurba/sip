@extends('layouts.master')

@section('content')
	<h3>Daftar Peneliti Biofarmaka</h3>
	<div class="box">
    	<div class="box-body">
			<table id="datatable" class="table table-bordered table-striped">
				<thead>
					<th width="4%">No.</th>
					<th width="48%">Nama</th>
					<th width="48%">Jabatan</th>
				</thead>
				<?php $i=1 ?>
				@foreach($penelitipsbs as $penelitipsb)
				<tr>
					<td>{{$i++}}</td>
					<td><a href="{{ route('penelitipsb.show', $penelitipsb->id_pegawai)}}">{{$penelitipsb->pegawai->nama}}</a></td>
					<td>{{$penelitipsb->pegawai->jabatan}}</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection