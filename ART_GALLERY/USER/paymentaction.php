<?php
include_once("../dboperation.php");
$obj=new dboperation();
if(isset($_POST['Submit']))
{
    $requestid=$_POST["requestid"];
    $paymentdate=date('Y-m-d');
    $amount=$_POST['amount'];
    $initalamount=intval($amount)/2;
    $balanceamount=$amount-$initalamount;
   $sqlquery="insert into tbl_payment(requestid,initialamount,balanceamount,paymentdate,status)values('$requestid','$initalamount','$balanceamount','$paymentdate','Paid')";
    $result=$obj->executequery($sqlquery);
    if($result==1)
    {
       $sql="update tbl_request set status='paid' where request_id=$requestid";
        $result=$obj->executequery($sql);
        echo "<script>alert('Payment Details Inserted Successfully');window.location='confirmation.php'</script>";
    }
    else
     {
        echo "<script>alert('Payment Details Inserted Failed');window.location='confirmation.php'</script>";
     }
}
?>
