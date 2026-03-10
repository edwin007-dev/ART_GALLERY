<?php
include_once('header.php');
include_once("../dboperation.php");
$obj = new dboperation();

$sqlquery="select c.Name as Customer_name,Package_name,g.Name as Guide_name,
Amount from tblpayment p INNER join tblbookingrequest b on p.bookingrequest_id=b.Bookingrequest_id
INNER join tblcustomerreg c on c.Customer_id=b.Customer_id INNER join tblpackage k on k.Package_id=b.Package_id
INNER join tbltravelguidereg g on g.Travelguide_id=k.Travelguide_id ";
$result = $obj->executequery($sqlquery);
$i=1;

?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-9">

                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Payment details</h4>
            </div>
            <div class=" col-lg-3">
                <button type="button" class="btn btn-primary"
                    onclick="window.location.href='location.php'">Registration</button>
            </div>
            <div class="card-body">
                <label for="exampleInputName1">Select date: </label>
                <input type="date" name="date" id="date">
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">

                <div class="table-responsive " id="payment_id">


                <table class="table card-table">
                        <thead>
                            <tr>
                                <th>SI NO:</th>
                                <th>Customer Name</th>
                                <th>Package Name</th>
                                <th>Guide Name</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        <?php
                         while($display=mysqli_fetch_array($result))
                        {
                        ?>
                            <tr>   
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $display["Customer_name"];?></td>  
                                <td><?php echo $display["Package_name"];?></td>    
                                <td><?php echo $display["Guide_name"];?></td>
                                <td><?php echo $display["Amount"];?></td>
                               
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




<?php
include_once('footer.php');
?>
<script src="../jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function () {
        //alert("a");
        $("#date").change(function () {
            var date = $(this).val(); //departmentid
            $.ajax({
                type: "POST",
                url: "datewise.php",
                data: "date=" + date, //deptid =2
                success: function (data) {
                    $("#payment_id").html(data);
                }
            });
        });
    });
</script>