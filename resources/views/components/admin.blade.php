<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link href="{{ asset('backend/img/logo/logo.png') }}" rel="icon">
  <title>{{ $title ?? null }}</title>
  <link href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="{{ asset('backend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('backend/css/ruang-admin.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  
  <link rel="stylesheet" href="{{ asset('css/buttons.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css">

  {{-- Lara-izi Toast --}}
  <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">


  {{-- fontawesome cdn --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  @stack('css')
  <style>
    .active {
      background-color: #0000000e !important;
    }

    .label-info {
      background-color: teal;
      color: white;
      padding: 2px;
    }

    .bootstrap-tagsinput {
      display: block;
    }

    a:hover {
      text-decoration: none;
    }
  </style>

</head>


@php
  $lang = session()->get('language');
  app()->setLocale($lang);
@endphp

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    @include('layouts.backend.partial.sidebar')
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        @include('layouts.backend.partial.topbar')
        <!-- Topbar -->

        <!-- Container Fluid-->
        {{ $slot }}
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      @include('layouts.backend.partial.footer')
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

  <script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('backend/js/ruang-admin.min.js') }}"></script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <!-- Page level plugins -->
  <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
  
  <script src="/js/datatable.min.js"></script>
  <script src="/js/dataTables.buttons.min.js"></script>
  <script src="/js/buttons.colVis.min.js"></script>
  <script src="/js/vfs_fonts.js"></script>
  <script src="/js/jszip.min.js"></script>
  <script src="/js/buttons.html5.min.js"></script>
  <script src="/js/dataTables.select.min.js"></script>
  <script src="/js/buttons.print.min.js"></script>
  <script src="{{ asset('js/global.js') }}"></script>
  {{-- Lara-izi-toast --}}
  <script src="{{ asset('js/iziToast.js') }}"></script>
  @include('vendor.lara-izitoast.toast')


  <script>
    // $(document).ready(function() {
    //   $('#dataTable').DataTable(); // ID From dataTable
    //   $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    // });

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });



    $(document).ready(function() {
      toastr.options.timeOut = 3000;
      @if (Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
      @elseif (Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
      @elseif (Session::has('warning'))
        toastr.warning('{{ Session::get('warning') }}');
      @elseif (Session::has('info'))
        toastr.info('{{ Session::get('info') }}');
      @endif
    });

    function onlyNumberKey(evt) {
      // Only ASCII character in that range allowed
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode
      if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
      return true;
    }
    $('.show_confirm').click(function(event) {
      var form = $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `Are you sure you want to delete this record?`,
          text: "If you delete this, it will be gone forever.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
          }
        });
    });
  </script>



  @stack('js')
</body>

</html>
