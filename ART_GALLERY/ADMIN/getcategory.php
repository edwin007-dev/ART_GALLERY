<?php
require_once("../dboperation.php");
$obj = new dboperation();
$category_id = $_POST["category_id"];
echo $sqlquery = "SELECT * FROM tbl_artwork a INNER join tbl_category c on c.Category_id=a.category_id WHERE a.category_id='$category_id'";
$result = $obj->executequery($sqlquery);
?>

<?php
$i = 1;
while ($display = mysqli_fetch_array($result)) {
    ?>
    <tr>
        <th><?php echo $i++; ?></th>
        <th><?php echo $display['art_name']; ?></th>
        <th><?php echo $display['description']; ?></th>
        <th><?php echo $display['rate']; ?></th>
        <th><img src='../upload/<?php echo $display['image']; ?>' width="80" height="80"></th>
        <th><a href="artedit.php?aid=<?php echo $display['art_id']; ?>">Edit</a></th>
        <th><a href="artdelete.php?aid=<?php echo $display['art_id']; ?>">Delete</a></th>
    </tr>
    <?php
}
?>