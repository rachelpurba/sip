@extends('layouts.master')

@section('content')
    <h3>Unduh Laporan Capaian Kegiatan</h3>
    <form action="{{route('unduh.store')}}" method="post">
    {{csrf_field()}}
    <div class="form-group">
        <label for=tahun>Tahun</label>
        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" class="form-control pull-right" name="tahun" id="yearpicker">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Unduh Laporan</button>
@endsection