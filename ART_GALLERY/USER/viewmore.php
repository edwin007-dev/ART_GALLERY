<?php
include_once ('header.php');
include_once ("../dboperation.php");
$artid = $_GET['artid'];
$obj = new dboperation();
$sqlquery = "select * from tbl_artwork where art_id= '$artid' ";
$result = $obj->executequery($sqlquery);
$display = mysqli_fetch_array($result);
?>
<style>

.info-thumb img {
    border-radius: 15px;
    transition: transform 0.3s;
}

.info-thumb img:hover {
    transform: scale(1.05);
}

.btn-dark {
    background-color: #343a40;
    border-color: #343a40;
}
</style>


</style>
<script>
function amountcalculation() {
    var rate = document.getElementById("rate").value;
    var quantity = document.getElementById("quantity").value;
    var amount = parseInt(rate) * parseInt(quantity);
    document.getElementById("amount").value = amount;
}
</script>

<section class="section-gap info-area" id="about">
  <div class="container">
    <form action="viewmoreaction.php" method="POST">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8 text-center">
          <h1 class="mb-10">Art Name: <?php echo $display['art_name']; ?></h1>
        </div>
      </div>
      <div class="single-info row mt-40">
        <div class="col-lg-6 col-md-12 text-center">
          <div class="info-thumb">
            <img src="../upload/<?php echo $display['image']; ?>" class="img-fluid rounded" alt="">
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="info-content">
            <h3 class="pb-30">Description:</h3>
            <p><?php echo $display['description']; ?></p>
            <h4>Rate: <span class="text-success"><?php echo $display['rate']; ?></span></h4>
            <div class="form-group">
              <label for="quantity">Quantity:</label>
              <input type="hidden" id="rate" value="<?php echo $display['rate']; ?>">
              <input type="number" name="quantity" id="quantity" min="1" onchange="amountcalculation()" class="form-control" value="1">
            </div>
            <div class="form-group">
              <label for="date">Date:</label>
              <input type="date" name="date" id="date" class="form-control">
            </div>
            <div class="form-group">
              <label for="amount">Total Amount:</label>
              <input type="text" id="amount" name="amount" value="<?php echo $display['rate']; ?>" class="form-control" readonly>
            </div>
            <input type="hidden" name="artid" value="<?php echo $display['art_id']; ?>">
            <button type="submit" name="submit" class="btn btn-dark btn-block">SEND REQUEST</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("date").setAttribute("min", today);
});
</script>

<?php
include_once ('footer.php');
?>
