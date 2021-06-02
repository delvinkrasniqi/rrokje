<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
let containerWidth = document.querySelector(".container").offsetWidth;
</script>


<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Shkronja', 'Perqindje'],
          <?php
                        foreach($shkronjat as $shkronja){

                            echo "['" . $shkronja['shkronja'] . "'," . ($shkronja['numri']*100)/count($textArray) . "],";

                        }
                       ?> 
        ]);

        var options = {
          width: containerWidth,
          height:'400px',
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>