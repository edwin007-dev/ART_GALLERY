<?php
include_once("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
$sqlquery = $sqlquery = "select d.,l. from tbl_district d inner join tbl_location l on l.District_id=d.District_id";
$result = $obj->executequery($sqlquery);
?>
<!-- dashboard inner -->


<div class="midde_cont">
    <div class="container-fluid">
        <div class="row">
            <div class="col-11 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-1 mb-3 mt-5"
                    onclick='window.location.href="Location.php"'>Add
                    New <i class='fa fa-plus'></i></button>
            </div>
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Location Details</h2>
                        </div>
                    </div>
                    <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm">
                            <select class="form-control form-control-sm" name="ddldistrict" id="ddldistrict">
                                <option value="0">--SELECT DISTRICT--</option>
                                <?php
                                $obj = new dboperation();
                                $sqlquery = "select * from tbl_district";
                                $result = $obj->executequery($sqlquery);
                                while ($display = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?php echo $display["district_id"]; ?>">
                                        <?php echo $display["district_name"]; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="font-size: 22px">Slno</th>
                                            <th style="font-size: 22px">Location</th>
                                            <th style="font-size: 22px">District</th>
                                            <th style="font-size: 22px">Edit</th>
                                            <th style="font-size: 22px">Delete</th>
                                        </tr>

                                    </thead>
                                    <tbody id="locdiv">


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php
    include_once('footer.php');
    ?>
    <script src="../jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {


            $("#ddldistrict").change(function () {
                var did = $(this).val();

                $.ajax({
                    type: "POST",
                    url: "getlocation.php",
                    data: "district_id=" + did,

                    success: function (data) {
                        //alert(did);
                        $("#locdiv").html(data);
                    }
                });
            });
        });
    </script>