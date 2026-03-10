<?php
include_once('header.php');
include_once("../dboperation.php");
$obj = new dboperation();

$id = $_POST['cid'];
$txtcategory = $_POST['txtcategory'];

$image = $_FILES["txtimage"]["name"];

if ($image != "") {
    move_uploaded_file($_FILES['txtimage']['tmp_name'], '../upload/' . $image);
    echo $sqlquery = "UPDATE tbl_category SET category_name = '$txtcategory' , Image='$image' WHERE Category_id ='$id'";
    $result = $obj->executequery($sqlquery);

} else {
    $sqlquery = "UPDATE tbl_category SET category_name = '$txtcategory' WHERE Category_id ='$id'";
    $result = $obj->executequery($sqlquery);

}




if ($result == 1) {
    echo "<script>alert('category updated Successfully');window.location='viewcategory.php';</script>";
} else {
    echo "<script>alert('category updation Failed');window.location='viewcategory.php';</script>";
}
?>