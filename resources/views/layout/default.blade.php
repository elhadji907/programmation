<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ config('app.name', 'ONFP') }}</title>

 {{--  <!-- Custom fonts for this template--> --}}
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

{{--   <!-- Custom styles for this template--> --}}
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/myStyle.css') }}" rel="stylesheet">
 
  <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

</head>

<body>

{{--   <!-- Page Wrapper --> --}}
  <div id="wrapper">

 {{--    <!-- Sidebar --> --}}
  @include('layout.sidebar')
{{--     <!-- End of Sidebar --> --}}

{{--     <!-- Content Wrapper --> --}}
    <div id="content-wrapper" class="d-flex flex-column">
      @include('layout.navbar')
{{--       <!-- Main Content --> --}}

@section('content')  

@include('layout.main')
{{--  <!-- End of Main Content --> --}}
@show

{{--       <!-- Footer --> --}}
      @include('layout.footer')
{{--       <!-- End of Footer --> --}}

    </div>
{{--     <!-- End of Content Wrapper --> --}}

  </div>
{{--   <!-- End of Page Wrapper --> --}}

{{--   <!-- Scroll to Top Button--> --}}
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

{{--   <!-- Logout Modal--> --}}
  @include('layout.logout')

{{--   <!-- Bootstrap core JavaScript--> --}}
  @include('layout.script')

</body>

</html>