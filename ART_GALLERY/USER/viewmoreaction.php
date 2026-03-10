<?php
session_start();
include_once("../dboperation.php");
$obj=new dboperation();
if(isset($_POST['submit']))
{
    $artid=$_POST['artid'];
    $quantity=$_POST['quantity'];
    $rdate=date('y-m-d');
    $uid= $_SESSION['uid'];
    $requireddate=$_POST['date'];
    $totalamount=$_POST['amount'];
 
 
  

  echo $sqlquery="insert into tbl_request(art_id,quantity,request_date,customer_id,delivery_date,totalamount,status)values($artid,'$quantity','$rdate','$uid','$requireddate','$totalamount','Requested')";
    $result=$obj->executequery($sqlquery);
    if($result==1)
    {
          echo "<script>alert('Request send Successfully');window.location='category.php'</script>";
    }
    else
     {
         echo "<script>alert('Failed');window.location='category.php'</script>";
     }
}
?>