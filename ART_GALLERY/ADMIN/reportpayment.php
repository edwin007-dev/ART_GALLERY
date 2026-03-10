<?php
include("header.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            background-color: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .logo img {
            max-width: 100px;
        }
        h2 {
            font-family: fantasy;
            margin-bottom: 20px;
        }
        .btn-export {
            margin-left: auto;
            margin-bottom: 20px;
        }
        table {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo text-center">
            <a href="./index.php">
                <img src="img/logo.png" alt="">
            </a>
        </div>
        
        <form action="Excel/paymentreport.php" method="POST">
            <h2 class="text-center">Payment REPORT</h2>
            <div class="text-right">
                <input type="submit" name="addnew" value="Export" class="btn btn-primary btn-export">
            </div>
            <table class="table table-hover">
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
                    include("../dboperation.php");
                    $obj = new dboperation();

                    $s = 1;
                   $sql = "SELECT u.Customername, p.initialamount, p.Paymentdate FROM tbl_payment p INNER JOIN tbl_request r ON r.request_id = p.requestid INNER JOIN tbl_user u ON u.Userid = r.customer_id";
                    $result = $obj->executequery($sql);
                    while ($display = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                        <td class="py-1"><?php echo $s++; ?></td>
                  <td> <?php echo $display["Customername"]; ?></td>
                  <td> <?php echo $display["initialamount"]; ?></td>
                  <td> <?php echo $display["Paymentdate"]; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
    
    <?php include("footer.php"); ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>