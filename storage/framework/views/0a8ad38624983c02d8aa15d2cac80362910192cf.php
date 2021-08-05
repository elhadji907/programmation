
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 
  <script type="text/javascript">
   var analytics = <?php echo $civilite; ?>

   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart);

   function drawChart()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
     title : ''
    };
    var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
    chart.draw(data, options);
   }
  </script>
  <div class="container">
   <div class="card card-default">
    <div class="card-body" align="center">
     <div id="pie_chart" style="height:320px;">

     </div>
    </div>
   </div>
   
  </div><?php /**PATH /var/www/html/programmation/resources/views/google_pie_chart.blade.php ENDPATH**/ ?>