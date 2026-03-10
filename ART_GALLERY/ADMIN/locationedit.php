<?php
include_once('header.php');
include_once("../dboperation.php");
$obj = new dboperation();


$id = $_GET['lid'];
$sqlquery = "SELECT * FROM tbl_location l INNER JOIN tbl_district d ON l.district_id = d.district_id WHERE l.location_id = '$id'";
$result = $obj->executequery($sqlquery);
$display = mysqli_fetch_array($result);
?>
<div class="main-content container-fluid">
    <div class="col-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary mr-1 mb-3" onclick='window.location.href="viewlocation.php"'>View
            Data </button>

    </div>

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Location Registeration Form</h4>

                    </div>


                    <div class="card-content">
                        <div class="card-body">
                            <form action="editlocationaction.php" method='POST'>
                                <fieldset>

                                    <div class="field">
                                        <label class="label_field">Location Name</label>
                                        <input type="text" name="txtlocation"class="form-control"
                                            value="<?php echo $display['location_name']; ?>" required>
                                    </div>


                                    <div class="field margin_0 ml-5">
                                        <input type="hidden" name="location_id" value="<?php echo $id; ?>">
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


    <?php
    include_once('footer.php');
    ?>