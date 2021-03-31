<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="Creative Tim">
  <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('backend/assets/img/brand/favicon.png') }}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('backend/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('backend/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/argon.css?v=1.2.0') }}" type="text/css">
  <!-- Extra css -->
  @yield('extraCss')
   <!-- Errors -->
  @include('backend.errors.validation-error')
  <!-- Livewire css -->
  @livewireStyles

</head>

<body>
  <!-- Sidenav -->
  @include('backend.layouts.side-nav')
  <!-- Main content -->
  <div class="main-content" id="panel">
  <!-- Topnav -->
  @include('backend.layouts.top-nav')
  <!-- Header -->

  <!-- main content -->
  @yield('content')

  <!-- Footer -->
  <footer class="footer pt-0">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6">
          <div class="copyright text-center  text-lg-left  text-muted">
            &copy; 2021 <a href="" class="font-weight-bold ml-1" target="_blank"> 💖 Shakil Ahmed</a>
          </div>
        </div>
      </div>
    </footer>

  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('backend/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
 
  <!-- Argon JS -->
  <script src="{{ asset('backend/assets/js/argon.js?v=1.2.0') }}"></script>
  <!-- Extra js -->
  @yield('extraJs')
  
  <!-- Livewire JS -->
  @livewireScripts
  <!-- Sweet Alert -->
  @include('sweetalert::alert')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
    window.addEventListener('swal:modal', event => { 
        swal({
          title: event.detail.message,
          text: event.detail.text,
          icon: event.detail.type,
          html: true
        });
    });  
    
    window.addEventListener('swal:confirm', event => { 
        swal({
          title: event.detail.message,
          text: event.detail.text,
          icon: event.detail.type,   
          buttons: true,
          dangerMode: true, 
          html: true  
        })
        .then((willDelete) => {
          if (willDelete) {
            window.livewire.emit('remove', event.detail.roleId);
          }
        });
    });
    
  </script>
</body>

</html>
