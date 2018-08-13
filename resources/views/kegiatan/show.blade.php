@extends('layouts.master')

@section('content')
<h3><a href="{{ route('kegiatan.index', $kegiatan->id_tipe_kegiatan )}}">{{$kegiatan->tipekegiatan->nama_tipe_kegiatan}}</a>: {{$kegiatan->nama_kegiatan}}</h3>
<div class="box">
	<div class="box-body">
        <div id="smartwizard">
            <ul>
            <?php $i=0 ?>
            @foreach($kegiatan->tipekegiatan->tipeberkas as $tipeberkas)
                <li><a href="#step-{{$i++}}">{{$tipeberkas->nama_tipe_berkas}}</a></li>
            @endforeach
            </ul>
            <div>
                <?php $j=0 ?>
                @foreach($kegiatan->tipekegiatan->tipeberkas as $tipeberkas)
                <div id="step-{{$j++}}" class="">
                    @if($kegiatan->berkas->where('id_tipe_berkas', $tipeberkas->id)->count() <= 0)
                        <form action="{{route('berkas.store')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id_kegiatan" id="kegiatan" value="{{$kegiatan->id}}">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id_tipe_berkas" id="tipe" value="{{$tipeberkas->id}}">
                            </div>
                            <div class="form-group">
                                <label for=judul>Judul {{$kegiatan->tipekegiatan->nama_tipe_kegiatan}}</label>
                                <input type="text" class="form-control" name="judul" id="judul">
                            </div>
                            <div class="form-group">
                                <label for=berkas>Unggah {{$tipeberkas->nama_tipe_berkas}}</label>
                                <input type="file" class="form-control" name="nama_berkas" id="berkas">
                            </div>
                            <a href="{{route('kegiatan.show', $kegiatan->id)}}"><button type="button" class="btn btn-default">Batal</button></a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    @endif
                    @if($kegiatan->berkas->where('id_tipe_berkas', $tipeberkas->id)->count() > 0)
                    @foreach($kegiatan->berkas->where('id_tipe_berkas', $tipeberkas->id) as $berkas)
                      <form action="{{route('berkas.update', $berkas->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <div class="form-group">
                                <input type="hidden" name="_method" value="PUT">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id_kegiatan" id="kegiatan" value="{{$kegiatan->id}}">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id_tipe_berkas" id="tipe" value="{{$tipeberkas->id}}">
                            </div>
                            <div class="form-group">
                                <label for=judul>Judul {{$kegiatan->tipekegiatan->nama_tipe_kegiatan}}</label>
                                <input type="text" class="form-control" name="judul" id="judul" value="{{$berkas->judul}}">
                            </div>
                            <b>Unduh {{$tipeberkas->nama_tipe_berkas}} Tersimpan</b><br>
                            <a href="{{action('BerkasController@downloadFile', $berkas->id)}}">{{$berkas->nama_berkas}}</a><br><br>
                            <div class="form-group">
                                <label for=berkas>Unggah {{$tipeberkas->nama_tipe_berkas}} Baru</label>
                                <input type="file" class="form-control" name="nama_berkas" id="berkas" value="{{$berkas->nama_berkas}}">
                            </div>
                            <a href="{{route('kegiatan.show', $kegiatan->id)}}"><button type="button" class="btn btn-default">Batal</button></a>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus" data-delid={{$berkas->id}}>
                               Hapus
                            </button>
                        </form>
                    @endforeach
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
	<div class="box-footer">
	</div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center" id="myModalLabel">Hapus Berkas</h4>
      </div>
      <form action="{{route('berkas.destroy','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
          <div class="modal-body">
                <p class="text-center">
                    Anda yakin menghapus berkas ini beserta seluruh data yang dimiliki?
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