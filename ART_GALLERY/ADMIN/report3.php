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
                    <form action="Excel/category_report.php" method="post">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="card-title font-weight-bold mb-0">Category Report</h3>
                            <button type="submit" name="addnew" class="btn btn-primary">Export</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Category Name</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $s = 1;
                                    $sql = "SELECT count(*) as bookingcount, Category_name 
                                            FROM tbl_category c 
                                            INNER JOIN tbl_artwork a ON a.category_id = c.Category_id  
                                            GROUP BY a.category_id";
                                    $result = $obj->executequery($sql);
                                    while ($display = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td class="py-1"><?php echo $s++; ?></td>
                                            <td><?php echo $display["Category_name"]; ?></td>
                                            <td><?php echo $display["bookingcount"]; ?></td>
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
