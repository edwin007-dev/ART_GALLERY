<?php
session_start();
include_once("../dboperation.php");
$obj=new dboperation();
if(isset($_POST['Submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

 $query="select * from tbl_adminlogin where Username='$username' and Password='$password' ";
$res=$obj->executequery($query);
if(mysqli_num_rows($res) == 1)
{
    $_SESSION['loginid']="Admin";
        header('location:../ADMIN/index.php');
    
}
else
{

    $query="select * from tbl_user where Username='$username' and Password='$password'";
    $res=$obj->executequery($query);
    if(mysqli_num_rows($res) == 1)
    {
        $row=mysqli_fetch_array($res);
            $_SESSION['uid']=$row['Userid'];
            header('location:../USER/index.php');
        }
    }

   echo "<script> alert('Invalid username or password!!');window.location='index.php'</script>";
}
?>
?>