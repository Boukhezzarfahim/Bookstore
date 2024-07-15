<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bookstore</title>

  <link href="{{ mix('css/app.css') }}" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>

  @livewireStyles
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <x-topnav />
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="d-flex justify-content-center p-4">
        <div class="image">
          <a href="{{ route('home') }}">
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
<script>
  $(document).pjax('a[data-pjax]', '#content', {
    fragment: '#content',
    timeout: 1000
  });

  $(document).on('pjax:complete', function() {
    console.log('PJAX: Content updated');
    // Réinitialiser Livewire après PJAX
    if (typeof Livewire !== 'undefined') {
      Livewire.rescan();
    }
  });
</script>
@livewireScripts
</body>
</html>
