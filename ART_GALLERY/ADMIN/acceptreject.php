<?php
include_once("../dboperation.php");
$obj=new dboperation();
if(isset($_POST['accept']))
{
    $requestid=$_POST["requestid"];
   
    $sqlquery="update tbl_request set status='Accepted' where request_id=$requestid";
    $result=$obj->executequery($sqlquery);
    if($result==1)
    {
        echo "<script>alert('Request sent Successfully');window.location='viewrequest.php'</script>";
    }
    
}
if(isset($_POST['reject']))
{
    $requestid=$_POST["requestid"];
    

    
    $sqlquery="update tbl_request set status='Rejected' where request_id=$requestid";
    $result=$obj->executequery($sqlquery);
    if($result==1)
    {
        echo "<script>alert('Status rejected');window.location='viewrequest.php'</script>";
    }
   
}
?>