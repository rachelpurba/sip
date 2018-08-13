<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h3 style="text-align: center; text-decoration: underline;"><b>BIODATA</b></h3><br>
    <div style="margin-left:30px; margin-right:30px">
      <table>
        <tr>
          <td><font size="16px">Nama</font></td>
          <td>:</td>
          <td><font size="16px">{{ $penelitipsb->pegawai->gelar_depan }} {{ $penelitipsb->pegawai->nama }} {{ $penelitipsb->pegawai->gelar_belakang }}</font></td>
        </tr>
        <tr>
          <td width="28%"><font size="16px">Alamat korespondensi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
          <td width="2%">:</td>
          <td width="70%"><font size="16px">{{ $penelitipsb->pegawai->alamat }}</font></td>
        </tr>
        <tr>
          <td><font size="16px">Telp./Faks</font></td>
          <td>:</td>
          <td><font size="16px">{{ $penelitipsb->pegawai->telepon }}/{{ $penelitipsb->pegawai->faks }}</font></td>
        </tr>
        <tr>
          <td><font size="16px">HP</font></td>
          <td>:</td>
          <td><font size="16px">{{ $penelitipsb->pegawai->nomor_hp }}</font></td>
        </tr>
        <tr>
          <td><font size="16px">E-mail</font></td>
          <td>:</td>
          <td><font size="16px">{{ $penelitipsb->pegawai->email }}</font></td>
        </tr>
      </table><br>

      <p><font size="16px">Riwayat Pendidikan</font></p>
      <table style="border-collapse: collapse;" cellpadding="10" border="1">
        <tr align="center" valign="middle">
          <th><font size="16px">Tahun<br>lulus</font></th>
          <th><font size="16px">Perguruan Tinggi</font></th>
          <th><font size="16px">Bidang Spesialisasi</font></th>
        </tr>
        <tr align="center" valign="middle">
          <td colspan="3"><font size="16px">Tidak ada data</font></td>
        </tr>
      </table><br>

      <p><font size="16px">Pengalaman penelitian 3 tahun terakhir</font></p>
      <table style="border-collapse: collapse;" cellpadding="10" border="1">
        <tr align="center" valign="middle">
          <th><font size="16px">Tahun</font></th>
          <th><font size="16px">Topik/Judul Penelitian</font></th>
        </tr>
        @if (count($penelitians) === 0)
        <tr align="center" valign="middle">
          <td colspan="2"><font size="16px">Tidak ada data</font></td>
        </tr>
        @endif
        @foreach($penelitians as $penelitian)
          <tr valign="middle">
            <td><font size="16px"><?php $date = new \Carbon\Carbon($penelitian->tanggal_akhir); ?>{{ $date->year }}</font></td>
            <td><font size="16px">{{ $penelitian->nama_kegiatan }}</font></td>
          </tr>
        @endforeach
      </table><br>

      <p><font size="16px">Pengalaman publikasi di berkala ilmiah 3 tahun terakhir</font></p>
      <table style="border-collapse: collapse;" cellpadding="10" border="1">
        <tr align="center" valign="middle">
          <th><font size="16px">Nama (-nama) penulis</font></th>
          <th><font size="16px">Tahun terbit</font></th>
          <th><font size="16px">Judul artikel</font></th>
          <th><font size="16px">Nama berkala</font></th>
          <th><font size="16px">Volume dan halaman</font></th>
          <th><font size="16px">Status akreditasi (untuk jurnal nasional)</font></th>
        </tr>
        @if (count($publikasijurnals) === 0)
        <tr align="center" valign="middle">
          <td colspan="6"><font size="16px">Tidak ada data</font></td>
        </tr>
        @endif
        @foreach($publikasijurnals as $publikasijurnal)
          <tr valign="middle">
            <td>
              <font size="16px">
              @foreach($publikasijurnal->penelitipsb as $penelitipsb)
                {{$penelitipsb->pegawai->nama}}, 
              @endforeach
              @foreach($publikasijurnal->penelitinonpsb as $penelitinonpsb)
                {{$penelitinonpsb->nama_peneliti}}, 
              @endforeach
              </font>
            </td>
            <td><font size="16px">{{ $publikasijurnal->tahun_terbit }}</font></td>
            <td><font size="16px">{{ $publikasijurnal->judul_artikel }}</font></td>
            <td><font size="16px">{{ $publikasijurnal->nama_berkala }}</font></td>
            <td><font size="16px">{{ $publikasijurnal->volume_halaman }}</font></td>
            <td><font size="16px">{{ $publikasijurnal->status_akreditasi }}</font></td>
          </tr>
        @endforeach
      </table><br>

      <p><font size="16px">Pemakalah Seminar Ilmiah (Oral Presentation) dalam 5 TahunTerakhir</font></p>
      <table style="border-collapse: collapse;" cellpadding="10" border="1">
        <tr align="center" valign="middle">
          <th><font size="16px">Nama Pertemuan Ilmiah/Seminar</font></th>
          <th><font size="16px">Judul Artikel Ilmiah</font></th>
          <th><font size="16px">Waktu dan Tempat</font></th>
        </tr>
        @if (count($seminars) === 0)
        <tr align="center" valign="middle">
          <td colspan="3"><font size="16px">Tidak ada data</font></td>
        </tr>
        @endif
        @foreach($seminars as $seminar)
          <tr valign="middle">
            <td><font size="16px">{{ $seminar->nama_kegiatan }}</font></td>            
            <td><font size="16px">{{ $seminar->nama_kegiatan }}</font></td>
            <td><font size="16px">{{ $seminar->tanggal_akhir }}, {{ $seminar->lokasi }}</font></td>
          </tr>
        @endforeach
      </table><br>

      <p><font size="16px">Pengalaman menulis <i>book chapter</i> di penerbit internasional 3 tahun terakhir</font></p>
      <table style="border-collapse: collapse;" cellpadding="10" border="1">
        <tr align="center" valign="middle">
          <th><font size="16px">Judul Buku</font></th>
          <th><font size="16px">Judul <i>Book Chapter</i></font></th>
          <th><font size="16px">Nama Penulis</font></th>
          <th><font size="16px">Tahun Terbit</font></th>
          <th><font size="16px">Nama Penerbit</font></th>
          <th><font size="16px">ISBN</font></th>
        </tr>
        @if (count($publikasibukus) === 0)
        <tr align="center" valign="middle">
          <td colspan="6"><font size="16px">Tidak ada data</font></td>
        </tr>
        @endif
        @foreach($publikasibukus as $publikasibuku)
          <tr valign="middle">
            <td><font size="16px">{{ $publikasibuku->judul_buku }}</font></td>
            <td><font size="16px">{{ $publikasibuku->judul_book_chapter }}</font></td>
            <td>
              <font size="16px">
              @foreach($publikasibuku->penelitipsb as $penelitipsb)
                {{$penelitipsb->pegawai->nama}}, 
              @endforeach
              @foreach($publikasibuku->penelitinonpsb as $penelitinonpsb)
                {{$penelitinonpsb->nama_peneliti}}, 
              @endforeach
              </font>
            </td>
            <td><font size="16px">{{ $publikasibuku->tahun_terbit }}</font></td>
            <td><font size="16px">{{ $publikasibuku->nama_penerbit }}</font></td>
            <td><font size="16px">{{ $publikasibuku->volume_isbn }}</font></td>
          </tr>
        @endforeach
      </table><br>

    </div>
  </body>
</html>