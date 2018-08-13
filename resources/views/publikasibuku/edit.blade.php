@extends('layouts.master')

@section('content')
	<h3>Ubah Publikasi Bukuk</h3>
	<div class="box box-info">
	    <form action="{{route('publikasibuku.update', $publikasibuku->id)}}" method="post">
    	{{csrf_field()}}
        	<div class="box-body pad">
                <div class="form-group">
                    <input type="hidden" name="_method" value="PUT">
                </div>
                <div class="form-group">
                    <label for=judulbuku>Judul Buku</label>
                    <input type="text" class="form-control" name="judul_buku" id="judulbuku" value="{{$publikasibuku->judul_buku}}">
                </div>
                <div class="form-group">
                    <label for=judulchapter>Judul Buku Chapter</label>
                    <input type="text" class="form-control" name="judul_book_chapter" id="judulchapter" value="{{$publikasibuku->judul_book_chapter}}">
                </div>
                <div class="form-group">
                    <label for="penelitipsb">Nama Peneliti Biofarmaka</label>
                    <select name="penelitipsbs[]" class="form-control select2" multiple="multiple" data-placeholder="Pilih Peneliti Biofarmaka" style="width: 100%;">
                        @foreach($penelitipsbs as $penelitipsb)
                            <option value='{{ $penelitipsb->id_peneliti }}' {{ in_array($penelitipsb->id_peneliti, $publikasibuku->penelitipsb->pluck('id_peneliti')->toArray()) ? "selected" : "" }}>{{ $penelitipsb->pegawai->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="penelitinonpsb">Nama Peneliti Non Biofarmaka</label>
                    <select name="penelitinonpsbs[]" class="form-control select2" multiple="multiple" data-placeholder="Pilih Peneliti Non Biofarmaka" style="width: 100%;">
                        @foreach($penelitinonpsbs as $penelitinonpsb)
                            <option value="{{ $penelitinonpsb->id_peneliti }}"
                                {{ in_array($penelitinonpsb->id_peneliti, $publikasibuku->penelitinonpsb->pluck('id_peneliti')->toArray()) ? "selected" : "" }}>{{ $penelitinonpsb->nama_peneliti }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for=tahun>Tahun Terbit</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="tahun_terbit" id="yearpicker" value="{{$publikasibuku->tahun_terbit}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for=tipe>Nama Penerbit</label>
                    <input type="text" class="form-control" name="nama_penerbit" id="nama" value="{{$publikasibuku->nama_penerbit}}">
                </div>
                <div class="form-group">
                    <label for=isbn>ISBN</label>
                    <input type="text" class="form-control" name="isbn" id="isbn" value="{{$publikasibuku->isbn}}">
                </div>
            </div>
   			<div class="box-footer">
   				<a href="{{route('publikasibuku.index')}}"><button type="button" class="btn btn-default">Batal</button></a>
			    <button type="submit" class="btn btn-primary">Simpan</button>
   			</div>
    	</form>
	</div>
@endsection