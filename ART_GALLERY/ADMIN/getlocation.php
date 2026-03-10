<?php
require_once("../dboperation.php");
 $obj=new dboperation ();
 $districtid=$_POST["district_id"];
 $sqlquery="select l.*,d.* from tbl_district d inner join tbl_location l on d.district_id=l.district_id where l.district_id=$districtid";
$result=$obj->executequery($sqlquery);
?>

                                    <?php
                                    $i=1;
                                    while($display=mysqli_fetch_array($result))
                                    {
                                        ?>
                                    <tr>
                                        <th><?php echo $i++;?></th>
                                         <th><?php echo $display['location_name'];?></th>
                                         <th><?php echo $display['district_name'];?></th>
                                         <th><a href="locationedit.php?lid=<?php echo $display['location_id'];?>">Edit</a></th>
                                         <th><a href="locationdelete.php?lid=<?php echo $display['location_id'];?>">Delete</a></th>
                                    </tr>
<?php
}
?>

