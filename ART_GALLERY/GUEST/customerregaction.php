<?php
include_once("../dboperation.php");
$obj=new dboperation();
if(isset($_POST['Submit']))
{
    $cname=$_POST["customername"];
    $hname=$_POST["housename"];
    $lmark=$_POST["landmark"];
    $location=$_POST["l_id"];
    $pcode=$_POST["pincode"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $image=$_FILES["image"]["name"];
    move_uploaded_file($_FILES['image']['tmp_name'],'../upload/'.$image);
    $uname=$_POST["username"];
    $pword=$_POST["password"];
    $rdate=$_POST["regdate"];
    echo $sqlquery="insert into tbl_user(Customername,Housename,Landmark,Location_id,Pincode,Email ,Phone,UserImage,Username,Password,Regdate)values('$cname','$hname','$lmark','$location','$pcode','$email','$phone','$image', '$uname','$pword','$rdate')";
    $result=$obj->executequery($sqlquery);
    if($result==1)
    {
         echo "<script>alert('Customer Details Inserted Successfully');window.location='login.php'</script>";


         $bodyContent="Dear $cname, your request for the specified artwork is confirmed successfully. The artwork is requested for $rdate and we look forward to do more buisiness with you. Thank you for your cooperation.";
         $mailtoaddress=$email;
         require('../phpmailer.php');

         
    }
    else
     {
         echo "<script>alert('Customer Details Insertion Failed');window.location='customerreg.php'</script>";
     }
}
?>