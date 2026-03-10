<?php
include_once ('header.php');
include_once("../dboperation.php");
$obj=new dboperation();  
?>
<div class="main-content container-fluid">
    <div class="col-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary mr-1 mb-3" onclick='window.location.href="viewlocation.php"'>View Location </button>
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
                            <form method="POST" action="locationaction.php" class="form">
                                <div class="row">
                                
                                    <div class="form-group row">
                                        <label for="first-name-column">District Name</label>
                                        <div class="col-md-9 col-12">
                                            <select class="form-control" name="d_id" required>
                                                <option value="" selected disabled>-------select district------</option>
                                                <?php
                                                $sql = "select * from tbl_district";
                                                $res = $obj->executequery($sql);
                                                while (($dis = mysqli_fetch_array($res))) {
                                                    ?>
                                                    <option value="<?php echo $dis['district_id']; ?>">
                                                    <?php echo $dis['district_name']; ?>
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">

                                    
                                     
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Location Name</label>
                                            <input type="text" id="last-name-column" class="form-control"
                                                placeholder="location Name" name="location_name" required>
                                        </div>
                                    </div>
                                     
                                         

                                    <div class="col-12 d-flex justify-content-end mt-5">
                                        <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
                        
                                            </div>
                                            </div>                                           
<?php
include_once ('footer.php');
?>