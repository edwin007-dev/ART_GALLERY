<?php
include_once("../dboperation.php");
$obj=new dboperation();
if(isset($_GET["lid"]))
{
    $l_id=$_GET["lid"];
    $sqlquery="delete from tbl_location where Location_id=$l_id";
    $result=$obj->executequery($sqlquery);
    if($result==1)
    {
        echo "<script>alert('Location details deleted sucessfully!!');window.location='viewlocation.php'</script>";
    }
    else{
        echo "<script>alert('Deletion failed!!')</script>";
    }
}
?>