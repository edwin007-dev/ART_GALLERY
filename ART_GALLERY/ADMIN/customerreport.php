<?php
include("header.php");
include_once("../dboperation.php");
$obj = new dboperation();
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="Excel/customer_report.php" method="POST">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="card-title font-weight-bold mb-0">Customer Report</h3>
                            <button type="submit" name="addnew" class="btn btn-primary">Export</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
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
                                    $sql1 = "SELECT * FROM `tbl_user` u 
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
