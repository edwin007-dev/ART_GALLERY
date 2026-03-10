<?php
include_once ("header.php");
require_once ("../dboperation.php");

$obj = new dboperation();
$rid = $_GET["rid"];

$sqlquery = "select * from tbl_request r
inner join tbl_artwork a on r.art_id=a.art_id
inner join tbl_category c on c.Category_id=a.Category_id
inner join tbl_user u on r.customer_id=u.Userid
where r.request_id=$rid";

$row = $obj->executequery($sqlquery);
?>

<!DOCTYPE html>
<html>
<head>

<title>Artwork Request Details</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

<style>

body{
background:#eef5fb;
font-family:Segoe UI, Arial;
}

.navbar-top{
background:#fff;
height:70px;
box-shadow:0 4px 10px rgba(0,0,0,0.08);
display:flex;
align-items:center;
justify-content:space-between;
padding:0 40px;
}

.title h1{
font-size:24px;
font-weight:600;
color:#333;
}

.navbar-top ul{
list-style:none;
display:flex;
gap:20px;
}

.navbar-top ul li a{
color:#444;
font-size:20px;
}

.icon-count{
background:red;
color:#fff;
padding:2px 6px;
border-radius:6px;
font-size:10px;
position:absolute;
margin-left:-10px;
}

.sidenav{
position:fixed;
left:0;
top:70px;
width:240px;
height:100%;
background:#fff;
box-shadow:2px 0 8px rgba(0,0,0,0.05);
padding-top:20px;
}

.profile{
text-align:center;
margin-bottom:20px;
}

.profile img{
border-radius:50%;
box-shadow:0 3px 10px rgba(0,0,0,0.2);
}

.name{
font-weight:bold;
margin-top:10px;
}

.job{
color:#777;
font-size:14px;
}

.sidenav-url a{
display:block;
padding:12px 20px;
text-decoration:none;
color:#555;
font-size:15px;
}

.sidenav-url a:hover{
background:#eef5fb;
}

.main{
margin-left:270px;
margin-top:40px;
width:70%;
}

.section-title{
font-size:22px;
margin-bottom:10px;
font-weight:600;
color:#333;
}

.card{
background:#fff;
border-radius:12px;
padding:25px;
box-shadow:0 5px 15px rgba(0,0,0,0.08);
margin-bottom:25px;
}

.details-table{
width:100%;
font-size:15px;
}

.details-table td{
padding:10px;
}

.details-table td:first-child{
font-weight:600;
color:#555;
width:160px;
}

.art-image{
width:260px;
height:260px;
object-fit:cover;
border-radius:10px;
box-shadow:0 5px 15px rgba(0,0,0,0.15);
}

.row{
display:flex;
gap:40px;
align-items:center;
}

.action-buttons{
margin-top:20px;
}

button{
padding:12px 25px;
border:none;
border-radius:6px;
font-size:15px;
cursor:pointer;
}

.btn-accept{
background:#28a745;
color:#fff;
}

.btn-reject{
background:#dc3545;
color:#fff;
}

button:hover{
opacity:0.9;
}

</style>

</head>

<body>


<div class="navbar-top">

<div class="title">
<h1>View Artwork Request</h1>
</div>

<ul>
<li>
<a href="#"><span class="icon-count">29</span><i class="fa fa-envelope"></i></a>
</li>

<li>
<a href="#"><span class="icon-count">59</span><i class="fa fa-bell"></i></a>
</li>

<li>
<a href="#"><i class="fa fa-sign-out-alt"></i></a>
</li>
</ul>

</div>



<div class="sidenav">

<div class="profile">
<img src="https://imdezcode.files.wordpress.com/2020/02/imdezcode-logo.png" width="90">
<div class="name">Admin Panel</div>
<div class="job">Art Gallery</div>
</div>

<div class="sidenav-url">
<a href="#" class="active">Request Details</a>
<a href="#">Settings</a>
</div>

</div>



<form method="POST" action="acceptreject.php">

<?php
while ($display = mysqli_fetch_array($row)) {
?>

<div class="main">

<div class="section-title">Artwork Details</div>

<div class="card">

<div class="row">

<div>

<table class="details-table">

<tr>
<td>Art Name</td>
<td><?php echo $display['art_name']; ?></td>
</tr>

<tr>
<td>Rate</td>
<td>₹ <?php echo $display['rate']; ?></td>
</tr>

<tr>
<td>Category</td>
<td><?php echo $display['Category_name']; ?></td>
</tr>

<tr>
<td>Description</td>
<td><?php echo $display['description']; ?></td>
</tr>

</table>

</div>

<div>
<img src="../upload/<?php echo $display['image']; ?>" class="art-image">
</div>

</div>

</div>



<div class="section-title">Customer Details</div>

<div class="card">

<table class="details-table">

<tr>
<td>Customer Name</td>
<td><?php echo $display['Customername']; ?></td>
</tr>

<tr>
<td>House Name</td>
<td><?php echo $display['Housename']; ?></td>
</tr>

<tr>
<td>Phone</td>
<td><?php echo $display['Phone']; ?></td>
</tr>

<tr>
<td>Landmark</td>
<td><?php echo $display['Landmark']; ?></td>
</tr>

<tr>
<td>Email</td>
<td><?php echo $display['Email']; ?></td>
</tr>

</table>

</div>



<div class="section-title">Request Details</div>

<div class="card">

<table class="details-table">

<tr>
<td>Quantity</td>
<td><?php echo $display['quantity']; ?></td>
</tr>

<tr>
<td>Delivery Date</td>
<td><?php echo $display['delivery_date']; ?></td>
</tr>

<tr>
<td>Total Amount</td>
<td><b>₹ <?php echo $display['quantity'] * $display['rate']; ?></b></td>
</tr>

</table>


<input type="hidden" name="requestid" value="<?php echo $rid; ?>">


<div class="action-buttons">

<button type="submit" name="accept" class="btn-accept">
<i class="fa fa-check"></i> Accept Request
</button>

<button type="submit" name="reject" class="btn-reject">
<i class="fa fa-times"></i> Reject Request
</button>

</div>

</div>

</div>

<?php
}
?>

</form>

</body>
</html>

<?php include_once("footer.php"); ?>