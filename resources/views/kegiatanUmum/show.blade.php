@extends('layouts.masterUmum')

@section('content')
<h3 style="text-align: center"><a href="{{ route('kegiatan.index', $kegiatan->id_tipe_kegiatan )}}">{{$kegiatan->tipekegiatan->nama_tipe_kegiatan}}</a>: {{$kegiatan->nama_kegiatan}}</h3>
<div class="box">
	<div class="box-body">
        <div id="smartwizard">
            <ul>
            <?php $i=0 ?>
            @foreach($berkaskegiatans as $berkaskegiatan)
                <li><a href="#step-{{$i++}}">{{$berkaskegiatan->tipeberkas->nama_tipe_berkas}}</a></li>
            @endforeach
            </ul>
            <div>
                <?php $j=0 ?>
                @foreach($berkaskegiatans as $berkaskegiatan)
                <div id="step-{{$j++}}" class="">
                    @empty($berkaskegiatan->tipeberkas->berkas)
                        <p><i class="fa fa-exclamation fa-2x"></i>Berkas {{$berkaskegiatan->tipeberkas->nama_tipe_berkas}} tidak ditemukan<i class="fa fa-exclamation fa-2x"></i></p>
                    @endempty
                    @isset($berkaskegiatan->tipeberkas->berkas)
                        <p><i class="fa fa-file fa-2x"></i>{{$berkaskegiatan->tipeberkas->berkas->nama_berkas}}</p>
                    @endisset
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection