<?php
include_once("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
$sqlquery = "select * from tbl_category";
$row = $obj->executequery($sqlquery);
?>
<!-- dashboard inner -->


<div class="midde_cont">
    <div class="container-fluid">
        <div class="row">
            <div class="col-11 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-1 mb-3 mt-5"
                    onclick='window.location.href="category.php"'>Add
                    New <i class='fa fa-plus'></i></button>
            </div>
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Category Details</h2>
                        </div>
                    </div>
                    <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm">

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="font-size: 22px">Slno</th>
                                            <th style="font-size: 22px">Category name</th>
                                            <th style="font-size: 22px">Image</th>
                                            <th style="font-size: 22px">Edit</th>
                                            <th style="font-size: 22px">Delete</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        while ($display = mysqli_fetch_array($row)) {
                                            ?>
                                            <tr>
                                                <th><?php echo $i++; ?></th>
                                                <th><?php echo $display['Category_name']; ?></th>
                                                <th><img src="../upload/<?php echo $display['Image']; ?>"
                                                        style="width:200px;height:200px;"></th>
                                                <th><a
                                                        href="categoryedit.php?cid=<?php echo $display['Category_id']; ?>">Edit</a>
                                                </th>
                                                <th><a
                                                        href="categorydelete.php?cid=<?php echo $display['Category_id']; ?>">Delete</a>
                                                </th>
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



    <?php
    include_once('footer.php');
    ?>