<?php include_once('header.php');
include_once("../dboperation.php");
$obj = new dboperation();
$id = $_GET['cid'];
$sqlquery = "SELECT * FROM tbl_category WHERE category_id = '$id'";
$result = $obj->executequery($sqlquery);
$display = mysqli_fetch_array($result);
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-6 grid-margin stretch-card">
                <div class="card" style="    margin-left: 258px;">
                    <div class="card-body">
                        <h4 class="card-title">Category Registration</h4>
                        <div class="d-flex justify-content-end">

                        </div>
                        <form action="categoryeditaction.php" method='POST' enctype="multipart/form-data">
                            <fieldset>
      
                                <div class="field">
                                    <label class="label_field">Location Name</label>
                                    <input type="text" name="txtcategory" class="form-control"
                                        value="<?php echo $display['Category_name']; ?>">
                                </div>


                                <div class="field">
                                    <label class="label_field">Image</label>


                                    <img src="../upload/<?php echo $display['Image']; ?>"
                                        style="width:100px; height:100px;">
                                    <input type="file" name="txtimage" class="form-control">
                                </div>



                                <div class="field margin_0 ml-5">
                                    <input type="hidden" name="cid" value="<?php echo $id; ?>">
                                    <button class="btn btn-success" type='submit' name="btn-submit">Submit</button>
                                    <button class="btn btn-link" type='reset'>Cancel</button>
                                </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
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