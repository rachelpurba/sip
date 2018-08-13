@extends('layouts.masterUmum')

@section('content')
<div class="panel panel-default">
  <div class="panel-body">
    <h3 style="text-align: center">{{$berita->judul_berita}}</h3>
    {!! $berita->konten_berita !!}<br>
  	<img src="/storage/berita_berkas/{{$berita->berkas}}" width='300px'>
  </div>
</div>
@endsection