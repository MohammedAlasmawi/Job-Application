<?php
require 'config.php';
require 'headerA.html';
if(!empty($_SESSION["AdminID"])){
  $AdminID = $_SESSION["AdminID"];
  $q = mysqli_query($conn, "SELECT * FROM Admin WHERE AdminID = $AdminID");
  $row = mysqli_fetch_assoc($q);
}
else{
  header("Location: loginA.php");
}
$query = "Select Field,COUNT(*) as number from application GROUP by Field;";
$result = mysqli_query($conn,$query);
$query1 = "Select Field,COUNT(*) as number1 from company GROUP by Field;";
$result1 = mysqli_query($conn,$query1);
$query2 = "Select Availability,COUNT(*) as number2 from information GROUP by Availability;";
$result2 = mysqli_query($conn,$query2);
$query3 = "Select majorField,COUNT(*) as number3 from education GROUP by majorField;";
$result3 = mysqli_query($conn,$query3);
$query4 = "Select certificateField,COUNT(*) as number4 from certificate GROUP by certificateField;";
$result4 = mysqli_query($conn,$query4);
?>
<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Visualzation</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Field', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["Field"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      //is3D:true,
                      title: 'Percentage of various Fields in the Application table', 
                      pieHole: 1.5,
                      'width':800,
                      'height':400,
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script> 
<!-- second  -->
<script>
google.charts.load('current',{packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
// Set Data
    var data = google.visualization.arrayToDataTable([  
                          ['Field', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result1))  
                          {  
                               echo "['".$row["Field"]."', ".$row["number1"]."],";  
                          }  
                          ?>  
]);
// Set Options
var options = {
  title: 'Percentage of various Fields in the Company table',
  hAxis: {title: 'Field'},
  legend: 'none',
  'width':900,
  'height':400,
};
// Draw
var chart = new google.visualization.LineChart(document.getElementById('myChart'));
chart.draw(data, options);
}
</script>
<!-- Third -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Field', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result4))  
                          {  
                               echo "['".$row["certificateField"]."', ".$row["number4"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      //is3D:true,
                      title: 'Percentage of Certificate Field in the Certificate table', 
                      pieHole: 1.5,
                      'width':800,
                      'height':400,
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart1'));  
                chart.draw(data, options);  
           }  
           </script> 
<!-- Forth  -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['Field', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result3))  
                          {  
                               echo "['".$row["majorField"]."', ".$row["number3"]."],";  
                          }  
                          ?>  
        ]);

        var options = {
          width: 600,
          legend: { position: 'none' },
          chart: {
            title: 'Percentage of various Education Fields in the Education table', },
          axes: {
            x: {
              0: { side: 'top', label: 'Field'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div1'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
<!-- Fifth  -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = google.visualization.arrayToDataTable([  
                          ['Availability', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result2))  
                          {  
                               echo "['".$row["Availability"]."', ".$row["number2"]."],";  
                          }  
                          ?>  
        ]);

        var options = {
          title: 'Percentage of Availability in the Seeker Information table',
          width: 1000,
          legend: { position: 'none' },
          chart: { title: 'Percentage of Availability to work in the Seeker Information table',
                   },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Percentage'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>
<!-- Fifth  -->

      </head>  
      <body>  
           <br /><br />
           <div class="chart1">  
                <div id="piechart" class="title"></div> 
                <div id="myChart" class="title1"></div>
            </div>
            <br>
                <div class="chart2">
                <div id="top_x_div" class="title2"></div>
                </div>
                 <div class="chart3">
                 <div id="top_x_div1" class="title3"></div>
                 </div>
                 
                <div class="chart4">
                <div id="piechart1" class="title4" ></div>
                </div>
                
            </br>
            
      </body>  
 </html>  