<?php
include_once('header.php');
include_once("../dboperation.php");
$obj = new dboperation();

$id = $_POST['aid'];
$txtart = $_POST['txtart'];
$txtdes = $_POST['txtdes'];
$txtrate = $_POST['txtrate'];



$image = $_FILES["txtimage"]["name"];

if ($image != "") {
    move_uploaded_file($_FILES['txtimage']['tmp_name'], '../upload/' . $image);
    echo $sqlquery = "UPDATE tbl_artwork SET art_name = '$txtart',description='$txtdes',rate='$txtrate' image='$image' WHERE art_id ='$id'";
    $result = $obj->executequery($sqlquery);

} else {
    echo $sqlquery = "UPDATE tbl_artwork SET art_name = '$txtart',description='$txtdes',rate='$txtrate' WHERE art_id ='$id'";
    $result = $obj->executequery($sqlquery);

}




if ($result == 1) {
    echo "<script>alert('updated Successfully');window.location='viewartwork.php';</script>";
} else {
    echo "<script>alert('updation Failed');window.location='viewartwork.php';</script>";
}
?>