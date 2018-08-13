@extends('layouts.master')

@section('content')
    <section class="content-header">
      <h1>Profil {{ $penelitipsb->pegawai->nama }}</h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">
          <img style="width: 300px" class="img-responsive center-block" src="{{ asset('/image/user.png') }}"><br>
          <a class="btn btn-primary" href="{{action('PenelitiPSBController@generatePDF', $penelitipsb->id_pegawai)}}">Unduh CV</a>
        </div>
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#profil" data-toggle="tab">Profil</a></li>
              <li><a href="#publikasi" data-toggle="tab">Publikasi</a></li>
              <li><a href="#kegiatan" data-toggle="tab">Kegiatan</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="profil">
                <div class="row">
                  <div class="col-md-3">
                    <h5><b>Nama</b></h5>
                    <h5><b>No. KTP</b></h5>
                    <h5><b>TTL</b></h5>
                    <h5><b>Jenis Kelamin</b></h5>
                    <h5><b>Agama</b></h5>
                    <h5><b>Status Kawin</b></h5>
                    <h5><b>NIP</b></h5>
                    <h5><b>Unit</b></h5>
                    <h5><b>Jabatan</b></h5>
                  </div>
                  <div class="col-md-9">
                    <h5>: {{ $penelitipsb->pegawai->gelar_depan }} {{ $penelitipsb->pegawai->nama }} {{ $penelitipsb->pegawai->gelar_belakang }}</h5>
                    <h5>: {{ $penelitipsb->pegawai->no_ktp }}</h5>
                    <h5>: {{ $penelitipsb->pegawai->tempat_lahir }}, {{ $penelitipsb->pegawai->tanggal_lahir }}</h5>
                    <h5>: {{ $penelitipsb->pegawai->jenis_kelamin }}</h5>
                    <h5>: {{ $penelitipsb->pegawai->agama }}</h5>
                    <h5>: {{ $penelitipsb->pegawai->status_kawin }}</h5>
                    <h5>: {{ $penelitipsb->pegawai->nip }}</h5>
                    <h5>: {{ $penelitipsb->pegawai->id_unit }}</h5>
                    <h5>: {{ $penelitipsb->pegawai->jabatan }}</h5>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="publikasi">
                <div class="row">
                  <div class="col-md-6">
                    <h4><b>Publikasi Buku</b></h4>
                    <ul>
                    @foreach($penelitipsb->publikasibuku as $publikasibuku)
                      <li>{{$publikasibuku->judul_buku}} Chapter: {{$publikasibuku->judul_book_chapter}}</li>
                    @endforeach
                    </ul>
                  </div>
                  <div class="col-md-6">
                    <h4><b>Publikasi Jurnal</b></h4>
                    <ul>
                    @foreach($penelitipsb->publikasijurnal as $publikasijurnal)
                      <li>{{$publikasijurnal->judul_artikel}}</li>
                    @endforeach
                    </ul>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="kegiatan">
                <div class="row">
                  @foreach($tipekegiatans as $tipekegiatan)
                  <div class="col-md-6">
                  <h4><b>{{$tipekegiatan->nama_tipe_kegiatan}}</b></h4>
                  <ul>
                    @foreach($penelitipsb->kegiatan as $kegiatan)
                      @if ($kegiatan->id_tipe_kegiatan === $tipekegiatan->id)
                        <li>{{$kegiatan->nama_kegiatan}}</li>
                      @endif
                    @endforeach
                  </ul>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>

@endsection