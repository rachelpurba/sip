@extends('layouts.masterUmum')
<style>
.carousel {
  height: 450px;
}
.carousel .item {
  height: 450px;
}
.carousel-inner > .item > img {
  position: center;
  height: 450px;
}
.search {
  margin-top: -31%;
}
</style>

@section('content')
  <div class="row">
    <div class="col-md-9">
      <!--Carousel-->
      <div class="panel panel-default">
        <div class="panel-body">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
              <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner">
              <div class="item active">
                <img src="{{ asset('/image/Logo_IPB.png') }}" style="height: 450px" class="img-responsive center-block">
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <img src="{{ asset('/image/1.jpg') }}" style="height: 450px" class="img-responsive center-block">
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <img src="{{ asset('/image/2.jpg') }}" style="height: 450px" class="img-responsive center-block">
                <div class="carousel-caption">
                </div>
              </div>
            </div>
            
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
              <span class="fa fa-angle-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
              <span class="fa fa-angle-right"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="panel panel-default" style="height:480px">
        <div class="panel-body">
          Selamat Datang di Sistem Informasi Manajemen Peneliti (SIMPEL) Pusat Studi Biofarmaka IPB
        </div>
      </div>
    </div>
  </div>
@endsection
