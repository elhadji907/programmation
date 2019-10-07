<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

{{--   <!-- Core plugin JavaScript--> --}}
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

{{--  Custom scripts for all pages  --}}
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

{{--   <!-- Page level plugins --> --}}
  <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

 {{--  <!-- Page level custom scripts --> --}}
  <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

  
  <!-- Page level plugins -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

 {{--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>  
  --}}
    {{-- <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script> --}}
    <script src="{{ asset('js/feather.min.js') }}"></script>
    <script>
        feather.replace()
    </script>

    {{-- <script src='https://cdn.tiny.cloud/1/no-api-key/tinymce/4/tinymce.min.js' referrerpolicy="origin"></script> --}}
    <script src="/path/to/tinymce.min.js"></script>


@stack('scripts')