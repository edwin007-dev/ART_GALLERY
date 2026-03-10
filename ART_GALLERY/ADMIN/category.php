<?php
include_once("header.php");
?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-6 grid-margin stretch-card">
                <div class="card" style="    margin-left: 258px;">
                    <div class="card-body">
                        <h4 class="card-title">Category Registration</h4>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary btn-rounded mr-2"
                                onclick='window.location.href="viewcategory.php" '>VIEW</button>
                        </div>
                        <form class="forms-sample" action="categoryaction.php" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputName1">CategoryName</label>
                                <input type="text" class="form-control" name="txtcategoryname" placeholder="Name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3"> image</label>
                                <input type="file" class="form-control" name="txtimage" placeholder="image" required>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2" name="Submit">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
    <?php
    include_once("footer.php");
    ?>