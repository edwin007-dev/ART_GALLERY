<?php
include_once("../dboperation.php");
$obj = new dboperation();
if (isset($_GET["cid"])) {
    $c_id = $_GET["cid"];
    $sqlquery = "delete from tbl_category where category_id=$c_id";
    $result = $obj->executequery($sqlquery);
    if ($result == 1) {
        echo "<script>alert('deleted sucessfully!!');window.location='viewcategory.php'</script>";
    } else {
        echo "<script>alert('Deletion failed!!');window.location='viewcategory.php</script>";
    }
}
?>