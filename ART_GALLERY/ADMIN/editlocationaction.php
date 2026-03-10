<?php
include_once('header.php');
include_once("../dboperation.php");
$obj = new dboperation();

$id = $_POST['location_id'];
$location = $_POST['txtlocation'];
echo $sqlquery = "UPDATE tbl_location SET location_name = '$location' WHERE location_id ='$id'";
$result = $obj->executequery($sqlquery);
if ($result == 1) {
    echo "<script>alert('Location updated Successfully');window.location='Location.php'</script>";
} else {
    echo "<script>alert('Location updated
     Failed');window.location='Location.php'</script>";
}
?>