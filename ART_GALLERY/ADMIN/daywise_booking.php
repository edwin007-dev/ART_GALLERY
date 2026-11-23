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
                    <h3 class="card-title font-weight-bold mb-4">Datewise Booking Report</h3>
                    <form action="" method="POST" class="mb-4">
                        <div class="row">
                            <div class="col-md-5 form-group">
                                <label>From Date:</label>
                                <input type="date" class="form-control" name="fromdate" required value="<?php echo isset($_POST['fromdate']) ? $_POST['fromdate'] : ''; ?>">
                            </div>
                            <div class="col-md-5 form-group">
                                <label>To Date:</label>
                                <input type="date" class="form-control" name="todate" required value="<?php echo isset($_POST['todate']) ? $_POST['todate'] : ''; ?>">
                            </div>
                            <div class="col-md-2 form-group d-flex align-items-end">
                                <input type="submit" name="btnsubmit" value="Submit" class="btn btn-primary btn-block">
                            </div>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST["btnsubmit"])) {
                        $fromdate = $_POST["fromdate"];
                        $todate = $_POST["todate"];
                        $_SESSION['fdate'] = $fromdate;
                        $_SESSION['tdate'] = $todate;
                        $s = 1;
                    ?>
                        <div class="table-responsive mt-4">
                            <table class="table table-hover table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Artworks</th>
                                        <th>No of Booking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT count(r.art_id) as count, art_name FROM tbl_artwork a INNER JOIN tbl_request r ON r.art_id=a.art_id WHERE r.request_date >='$fromdate' AND r.request_date <='$todate' GROUP BY r.art_id";
                                    $res = $obj->executequery($sql);
                                    while ($display = mysqli_fetch_array($res)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $s++; ?></td>
                                            <td><?php echo $display["art_name"]; ?></td>
                                            <td><?php echo $display["count"]; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
