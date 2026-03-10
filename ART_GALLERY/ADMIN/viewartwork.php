<?php
include_once("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
$sqlquery = $sqlquery = "SELECT * FROM tbl_artwork";
$result = $obj->executequery($sqlquery);
?>
<!-- dashboard inner -->


<div class="midde_cont">
    <div class="container-fluid">
        <div class="row">
            <div class="col-11 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-1 mb-3 mt-5"
                    onclick='window.location.href="artwork.php"'>Add
                    New <i class='fa fa-plus'></i></button>
            </div>
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Artwork Details</h2>
                        </div>
                    </div>
                    <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm">
                            <select class="form-control form-control-sm" name="ddlcategory" id="ddlcategory">
                                <option value="0">--SELECT ARTWORK--</option>
                                <?php
                                $obj = new dboperation();
                                $sqlquery = "select * from tbl_category";
                                $result = $obj->executequery($sqlquery);
                                while ($display = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?php echo $display["Category_id"]; ?>">
                                        <?php echo $display["Category_name"]; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Slno</th>
                                            <th>Art Name</th>
                                            <th>Description</th>
                                            <th>Rate</th>
                                            <th>Image</th>


                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>

                                    </thead>
                                    <tbody id="catdiv">


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


            $("#ddlcategory").change(function () {
                var cid = $(this).val();

                $.ajax({
                    type: "POST",
                    url: "getcategory.php",
                    data: "category_id=" + cid,

                    success: function (data) {
                        // alert(cid);
                        $("#catdiv").html(data);
                    }
                });
            });
        });
    </script>