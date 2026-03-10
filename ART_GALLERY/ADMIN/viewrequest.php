<?php
include_once("header.php");
require_once("../dboperation.php");

$obj = new dboperation();

$sqlquery = "select * from tbl_request r 
INNER JOIN tbl_artwork a on a.art_id=r.art_id 
INNER JOIN tbl_user u on u.Userid=r.customer_id 
where r.status='Requested'";

$row = $obj->executequery($sqlquery);
?>

<div class="midde_cont">
<div class="container-fluid">

<div class="row">

<div class="col-11 d-flex justify-content-end">
<button type="button" class="btn btn-primary mr-1 mb-3 mt-5"
onclick='window.location.href="getlocation.php"'>
Back
</button>
</div>

<div class="col-md-12">
<div class="white_shd full margin_bottom_30">

<div class="full graph_head">
<div class="heading1 margin_0">
<h2>Requested Details</h2>
</div>
</div>

<div class="table_section padding_infor_info">

<input type="date" id="date" class="form-control" style="width:300px;">

<div class="table-responsive">

<table class="table table-striped">

<thead>
<tr>
<th style="font-size:22px">Sl No</th>
<th style="font-size:22px">Artwork Image</th>
<th style="font-size:22px">Customer Name</th>
<th style="font-size:22px">View More</th>
</tr>
</thead>

<tbody id="locdiv">

<?php
$i = 1;

while ($display = mysqli_fetch_array($row)) {
?>

<tr>

<td><?php echo $i++; ?></td>

<td>
<img src="../upload/<?php echo $display['image']; ?>"
style="width:200px;height:200px;">
</td>

<td><?php echo $display['Customername']; ?></td>

<td>
<a href="viewmore.php?rid=<?php echo $display['request_id']; ?>">
View More
</a>
</td>

</tr>

<?php
}
?>

</tbody>
</table>

</div>
</div>
</div>
</div>
</div>
</div>
</div>

<script src="../jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){

$("#date").change(function(){

var did=$(this).val();

$.ajax({

type:"POST",
url:"getrequest.php",
data:"date="+did,

success:function(data){

$("#locdiv").html(data);

}

});

});

});
</script>

<?php
include_once('footer.php');
?>