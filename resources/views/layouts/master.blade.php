<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>SIMPEL ADMIN</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('/admin-lte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/admin-lte/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('/admin-lte/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('/admin-lte/plugins/iCheck/all.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/admin-lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset('/admin-lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('/admin-lte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('/admin-lte/bower_components/select2/dist/css/select2.min.css') }}">
  <!-- jQuery Smart Wizard 4 -->
  <link rel="stylesheet" href="{{ asset('/smart-wizard/dist/css/smart_wizard.css') }}"/>
  <link rel="stylesheet" href="{{ asset('/smart-wizard/dist/css/smart_wizard_theme_arrows.css') }}"/>
  <link rel="stylesheet" href="{{ asset('/smart-wizard/dist/css/smart_wizard_theme_circles.css') }}"/>
  <link rel="stylesheet" href="{{ asset('/smart-wizard/dist/css/smart_wizard_theme_dots.css') }}"/>

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/admin-lte/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('/admin-lte/dist/css/skins/_all-skins.min.css') }}">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" id="app">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SIMPEL</b>ADMIN</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIMPEL</b>ADMIN</span>
    </a>      

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{ asset('/admin-lte/dist/img/photo4.jpg') }}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{Auth::user()->pegawai->nama}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-body">
                <div align="center">
                  <a class="btn btn-default btn-flat" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('/admin-lte/dist/img/photo4.jpg') }}" style="width: 100px" class="img-circle center-block" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->pegawai->nama}}</p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="{{ Request::path() == 'dashboard' ? 'active' : '' }}">
          <a href="{{url('home')}}"><i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview" class="{{ Request::path() == 'master' ? 'active' : '' }}">
          <a href="#"><i class="fa fa-cogs"></i>
            <span>Master</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('fakultas')}}">Fakultas</a></li>
            <li><a href="{{url('departemen')}}">Departemen</a></li>
            <li><a href="{{url('tipekegiatan')}}">Tipe Kegiatan</a></li>
            <li><a href="{{url('peran')}}">Peran</a></li>
            <li><a href="{{url('kategori')}}">Kategori</a></li>
            <li><a href="{{url('tipeberkas')}}">Tipe Berkas</a></li>
          </ul>
        </li>
        <li class="treeview" class="{{ Request::path() == 'peneliti' ? 'active' : '' }}">
          <a href="#"><i class="fa fa-user"></i>
            <span>Peneliti</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('penelitipsb')}}">Peneliti Biofarmaka</a></li>
            <li><a href="{{url('penelitinonpsb')}}">Peneliti Non Biofarmaka</a></li>
          </ul>
        </li>
        <li class="{{ Request::path() == 'berita' ? 'active' : '' }}">
          <a href="{{url('berita')}}"><i class="fa fa-newspaper-o"></i>
            <span>Berita</span>
          </a>
        </li>
        <li class="treeview" class="{{ Request::path() == 'publikasi' ? 'active' : '' }}">
          <a href="{{url('publikasijurnal')}}"><i class="fa fa-book"></i>
            <span>Publikasi</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('publikasijurnal')}}">Publikasi Jurnal</a></li>
            <li><a href="{{url('publikasibuku')}}">Publikasi Buku</a></li>
          </ul>
        </li>
        <li class="treeview" class="{{ Request::path() == 'peneliti' ? 'active' : '' }}">
          <a href="#"><i class="fa fa-link"></i>
            <span>Kegiatan</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
          <?php $tipekegiatans = \App\TipeKegiatan::all();?>
          @foreach($tipekegiatans as $tipekegiatan)
            <li><a href="{{ route('kegiatan.index', $tipekegiatan->id)}}">{{$tipekegiatan->nama_tipe_kegiatan}}</a></li>
          @endforeach
          </ul>
        </li>
        <li class="{{ Request::path() == 'unduh' ? 'active' : '' }}">
          <a href="{{url('unduh')}}"><i class="fa fa-download"></i>
            <span>Unduh Laporan</span>
          </a>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">
      @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-check"></i> Berhasil!</h4> {{ Session::get('success') }}
        </div>
      @elseif (Session::has('warning'))
        <div class="alert alert-warning" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-check"></i> Gagal!</h4> {{ Session::get('warning') }}
        </div>
      @endif
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018.</strong> All rights reserved.
  </footer>
</div>
<!-- jQuery 3 -->
<script src="{{ asset('/admin-lte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('/admin-lte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('/admin-lte/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/admin-lte/dist/js/adminlte.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('/admin-lte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('/admin-lte/plugins/iCheck/icheck.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('/admin-lte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/admin-lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('/admin-lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('/admin-lte/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('/admin-lte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- CK Editor -->
<script src="{{ asset('/admin-lte/bower_components/ckeditor/ckeditor.js') }}"></script>
<!-- jQuery Smart Wizard 4 -->
<script src="{{ asset('/smart-wizard/dist/js/jquery.smartWizard.min.js') }}"></script>

<!-- Page script -->
<script>
  $(function () {
    $('#hapus').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var del_id = button.data('delid') 
      var modal = $(this)
      modal.find('.modal-body #del_id').val(del_id);
    })

    //Initialize Select2 Elements
    $('.select2').select2()

    //DataTables
    $('#datatable').DataTable({
      "scrollX": true
    })

    //Date picker
    $('#datepicker1').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    })
    $('#datepicker2').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    })
    $('#yearpicker').datepicker({
      minViewMode: 'years',
      format: 'yyyy',
      autoclose: true
    })

    //Date range picker
    $('#daterange').daterangepicker()

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })

    //jQuery Smart Wizard 4
    $('#smartwizard').smartWizard({
      theme: 'circles'
    })
    
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
  })
</script>
</body>
</html>
