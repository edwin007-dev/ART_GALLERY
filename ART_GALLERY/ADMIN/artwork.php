<?php
include_once("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-6 grid-margin stretch-card">
                <div class="card" style="    margin-left: 258px;">
                    <div class="card-body">
                        <h4 class="card-title">Artwork Registration</h4>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary btn-rounded mr-2"
                                onclick='window.location.href="viewartwork.php" '>VIEW</button>
                        </div>
                        <form class="forms-sample" action="artworkaction.php" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputName1"> Work Name</label>
                                <input type="text" class="form-control" name="txtworkname" placeholder=" work Name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Image</label>
                                <input type="file" class="form-control" name="txtimage" placeholder="image" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Description</label>
                                <textarea class="form-control" name="description" rows="4" required></textarea>


                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">Amount</label>
                                <input type="text" class="form-control" name=" Amount" placeholder="Amount" required>

                                <div class="form-group">
                                    <label for="exampleInputName2">Category</label>

                                    <div class="form-group row">

                                        <select class="form-control" name="category_id">
                                            <option value="" selected disabled>-------select category------</option>
                                            <?php
                                            echo $sql = "select * from tbl_category";
                                            $res = $obj->executequery($sql);
                                            while (($dis = mysqli_fetch_array($res))) {
                                                ?>
                                                <option value="<?php echo $dis['Category_id']; ?>">
                                                    <?php echo $dis['Category_name']; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once("footer.php");
    ?>