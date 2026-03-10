<?php
include("header.php");
include("../dboperation.php");
$obj = new dboperation();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Category Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <!-- <a href="./index.php">
                <img src="img/logo.png" alt="Logo" class="mb-3">
            </a> -->
            <h2 class="font-weight-bold">Category Report</h2>
        </div>

        <form action="Excel/category_report.php" method="post">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-right mb-3">
                        <button type="submit" name="addnew" class="btn btn-primary">Export</button>
                    </div>

                    <table class="table table-hover table-bordered">
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
            </div>
        </form>
    </div>

    <?php include("footer.php"); ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>








