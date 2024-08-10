<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!--CSRF Token-->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('images/logo_men.png') }}" />
  <title>GESTION DE SCOLARITE </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
  <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('template/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('template/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('template/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('template/plugins/summernote/summernote-bs4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/g_scolarite.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed" >
<div class="wrapper">

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
   GESTION INFORMATIQUE DE SCOLARITE

   <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Authentification') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Se deconnecter') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>



</nav>

<div class="content-wrapper" style="min-height: 250px;">
    <div class="container-fluid" style="padding: 5px;background-color: white;border-radius: 5px;margin-top: 10px;">
        <input type="hidden" id="lien-gif" value="{{ asset('images/loader.gif') }}">

  
        @yield('content')
        @include('modal')
    </div>
</div>


  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ Route('home')}}" class="brand-link">
      <center><img src="{{ asset('images/logo_men.png') }}"></center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ Route('home')}}" class="nav-link menue-mere">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Accueil
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link menue-mere">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                MISE A JOUR
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('etudiant') }}" class="nav-link">
                  <i class="fa fa-graduation-cap nav-icon"></i>
                  <p>ELEVE</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="{{ Route('enseignant') }}" class="nav-link">
                  <i class="fas fa-chalkboard-teacher nav-icon"></i>
                  <p>ENSEIGNANT</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="{{ Route('mobilier') }}" class="nav-link">
                  <i class="fa fa-table nav-icon"></i>
                  <p>MOBILIER</p>
                </a>
              </li>
            <li class="nav-item">
                <a href="{{ Route('immobilier') }}" class="nav-link">
                  <i class="fa fa-home nav-icon"></i>
                  <p>IMMOBILIER</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link menue-mere">
              <i class="fas fa-sticky-note nav-icon"></i>
              <p>
                GESTION DE NOTE
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('transcription') }}" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>TRANSCRIPTION</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('bulletin') }}" class="nav-link">
                  <i class="fa fa-file-export nav-icon"></i>
                  <p>EXPORT DE BULLETIN</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ Route('utilisateur')}}" class="nav-link menue-mere">
              <i class="fa fa-user nav-icon"></i>
              <p>
                UTILISATEUR
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>




  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('template/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('template/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('template/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('template/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('template/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('template/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('template/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('template/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('template/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('template/dist/js/pages/dashboard.js') }}"></script>

<script src="{{ asset('js/g_scolaire.js') }}"></script>
<script src="{{ asset('js/bootstrap-validate.js') }}"></script>
<script >
    bootstrapValidate('#cin', 'max:12: Vérifier votre numero CIN')
    bootstrapValidate('#cin', 'min:12: Vérifier votre numero CIN')
    
    bootstrapValidate('#contact', 'startsWith:03: Vérifier votre numero téléphone')

</script>
</body>
</html>
