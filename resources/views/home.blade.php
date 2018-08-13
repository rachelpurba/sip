@extends('layouts.master')

@section('content')
    <h3>Kegiatan yang sedang berjalan</h3>
    <div class="row">
        @foreach ($tipekegiatans as $tipekegiatan)
        <div class="col-md-6">
            <div class="box box-info collapsed-box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$tipekegiatan->nama_tipe_kegiatan}}</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                          <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kegiatan</th>
                                <th>Tanggal Akhir</th>
                                <th>Berkas</th>
                                <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i=1 ?>
                          @foreach ($kegiatans as $kegiatan)
                            @if ($kegiatan->id_tipe_kegiatan === $tipekegiatan->id)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$kegiatan->nama_kegiatan}}</td>
                                <td>{{$kegiatan->tanggal_akhir}}</td>
                                <td><a href="{{ route('kegiatan.show', $kegiatan->id) }}" class="btn btn-info">Lihat</a></td>
                                <td>
                                  <a href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="btn btn-info">Ubah</a>
                                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus">Hapus</button>
                                </td>
                            </tr>
                            @endif
                          @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
