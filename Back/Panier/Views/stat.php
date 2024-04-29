<?php

$con = mysqli_connect("localhost","root","","9ach");  


include_once '../config.php';
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>


    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['id_user','etat'],
         <?php
         $sql = "SELECT * FROM commande";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['id_user']."',".$result['etat']."],";          }

         ?>
        ]);

        var options = {
          title: 'Voici les statistiques des commandes '
        };

        var chart = new google.visualization.BarChart(document.getElementById('barchart_values'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="barchart_values" style="width: 900px; height: 550px;"></div>
    <button type="submit" class="btn btn-success" style="width: 200px;" onclick="location.href='afficherCommande.php'">La liste des commandes</button>
  </body>
</html>
