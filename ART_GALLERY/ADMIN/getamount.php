<?php
require_once("../dboperation.php");
$obj = new dboperation();
$date = $_POST["date"];
$sqlsalary = "SELECT * FROM `tbl_payment` p INNER join tbl_request r on r.request_id=p.requestid INNER join  tbl_user u on u.Userid=r.customer_id where p.paymentdate='$date'";
$result = $obj->executequery($sqlsalary);

?>
<table class="table table-striped">

        <thead>
                <tr>
                        <th>Slno</th>

                        <th>Customer name</th>
                        <th>Amount</th>
                </tr>

        </thead>
        <tbody>

                <?php

                if (mysqli_num_rows($result) > 0) {
                        $i = 1;
                        $t = 0;

                        while ($display = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                        <td><?php echo $i++; ?></td>

                                        <td><?php echo $display["Customername"]; ?></td>
                                        <th><?php echo $display['initialamount']; ?></th>



                                </tr>
                                <tr>
                                        <?php $t += $display["initialamount"]; ?>

                                </tr>
                                <?php
                        }
                } else {
                        ?>
                        <tr>
                                <th></th>
                                <th></th>
                                <th>No data found</th>
                                <th></th>
                        </tr>
                        <?php
                }
                ?>
        </tbody>
        <h3 style="margin-left:1100px;">TOTAL:<?php $t ?></h3>
</table>