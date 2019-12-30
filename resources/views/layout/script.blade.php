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


  <script src="{{ asset('dist/js/select2.min.js') }}"></script>
  
  <script type="text/javascript">
  
        $("#objet").select2({
              placeholder: "selectioner un objet",
              allowClear: true
          });
  </script>

  <script type="text/javascript">
  
    $("#civilite").select2({
          placeholder: "selectioner un sexe",
          allowClear: true
      });
</script>  
  <script type="text/javascript">
  
  $("#secteur").select2({
        placeholder: "selectione un secteur",
        allowClear: true
    });
</script>
  <script type="text/javascript">
  
  $("#domaine").select2({
        placeholder: "selectioner un domaine",
        allowClear: true
    });
</script>

  <script type="text/javascript">
  
    $("#direction").select2({
          placeholder: "selectioner pour imputer le courrier",
          allowClear: true
      });
</script>
  <script type="text/javascript">
  
    $("#fonction").select2({
          placeholder: "selectioner la fonction",
          allowClear: true
      });
</script>
  <script type="text/javascript">
  
    $("#categorie").select2({
          placeholder: "selectionerla categorie",
          allowClear: true
      });
</script>
  
  <!-- Page level plugins -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('js/feather.min.js') }}"></script>
    <script>
        feather.replace()
    </script>    
@stack('scripts')
@yield('javascripts')