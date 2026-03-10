<?php
include_once('header.php');
include_once("../dboperation.php");
$obj = new dboperation();


$aid = $_GET['aid'];
$sqlquery = "SELECT * FROM tbl_artwork a INNER join tbl_category c on c.Category_id=a.category_id WHERE art_id = '$aid'";
$result = $obj->executequery($sqlquery);
$display = mysqli_fetch_array($result);
?>
<div class="main-content container-fluid">
    <div class="col-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary mr-1 mb-3" onclick='window.location.href="viewartwork.php"'>View
            Data </button>

    </div>

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Art Edit Form</h4>

                    </div>


                    <div class="card-content">
                        <div class="card-body">
                            <form action="arteditaction.php" method='POST' enctype="multipart/form-data">
                                <fieldset>
                                    <div class="field">
                                        <label class="label_field">Art Name</label>
                                        <input type="text" name="txtart" class="form-control"
                                            value="<?php echo $display['art_name']; ?>" >
                                    </div>

                                    <div class="field">
                                        <label class="label_field">Location Name</label>
                                        <input type="text" name="txtcategory" class="form-control"
                                            value="<?php echo $display['Category_name']; ?>" readonly>
                                    </div>
                                    <div class="field">
                                        <label class="label_field">Location Name</label>
                                        <input type="text" name="txtdes" class="form-control"
                                            value="<?php echo $display['description']; ?>">
                                    </div>

                                    <div class="field">
                                        <label class="label_field">Location Name</label>
                                        <input type="text" name="txtrate" class="form-control"
                                            value="<?php echo $display['rate']; ?>">
                                    </div>

                                    <div class="field">
                                        <label class="label_field">Image</label>


                                        <img src="../upload/<?php echo $display['image']; ?>"
                                            style="width:100px; height:100px;">
                                        <input type="file" name="txtimage" class="form-control">
                                    </div>



                                    <div class="field margin_0 ml-5">
                                        <input type="hidden" name="aid" value="<?php echo $aid; ?>">
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
    </section>

</div>
    <?php
    include_once('footer.php');
    ?>