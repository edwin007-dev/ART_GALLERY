<?php
include_once("header.php");
include("../dboperation.php");

$obj = new dboperation();
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="row w-100 flex-grow">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Bookings by District</p>
                            <?php
                            $query = "SELECT count(*) as bookingcount, district_name FROM tbl_district d 
                                      INNER JOIN tbl_location l ON l.district_id = d.district_id 
                                      INNER JOIN tbl_user u ON u.Location_id = l.Location_id 
                                      GROUP BY l.district_id";
                            $result = $obj->executequery($query);
                            ?>
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                                google.charts.load('current', { 'packages': ['corechart'] });
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['District', 'Number'],
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "['" . $row["district_name"] . "', " . $row["bookingcount"] . "],";
                                        }
                                        ?>
                                    ]);
                                    var options = {
                                        title: 'Bookings by District',
                                        pieHole: 0.4,
                                        backgroundColor: '#f8f9fa',
                                        legend: { position: 'right' }
                                    };
                                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                    chart.draw(data, options);
                                }
                            </script>
                            <div style="width: 100%; margin-top: 6%;">
                                <div id="piechart" style="width: 100%; height: 500px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Bookings by Location</p>
                            <?php
                            $query = "SELECT count(*) as bookingcount, location_name FROM tbl_district d 
                                      INNER JOIN tbl_location l ON l.district_id = d.district_id 
                                      INNER JOIN tbl_user u ON u.Location_id = l.Location_id 
                                      GROUP BY l.location_id";
                            $result = $obj->executequery($query);
                            ?>
                            <script type="text/javascript">
                                google.charts.setOnLoadCallback(drawLocationChart);

                                function drawLocationChart() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Location', 'Number'],
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "['" . $row["location_name"] . "', " . $row["bookingcount"] . "],";
                                        }
                                        ?>
                                    ]);
                                    var options = {
                                        title: 'Bookings by Location',
                                        pieHole: 0.4,
                                        backgroundColor: '#f8f9fa',
                                        legend: { position: 'right' }
                                    };
                                    var chart = new google.visualization.PieChart(document.getElementById('locationPiechart'));
                                    chart.draw(data, options);
                                }
                            </script>
                            <div style="width: 100%; margin-top: 6%;">
                                <div id="locationPiechart" style="width: 100%; height: 500px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Financial Management Review</h4>
                    <div class="container mt-5">
                        <div class="text-center mb-4">
                            <h2 class="font-weight-bold">Customer Report</h2>
                        </div>

                        <form action="Excel/customer_report.php" method="POST">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="text-right mb-3">
                                        <button type="submit" name="addnew" class="btn btn-primary">Export</button>
                                    </div>
                                    <table class="table table-hover table-bordered table-striped">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Customer Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Location</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $s = 1;
                                            $sql1 = "SELECT * FROM tbl_user u 
                                                      INNER JOIN tbl_location l ON l.location_id = u.Location_id 
                                                      INNER JOIN tbl_district d ON d.district_id = l.district_id";
                                            $res = $obj->executequery($sql1);
                                            while ($display = mysqli_fetch_array($res)) {
                                                ?>
                                                <tr>
                                                    <td class="py-1"><?php echo $s++; ?></td>
                                                    <td><?php echo $display["Customername"]; ?></td>
                                                    <td><?php echo $display["Email"]; ?></td>
                                                    <td><?php echo $display["Phone"]; ?></td>
                                                    <td><?php echo $display["location_name"]; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("footer.php"); ?>