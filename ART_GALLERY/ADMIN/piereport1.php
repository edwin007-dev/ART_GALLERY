<?php
include("header.php");
include("../dboperation.php");
$obj = new dboperation();

 $query = "SELECT count(*) as bookingcount,district_name FROM tbl_district d inner join tbl_location l on l.district_id=d.district_id inner join tbl_user u on u.Location_id=l.Location_id  group by l.district_id";
$result = $obj->executequery($query);
?>
<!DOCTYPE html>
<html>

<head>
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script type="text/javascript">
          google.charts.load('current', { 'packages': ['corechart'] });
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
               var data = google.visualization.arrayToDataTable([
                    ['district', 'Number'],
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                         echo "['" . $row["district_name"] . "', " . $row["bookingcount"] . "],";
                    }
                    ?>
               ]);
               var options = {
                    title: 'Percentage ',
                    //is3D:true,  
                    pieHole: 0.4
               };
               var chart = new google.visualization.PieChart(document.getElementById('piechart'));
               chart.draw(data, options);
          }  
     </script>
</head>

<body>
     <div class="logo">
          <a href="./index.php">
               <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
               <img src="img/logo.png" alt="">&nbsp; &nbsp;</a>
     </div>
     <div style="width:900px; margin-top:6%">
          <h3 align="center">Pie chart showing Booking in one district</h3>
          <br />
          <div id="piechart" style="width: 900px; height: 500px;"></div>
     </div>
     </div>
     </div>
</body>

</html>
</body>

</html>
<?php
include("footer.php");
?>