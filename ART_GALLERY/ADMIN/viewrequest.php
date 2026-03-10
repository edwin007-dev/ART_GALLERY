<?php
include_once("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
$sql = "select * from tbl_user";
$sqlquery = "select * from tbl_request r INNER join tbl_artwork a on a.art_id=r.art_id inner join tbl_user u on u.Userid=r.customer_id where r.status='Requested'";
$row = $obj->executequery($sqlquery);
?>
<!-- dashboard inner -->


<div class="midde_cont">
    <div class="container-fluid">
        <div class="row">
            <div class="col-11 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-1 mb-3 mt-5"
                    onclick='window.location.href="getlocation.php"'>
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

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="font-size: 22px">Slno......</th>
                                            <th style="font-size: 22px">Artwork image</th>
                                            <th style="font-size: 22px">Customer name</th>

                                            <th style="font-size: 22px">View more</th>
                                        </tr>

                                    </thead>
                                    <tbody id="locdiv">
                                        <?php
                                        $i = 1;
                                        while ($display = mysqli_fetch_array(result: $row)) {
                                            ?>
                                            <tr>
                                                <th><?php echo $i++; ?></th>

                                                <th><img src="../upload/<?php echo $display['image']; ?>"
                                                        style="width:200px;height:200px;"></th>
                                                <th><?php echo $display['Customername']; ?></th>
                                                <th><a href="viewmore.php?rid=<?php echo $display['request_id']; ?>">View
                                                        more</a></th>
                                            </tr>
                                            <?php
                                        }
                                        ?>



                                    </tbody>
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
                url: "getrequest.php",
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