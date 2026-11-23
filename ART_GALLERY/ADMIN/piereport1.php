<?php
include("header.php");
include("../dboperation.php");
$obj = new dboperation();

$query = "SELECT count(*) as bookingcount,district_name FROM tbl_district d inner join tbl_location l on l.district_id=d.district_id inner join tbl_user u on u.Location_id=l.Location_id group by l.district_id";
$result = $obj->executequery($query);
?>

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
            pieHole: 0.4
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }  
</script>

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4 font-weight-bold">Pie chart showing Booking in one district</h3>
                    <div class="d-flex justify-content-center">
                        <div id="piechart" style="width: 100%; max-width: 900px; height: 500px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
