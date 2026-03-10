<?php
include_once("../dboperation.php");
$obj=new dboperation();
if(isset($_POST['Submit']))
{
    $cname=$_POST['txtworkname'];
    $image=$_FILES["txtimage"]["name"];
    move_uploaded_file($_FILES['txtimage']['tmp_name'],'../upload/'.$image);
    $description=$_POST["description"];
    $amount=$_POST["Amount"];
    $category=$_POST["category_id"];
    $sqlquery="insert into tbl_artwork(art_name,image,description,rate,category_id)values('$cname','$image','$description','$amount','$category')";

    $result=$obj->executequery($sqlquery);
    if($result==1)
    {
        echo "<script>alert('Art work Details Inserted Successfully')</script>";
    }
    else
     {
        echo "<script>alert('Art work Details Inserted Failed')</script>";
     }
}
?>