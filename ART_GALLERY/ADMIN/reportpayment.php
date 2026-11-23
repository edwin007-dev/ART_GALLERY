<?php
include("header.php");
include("../dboperation.php");
$obj = new dboperation();
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="Excel/paymentreport.php" method="POST">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="card-title font-weight-bold mb-0">Payment REPORT</h3>
                            <input type="submit" name="addnew" value="Export" class="btn btn-primary">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>User Name</th>
                                        <th>Initial Amount</th>
                                        <th>Payment Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $s = 1;
                                    $sql = "SELECT u.Customername, p.initialamount, p.Paymentdate FROM tbl_payment p INNER JOIN tbl_request r ON r.request_id = p.requestid INNER JOIN tbl_user u ON u.Userid = r.customer_id";
                                    $result = $obj->executequery($sql);
                                    while ($display = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td class="py-1"><?php echo $s++; ?></td>
                                            <td><?php echo $display["Customername"]; ?></td>
                                            <td><?php echo $display["initialamount"]; ?></td>
                                            <td><?php echo $display["Paymentdate"]; ?></td>
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
