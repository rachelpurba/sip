<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h3 style="text-align: center;"><b>Lampiran-Lampiran</b></h3>
    <h3 style="text-align: center;"><b>Capaian PUI sampai dengan {{$id}}</b></h3><br>
    <div style="margin-left:30px; margin-right:30px">
      
      <p><font size="16px"><b>Lampiran 1. Undangan Untuk menjadi Pembicara dalam Konferensi Internasional</b></font></font></p>
      <table style="border-collapse: collapse; table-layout: fixed; width: 100%;" cellpadding="10" border="1">
        <tr align="center" valign="middle">
          <th width="5%"><font size="16px">No</font></th>
          <th width="19%"><font size="16px">Pembicara/<br>Pemakalah</font></th>
          <th width="23%"><font size="16px">Judul</font></th>
          <th width="23%"><font size="16px">Nama Kegiatan</font></th>
          <th width="15%"><font size="16px">Negara<br>Pelaksana</font></th>
          <th width="15%"><font size="16px">Waktu</font></th>
        </tr>
        <?php $i=1 ?>
        @foreach ($pembicaraInternasional as $pembicaraInternasional)
          @foreach ($pembicaraInternasional->penelitipsb as $penelitipsb)
          @if($penelitipsb->pivot->id_peran == 3)
          <tr align="left" valign="middle">
            <td>{{$i++}}</td>
            <td>{{$penelitipsb->pegawai->nama}}</td>
            @foreach($pembicaraInternasional->berkas as $berkas)
              @if($loop->first)
                <td>{{$berkas->judul}}</td>
              @endif
            @endforeach
            <td>{{$pembicaraInternasional->nama_kegiatan}}</td>
            <td>{{$pembicaraInternasional->lokasi}}</td>
            <td>{{ date('d F Y', strtotime($pembicaraInternasional->tanggal_awal)) }} - {{ date('d F Y', strtotime($pembicaraInternasional->tanggal_akhir)) }}</td>
          </tr>
          @endif
          @endforeach
        @endforeach
      </table><br>

      <p><font size="16px"><b>Lampiran 2. Undangan Untuk menjadi Pemakalah dalam Konferensi Internasional</b></font></font></p>
      <table style="border-collapse: collapse; table-layout: fixed; width: 100%;" cellpadding="10" border="1">
        <tr align="center" valign="middle">
          <th width="5%"><font size="16px">No</font></th>
          <th width="19%"><font size="16px">Pembicara/<br>Pemakalah</font></th>
          <th width="23%"><font size="16px">Judul</font></th>
          <th width="23%"><font size="16px">Nama Kegiatan</font></th>
          <th width="15%"><font size="16px">Negara<br>Pelaksana</font></th>
          <th width="15%"><font size="16px">Waktu</font></th>
        </tr>
        <?php $i=1 ?>
        @foreach ($pemakalahInternasional as $pemakalahInternasional)
          @foreach ($pemakalahInternasional->penelitipsb as $penelitipsb)
          @if($penelitipsb->pivot->id_peran == 4)
          <tr align="left" valign="middle">
            <td>{{$i++}}</td>
            <td>{{$penelitipsb->pegawai->nama}}</td>
            @foreach($pemakalahInternasional->berkas as $berkas)
              @if($loop->first)
                <td>{{$berkas->judul}}</td>
              @endif
            @endforeach
            <td>{{$pemakalahInternasional->nama_kegiatan}}</td>
            <td>{{$pemakalahInternasional->lokasi}}</td>
            <td>{{ date('d F Y', strtotime($pemakalahInternasional->tanggal_awal)) }} - {{ date('d F Y', strtotime($pemakalahInternasional->tanggal_akhir)) }}</td>
          </tr>
          @endif
          @endforeach
        @endforeach
      </table><br>

      <p><font size="16px"><b>Lampiran 3. Publikasi dalam Jurnal Ilmiah Nasional Terakreditasi</b></font></font></p>
      <table style="border-collapse: collapse; table-layout: fixed; width: 100%;" cellpadding="10" border="1">
        <tr align="center" valign="middle">
          <th width="5%"><font size="16px">No</font></th>
          <th width="18%"><font size="16px">Nama Penulis</font></th>
          <th width="25%"><font size="16px">Judul</font></th>
          <th width="17%"><font size="16px">Nama Jurnal</font></th>
          <th width="15%"><font size="16px">Keterangan</font></th>
          <th width="20%"><font size="16px">URL</font></th>
        </tr>
        <?php $i=1 ?>
        @foreach ($jurnalNasional as $jurnalNasional)
          <tr align="left" valign="middle">
            <td>{{$i++}}</td>
            <td>
              @foreach($jurnalNasional->penelitipsb as $penelitipsb)
                {{$penelitipsb->pegawai->nama}}, 
              @endforeach
              @foreach($jurnalNasional->penelitinonpsb as $penelitinonpsb)
                {{$penelitinonpsb->nama_peneliti}}, 
              @endforeach
            </td>
            <td>{{$jurnalNasional->judul_artikel}}</td>
            <td>{{$jurnalNasional->nama_berkala}}</td>
            <td style="word-wrap: break-word">{{$jurnalNasional->volume_halaman}}</td>
            <td style="word-wrap: break-word"><a href="http://{{$jurnalNasional->url}}">http://{{$jurnalNasional->url}}</a></td>
          </tr>
        @endforeach
      </table><br>

      <p><font size="16px"><b>Lampiran 3.b Publikasi dalam Jurnal Ilmiah Nasional Belum Terakreditasi</b></font></font></p>
      <table style="border-collapse: collapse; table-layout: fixed; width: 100%;" cellpadding="10" border="1">
        <tr align="center" valign="middle">
          <th width="5%"><font size="16px">No</font></th>
          <th width="18%"><font size="16px">Nama Penulis</font></th>
          <th width="25%"><font size="16px">Judul</font></th>
          <th width="17%"><font size="16px">Nama Jurnal</font></th>
          <th width="15%"><font size="16px">Keterangan</font></th>
          <th width="20%"><font size="16px">URL</font></th>
        </tr>
        <?php $i=1 ?>
        @foreach ($jurnalNasionalB as $jurnalNasionalB)
          <tr align="left" valign="middle">
            <td>{{$i++}}</td>
            <td>
              @foreach($jurnalNasionalB->penelitipsb as $penelitipsb)
                {{$penelitipsb->pegawai->nama}}, 
              @endforeach
              @foreach($jurnalNasionalB->penelitinonpsb as $penelitinonpsb)
                {{$penelitinonpsb->nama_peneliti}}, 
              @endforeach
            </td>
            <td>{{$jurnalNasionalB->judul_artikel}}</td>
            <td>{{$jurnalNasionalB->nama_berkala}}</td>
            <td style="word-wrap: break-word">{{$jurnalNasionalB->volume_halaman}}</td>
            <td style="word-wrap: break-word"><a href="http://{{$jurnalNasionalB->url}}">http://{{$jurnalNasionalB->url}}</a></td>
          </tr>
        @endforeach
      </table><br>

      <p><font size="16px"><b>Lampiran 4. Publikasi dalam Jurnal Ilmiah Internasional Terakreditasi</b></font></font></p>
      <table style="border-collapse: collapse; table-layout: fixed; width: 100%;" cellpadding="10" border="1">
        <tr align="center" valign="middle">
          <th width="5%"><font size="16px">No</font></th>
          <th width="18%"><font size="16px">Nama Penulis</font></th>
          <th width="25%"><font size="16px">Judul</font></th>
          <th width="17%"><font size="16px">Nama Jurnal</font></th>
          <th width="15%"><font size="16px">Keterangan</font></th>
          <th width="20%"><font size="16px">URL</font></th>
        </tr>
        <?php $i=1 ?>
        @foreach ($jurnalInternasional as $jurnalInternasional)
          <tr align="left" valign="middle">
            <td>{{$i++}}</td>
            <td>
              @foreach($jurnalInternasional->penelitipsb as $penelitipsb)
                {{$penelitipsb->pegawai->nama}}, 
              @endforeach
              @foreach($jurnalInternasional->penelitinonpsb as $penelitinonpsb)
                {{$penelitinonpsb->nama_peneliti}}, 
              @endforeach
            </td>
            <td>{{$jurnalInternasional->judul_artikel}}</td>
            <td>{{$jurnalInternasional->nama_berkala}}</td>
            <td style="word-wrap: break-word">{{$jurnalInternasional->volume_halaman}}</td>
            <td style="word-wrap: break-word"><a href="http://{{$jurnalInternasional->url}}">http://{{$jurnalInternasional->url}}</a></td>
          </tr>
        @endforeach
      </table><br>

      <p><font size="16px"><b>Lampiran 5. Kerjasama Riset pada Tingkat Nasional</b></font></font></p>
      <table style="border-collapse: collapse; table-layout: fixed; width: 100%;" cellpadding="10" border="1">
        <tr align="center" valign="middle">
          <th width="5%"><font size="16px">No</font></th>
          <th width="25%"><font size="16px">Peneliti & Anggota Peneliti</font></th>
          <th width="30%"><font size="16px">Materi/Judul Proposal</font></th>
          <th width="25%"><font size="16px">Waktu Pelaksanaan</font></th>
          <th width="15%"><font size="16px">No. SPK/SK</font></th>
        </tr>
        <?php $i=1 ?>
        @foreach ($kerjasamaNasional as $kerjasamaNasional)
          <tr align="left" valign="middle">
            <td>{{$i++}}</td>
            <td>
              @foreach($kerjasamaNasional->penelitipsb as $penelitipsb)
                {{$penelitipsb->pegawai->nama}}, 
              @endforeach
              @foreach($kerjasamaNasional->penelitinonpsb as $penelitinonpsb)
                {{$penelitinonpsb->nama_peneliti}}, 
              @endforeach
            </td>
            <td>{{$kerjasamaNasional->nama_kegiatan}}</td>
            <td>{{ date('d F Y', strtotime($kerjasamaNasional->tanggal_awal)) }} - {{ date('d F Y', strtotime($kerjasamaNasional->tanggal_akhir)) }}</td>
            @foreach($pembicaraInternasional->berkas as $berkas)
              @if($berkas->id_tipe_berkas  == 7)
                <td style="word-wrap: break-word">{{$berkas->judul}}</td>
              @endif
            @endforeach
          </tr>
        @endforeach
      </table><br>
     
    </div>
  </body>
</html>