<?php
include_once('header.php');
include_once("../dboperation.php");
$obj = new dboperation();

$id = $_POST['location_id'];
$location = $_POST['txtlocation'];
echo $sqlquery = "UPDATE tbl_location SET location_name = '$location' WHERE location_id ='$id'";
$result = $obj->executequery($sqlquery);
if ($result == 1) {
  echo "<script>alert('Location updated Successfully')</script>";
} else {
  echo "<script>alert('Location updation Failed')</script>";
}
?>