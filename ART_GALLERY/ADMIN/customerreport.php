<?php
include("header.php");
include_once("../dboperation.php");
$obj = new dboperation();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Customer Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <!-- <a href="./index.php">
                <img src="img/logo.png" alt="Logo" class="mb-3">
            </a> -->
            <h2 class="font-weight-bold">Customer Report</h2>
        </div>

        <form action="Excel/customer_report.php" method="POST">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-right mb-3">
                        <button type="submit" name="addnew" class="btn btn-primary">Export</button>
                    </div>
                    <table class="table table-hover table-bordered">
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
            </div>
        </form>
    </div>

    <?php include("footer.php"); ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
