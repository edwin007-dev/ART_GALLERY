<?php
require_once("../dboperation.php");
 $obj=new dboperation ();
 $districtid=$_POST["districtid"];//1
echo $sqlquery="select  * from tbl_location  where district_id=$districtid";
$result=$obj->executequery($sqlquery);
?>

<option>Select Location</option>

                                    <?php
                                  
                                    while($display=mysqli_fetch_array($result))
                                    {
                                        ?>
                                   <option value="<?php echo $display['location_id']; ?>">
                                                    <?php echo $display['location_name']; ?>
                                                </option>
<?php
}
?>

