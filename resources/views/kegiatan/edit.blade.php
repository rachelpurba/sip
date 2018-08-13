@extends('layouts.master')

@section('content')
	<h3>Ubah {{$tipekegiatan->nama_tipe_kegiatan}}</h3>
	<div class="box box-info">
	    <form action="{{route('kegiatan.update', $kegiatan->id)}}" method="post">
    	{{csrf_field()}}
    		<div class="box-body pad">
                <div class="form-group">
                    <input type="hidden" name="_method" value="PUT">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id_tipe_kegiatan" id="tipe" value="{{$tipekegiatan->id}}">
                </div>
    			<div class="form-group">
    				<label for=namakegiatan>Nama Kegiatan</label>
    				<input type="text" class="form-control" name="nama_kegiatan" id="namakegiatan" value="{{$kegiatan->nama_kegiatan}}">
    			</div>
                 @foreach($tipekegiatan->peran as $peran)
                <div class="form-group">
                    <label for="">Nama Peneliti {{$peran->nama_peran}}</label>
                    <select name="psb[{{$peran->id}}][]" class="form-control select2" multiple="multiple" data-placeholder="Pilih Peneliti Biofarmaka" style="width: 100%;">
                        @foreach($penelitipsbs as $penelitipsb)
                            <option value="{{ $penelitipsb->id_peneliti }}"
                                {{ in_array($penelitipsb->id_peneliti, $penelitipsb->whereHas('kegiatan', function($query) use($kegiatan, $peran) { $query->where([ ['id_kegiatan', $kegiatan->id], ['id_peran', '=', $peran->id] ]); })->pluck('id_peneliti')->toArray()) ? "selected" : "" }}>{{ $penelitipsb->pegawai->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="nonpsb[{{$peran->id}}][]" class="form-control select2" multiple="multiple" data-placeholder="Pilih Peneliti Non Biofarmaka" style="width: 100%;">
                        @foreach($penelitinonpsbs as $penelitinonpsb)
                            <option value="{{ $penelitinonpsb->id_peneliti }}"
                                {{ in_array($penelitinonpsb->id_peneliti, $penelitinonpsb->whereHas('kegiatan', function($query) use($kegiatan, $peran) { $query->where([ ['id_kegiatan', $kegiatan->id], ['id_peran', '=', $peran->id] ]); })->pluck('id_peneliti')->toArray()) ? "selected" : "" }}>{{ $penelitinonpsb->nama_peneliti }}</option>
                        @endforeach
                    </select>
                </div>
                @endforeach
                <div class="form-group">
                    <label for="">Kategori {{$tipekegiatan->nama_tipe_kegiatan}}</label>
                    <select name="kategori" class="form-control select2" data-placeholder="Pilih Kategori" style="width: 100%;">
                        @foreach($tipekegiatan->kategori as $kategori)
                            <option value='{{ $kategori->id }}' @if($kategori->id==$kegiatan->id_kategori_tipe_kegiatan) selected='selected' @endif >{{ $kategori->keterangan }}</option>
                        @endforeach
                    </select>
                </div>
    			<div class="form-group">
    				<label for=awal>Tanggal Awal</label>
    				<input type="text" class="form-control" name='tanggal_awal' id="datepicker1" value="{{$kegiatan->tanggal_awal}}">
    			</div>
                <div class="form-group">
                    <label for=akhir>Tanggal Akhir</label>
                    <input type="text" class="form-control" name='tanggal_akhir' id="datepicker2" value="{{$kegiatan->tanggal_akhir}}">
                </div>
                <div class="form-group">
                    <label for=lokasi>Lokasi</label>
                    <input type="text" class="form-control" name="lokasi" id="lokasi" value="{{$kegiatan->lokasi}}">
                </div>
                <div class="form-group">
                    <label for=keterangan>Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan" value="{{$kegiatan->keterangan}}">
                </div>
    		</div>
   			<div class="box-footer">
   				<a href="{{route('kegiatan.index', $tipekegiatan->id)}}"><button type="button" class="btn btn-default">Batal</button></a>
			    <button type="submit" class="btn btn-primary">Simpan</button>
   			</div>
    	</form>
	</div>
@endsection