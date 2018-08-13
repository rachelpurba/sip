@extends('layouts.master')

@section('content')
	<h3>Tambah Publikasi Jurnal</h3>
	<div class="box box-info">
	    <form action="{{route('publikasijurnal.store')}}" method="post" enctype="multipart/form-data">
    		{{csrf_field()}}
    		<div class="box-body pad">
    			<div class="form-group">
    				<label for=judul>Judul Artikel</label>
    				<input type="text" class="form-control" name="judul_artikel" id="judul">
    			</div>
                <div class="form-group">
                    <label for="penelitipsb">Nama Peneliti Biofarmaka</label>
                    <select name="penelitipsbs[]" class="form-control select2" multiple="multiple" data-placeholder="Pilih Peneliti Biofarmaka" style="width: 100%;">
                    	@foreach($penelitipsbs as $penelitipsb)
                      		<option value='{{ $penelitipsb->id_peneliti }}'>{{ $penelitipsb->pegawai->nama }}</option>
                      	@endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="penelitipsb">Nama Non Peneliti Biofarmaka</label>
                    <select name="penelitinonpsbs[]" class="form-control select2" multiple="multiple" data-placeholder="Pilih Peneliti Non Biofarmaka" style="width: 100%;">
                        @foreach($penelitinonpsbs as $penelitinonpsb)
                            <option value='{{ $penelitinonpsb->id_peneliti }}'>{{ $penelitinonpsb->nama_peneliti }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for=tahun>Tahun Terbit</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="tahun_terbit" id="yearpicker">
                    </div>
                </div>
    			<div class="form-group">
    				<label for=status>Status Akreditasi</label>
    				<input type="text" class="form-control" name="status_akreditasi" id="status">
    			</div>
    			<div class="form-group">
    				<label for=berkala>Nama Berkala</label>
    				<input type="text" class="form-control" name="nama_berkala" id="berkala">
    			</div>
    			<div class="form-group">
    				<label for=vol>Volume/Halaman</label>
    				<input type="text" class="form-control" name="volume_halaman" id="vol">
    			</div>
    			<div class="form-group">
    				<label for=url>URL Publikasi</label>
                    <div class="input-group">
                        <span class="input-group-addon">http://</span>
                        <input type="text" class="form-control" name="url" id="url">
                    </div>
    			</div>
                <div class="form-group">
                    <label for=berkas>Berkas</label>
                    <input type="file" class="form-control" name="berkas_jurnal" id="berkas">
                </div>
    		</div>
   			<div class="box-footer">
   				<a href="{{route('publikasijurnal.index')}}"><button type="button" class="btn btn-default">Batal</button></a>
			    <button type="submit" class="btn btn-primary">Simpan</button>
   			</div>
    	</form>
	</div>
@endsection