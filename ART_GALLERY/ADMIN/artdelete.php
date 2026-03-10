<?php
include_once("../dboperation.php");
$obj=new dboperation();
if(isset($_GET["aid"]))
{
    $aid=$_GET["aid"];
    $sqlquery="delete from tbl_artwork where art_id=$aid";
    $result=$obj->executequery($sqlquery);
    if($result==1)
    {
        echo "<script>alert('art details deleted sucessfully!!');window.location='viewartwork.php'</script>";
    }
    else{
        echo "<script>alert('Deletion failed!!')</script>";

        
    }
}
?>