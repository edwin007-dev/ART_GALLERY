<?php
require_once("../dboperation.php");

$obj = new dboperation();

$date = $_POST["date"];

// convert date to MySQL format if needed
$date = date("Y-m-d", strtotime($date));

$sqlsalary = "select * from tbl_request r 
inner join tbl_artwork a on r.art_id=a.art_id 
inner join tbl_user u on u.Userid=r.customer_id 
where r.request_date='$date' and r.status='Requested'";

$result = $obj->executequery($sqlsalary);

$i = 1;

while ($display = mysqli_fetch_array($result)) {
?>

<tr>

<td><?php echo $i++; ?></td>

<td>
<img src="../upload/<?php echo $display['image']; ?>" style="width:200px;height:200px;">
</td>

<td>
<?php echo $display["Customername"]; ?>
</td>

<td>
<a href="viewmore.php?rid=<?php echo $display['request_id']; ?>">View More</a>
</td>

</tr>

<?php
}
?>