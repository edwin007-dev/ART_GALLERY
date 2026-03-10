<?php
include_once("../dboperation.php");
$obj = new dboperation();
if (isset($_POST['Submit'])) {
    $districtid = $_POST["d_id"];
    $name = $_POST["location_name"];

    echo $sql = "select * from tbl_location where location_name='$name' and district_id='$districtid'  ";
    $res = $obj->executequery($sql);
    if (mysqli_num_rows($res) > 0) {
        echo "<script>alert('Already Exists');wwindow.location='category.php';</script>";
    } else {

        $sqlquery = "insert into tbl_location(district_id,location_name)values('$districtid','$name')";
        $result = $obj->executequery($sqlquery);

        if ($result == 1) {
            echo "<script>alert('Location Details Inserted Successfully');window.location='Location.php';</script>";
        } else {
            echo "<script>alert('Location Details Inserted Failed');window.location='Location.php';</script>";
        }

    }
}
?>