<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>SIP</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('/admin-lte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/admin-lte/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('/admin-lte/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/admin-lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- jQuery Smart Wizard 4 -->
  <link rel="stylesheet" href="{{ asset('/smart-wizard/dist/css/smart_wizard.css') }}"/>
  <link rel="stylesheet" href="{{ asset('/smart-wizard/dist/css/smart_wizard_theme_arrows.css') }}"/>
  <link rel="stylesheet" href="{{ asset('/smart-wizard/dist/css/smart_wizard_theme_circles.css') }}"/>
  <link rel="stylesheet" href="{{ asset('/smart-wizard/dist/css/smart_wizard_theme_dots.css') }}"/>
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/admin-lte/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('/admin-lte/dist/css/skins/_all-skins.min.css') }}">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue layout-top-nav">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-left" href="{{url('/')}}"><img style="height: 80px" src="{{ asset('/image/Logo_IPB.png') }}"></a>
          <div class="navbar-left">
            <font color="white" style="font-size: 30px">Trop BRC</font><br>
            <font color="white" style="font-family: Brush Script MT, cursive; font-size: 28px">Tropical Biopharmaca Research Center</font>
          </div>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
        <font class="navbar-right" color="white" style="font-size: 24px; vertical-align: middle;"><br>Sistem Informasi Manajemen Peneliti</font>
      </div>
      </div>
    </nav>
  </header>

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse1">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse1">
          <ul class="nav navbar-nav">
            <li class="{{ Request::path() == 'welcome' ? 'active' : '' }}"><a href="{{url('/')}}">Home <span class="sr-only">(current)</span></a></li>
            <li class="{{ Request::path() == 'berita' ? 'active' : '' }}"><a href="{{url('berita')}}">Berita</a></li>
            <li class="dropdown {{ Request::path() == 'penelitipsb' ? 'active' : '' }} {{ Request::path() == 'penelitinonpsb' ? 'active' : '' }}">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Peneliti <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{url('penelitipsb')}}">Peneliti Biofarmaka</a></li>
                <li><a href="{{url('penelitinonpsb')}}">Peneliti Non Biofarmaka</a></li>
              </ul>
            </li>
            <li class="dropdown {{ Request::path() == 'kegiatan' ? 'active' : '' }}">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kegiatan <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <?php $tipekegiatans = \App\TipeKegiatan::all();?>
                @foreach($tipekegiatans as $tipekegiatan)
                  <li><a href="{{ route('kegiatan.index', $tipekegiatan->id)}}">{{$tipekegiatan->nama_tipe_kegiatan}}</a></li>
                @endforeach
              </ul>
            </li>
            <li class="dropdown {{ Request::path() == 'publikasibuku' ? 'active' : '' }} {{ Request::path() == 'publikasijurnal' ? 'active' : '' }}">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Publikasi <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{url('publikasibuku')}}">Publikasi Buku</a></li>
                <li><a href="{{url('publikasijurnal')}}">Publikasi Jurnal</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  
  <!-- Main content -->
  <div class="content-wrapper">
    <section class="content container">
      @yield('content')
    </section>
  </div>

  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="row">
      <div class="col-md-6" align="center">
        <h4 style="text-align:center">Media Sosial</h4>
        <a href="https://www.facebook.com/pusat.studi.biofarmaka"><i class="fa fa-facebook-square fa-2x social"></i></a>
        <a href="https://twitter.com/BiofarmakaIPB"><i class="fa fa-twitter-square fa-2x social"></i></a>
        <a href="https://plus.google.com/+BiofarmakaIPB"><i class="fa fa-google-plus-square fa-2x social"></i></a>
        <a href="https://www.linkedin.com/in/biofarmakaipb"><i class="fa fa-linkedin-square fa-2x social"></i></a>
        <a href="https://www.youtube.com/user/biofarmakaipb"><i class="fa fa-youtube-square fa-2x social"></i></a>
        <a href="https://www.instagram.com/biofarmaka.ipb"><i class="fa  fa-instagram fa-2x social"></i></a><br><br>
        <a href="{{ route('login') }}">Login Admin</a>
      </div>
      <div class="col-md-6">
        <h4 style="text-align:center">Kontak</h4>
        <ul class="fa-ul">
          <li><i class="fa-li fa fa-home"></i>Kampus IPB Taman Kencana, Jl. Taman Kencana No. 3, Bogor 16128</li>
          <li><i class="fa-li fa fa-phone"></i>+62 251 8373561</li>
          <li><i class="fa-li fa fa-fax"></i>+62 251 8347525</li>
          <li><i class="fa-li fa fa-mobile-phone"></i>+62 812-8868-1757</li>
          <li><i class="fa-li fa fa-envelope"></i>bfarmaka@gmail.com; tropbrc@apps.ipb.ac.id</li>
          <li><i class="fa-li fa fa-globe"></i><a href="http://biofarmaka.ipb.ac.id">http://biofarmaka.ipb.ac.id</a></li>
        </ul>
      </div>
    </div>
  </footer>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Rachel | Departemen Ilmu Komputer IPB</b>
    </div>
    <b>Copyright &copy; 2018.</b> All rights reserved.
  </footer>

  <!-- Script -->
    <!-- jQuery 3 -->
    <script src="{{ asset('/admin-lte/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('/admin-lte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('/admin-lte/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/admin-lte/dist/js/adminlte.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('/admin-lte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/admin-lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- jQuery Smart Wizard 4 -->
    <script src="{{ asset('/smart-wizard/dist/js/jquery.smartWizard.min.js') }}"></script>
    <!-- jplist -->
    <script src="{{ asset('/jplist/dist/js/jplist.core.min.js') }}"></script>
    <script src="{{ asset('/jplist/dist/js/jplist.bootstrap-filter-dropdown.min.js') }}"></script>
    <script src="{{ asset('/jplist/dist/js/jplist.bootstrap-sort-dropdown.min.js') }}"></script>  
    <script src="{{ asset('/jplist/dist/js/jplist.bootstrap-pagination-bundle.min.js') }}"></script>
    <script src="{{ asset('/jplist/dist/js/jplist.textbox-filter.min.js') }}"></script>

    <!-- Page script -->
    <script>
      $(function () {
        //DataTables
        $('#datatable').DataTable({
          "scrollX": true
        })
        //jQuery Smart Wizard 4
        $('#smartwizard').smartWizard({
          theme: 'circles'
        })
        //jplist
        $('#demo').jplist({       
          itemsBox: '.list',
          itemPath: '.list-item',
          panelPath: '.jplist-panel' 
        })
        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#myDIV *").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          })
        })
      })
    </script>
</body>
</html>

