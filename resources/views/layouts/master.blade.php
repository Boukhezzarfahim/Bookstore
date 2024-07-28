<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bookstore</title>

  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  @livewireStyles
</head>
<body class="hold-transition sidebar-mini">
 
<div class="wrapper">
 
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav d-flex w-100">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item ml-auto">
        <x-topnav />
      </li>
    </ul>
</nav>



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="d-flex justify-content-center p-4">
        <div class="image">
          <a href="{{ route('dashboard') }}">
            <img src="{{ asset('images/books.jpg') }}" alt="User Avatar" class="img-fluid img-circle" style="width: 80px; height: 80px;">
          </a>
        </div>
        <div class="info">
          {{-- {{ userFullName() }} --}}
          <a href="#" class="d-block"></a>
        </div>
      </div>

      <hr>
   
      <!-- Sidebar Menu -->
      
      <x-menu />
  
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div id="content">
          @yield('contenu')
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <x-sidebar />
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!-- Default to the left -->
    <strong>Copyright &copy; 2024 <a href="https://adminlte.io">Boukhezzar Fahim</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ asset('js/js.js') }}"></script>
@livewireScripts
</body>
</html>
