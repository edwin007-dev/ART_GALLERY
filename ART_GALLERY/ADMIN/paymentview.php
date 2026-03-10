<?php
include_once("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
$sqlquery = "SELECT * FROM `tbl_payment` p INNER join tbl_request r on r.request_id=p.requestid INNER join  tbl_user u on u.Userid=r.customer_id";
$row = $obj->executequery($sqlquery);
?>
<!-- dashboard inner -->


<div class="midde_cont">
    <div class="container-fluid">
        <div class="row">
            <div class="col-11 d-flex justify-content-end">
                <!-- <button type="submit" class="btn btn-primary mr-1 mb-3 mt-5"
                    onclick='window.location.href="getlocation.php"'> -->
            </div>
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Requested details</h2>
                        </div>
                    </div>
                    <div class="table_section padding_infor_info">

                        <input type="date" id="date" class="form-control" style="width:300px;">
                        <div class="table-responsive-sm">

                            <div class="table-responsive" id="locdiv">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="font-size: 22px">Slno</th>

                                            <th style="font-size: 22px">Customer name</th>
                                            <th style="font-size: 22px">Amount</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $t = 0;

                                        while ($display = mysqli_fetch_array($row)) {
                                            ?>
                                            <tr>
                                                <td style="font-size: 18px"><?php echo $i++; ?></td>

                                                <td style="font-size: 18px"><?php echo $display['Customername']; ?></td>
                                                <td style="font-size: 18px"><?php echo $display['initialamount']; ?></td>
                                                <?php $t += $display["initialamount"]; ?>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        


                                    </tbody>
                                    <h3 style="margin-left:1100px;">TOTAL:<?php echo $t ?></h3>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script src="../jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {


        $("#date").change(function () {
            var did = $(this).val();

            $.ajax({
                type: "POST",
                url: "getamount.php",
                data: "date=" + did,

                success: function (data) {
                    //alert(did);
                    $("#locdiv").html(data);
                }
            });
        });
    });
</script>

<?php
include_once('footer.php');
?>