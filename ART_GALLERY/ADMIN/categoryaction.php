<?php
include_once("../dboperation.php");
$obj = new dboperation();
if (isset($_POST['Submit'])) {
    $cname = $_POST['txtcategoryname'];
    $image = $_FILES["txtimage"]["name"];
    move_uploaded_file($_FILES['txtimage']['tmp_name'], '../upload/' . $image);
    $sql = "select * from tbl_category where Category_name='$cname'";
    $result = $obj->executequery($sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Already Exists');wwindow.location='category.php';</script>";
    } else {

        $sqlquery = "insert into tbl_category(Category_name,Image)values('$cname','$image')";

        $result = $obj->executequery($sqlquery);
        if ($result == 1) {
            echo "<script>alert('Category Details Inserted Successfully');window.location='category.php';</script>";
        } else {
            echo "<script>alert('Category Details Inserted Failed');window.location='category.php';</script>";
        }

    }
}
?>