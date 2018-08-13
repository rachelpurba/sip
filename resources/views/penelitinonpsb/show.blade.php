@extends('layouts.master')

@section('content')
    <section class="content-header">
      <h1>Profil {{ $penelitinonpsb->nama_peneliti }}</h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">
          <img style="width: 300px" class="img-responsive center-block" src="{{ asset('/image/user.png') }}"><br>
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
                    <h5><b>No. {{ $penelitinonpsb->tipe_identitas }}</b></h5>
                  </div>
                  <div class="col-md-9">
                    <h5>: {{ $penelitinonpsb->nama_peneliti }}</h5>
                    <h5>: {{ $penelitinonpsb->no_identitas }}</h5>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="publikasi">
                <div class="row">
                  <div class="col-md-6">
                    <h4><b>Publikasi Buku</b></h4>
                    <ul>
                    @foreach($penelitinonpsb->publikasibuku as $publikasibuku)
                      <li>{{$publikasibuku->judul_buku}} Chapter: {{$publikasibuku->judul_book_chapter}}</li>
                    @endforeach
                    </ul>
                  </div>
                  <div class="col-md-6">
                    <h4><b>Publikasi Jurnal</b></h4>
                    <ul>
                    @foreach($penelitinonpsb->publikasijurnal as $publikasijurnal)
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
                    @foreach($penelitinonpsb->kegiatan as $kegiatan)
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