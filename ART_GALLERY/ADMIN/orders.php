<?php
include_once ("header.php");
require_once ("../dboperation.php");
$obj = new dboperation();
//   $sqlquery = $sqlquery = "select d.,l. from tbl_district d inner join tbl_location l on l.District_id=d.District_id";
// $result = $obj->executequery($sqlquery);
?>
<!-- dashboard inner -->     


<div class="midde_cont">
    <div class="container-fluid">
        <div class="row">
            <div class="col-11 d-flex justify-content-end">
                
            </div>
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Order Details</h2>
                        </div>
                    </div>
                    <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm">
                          
                            <div class="table-responsive" >
                            <table class ="table table-striped">
						<thead>
						<tr><th>Customer Name</th>
						<th>Art Name</th>
						<th>Delivery Date</th>
						<th>Quantity</th>
						<th>Total Amount</th>
                        <th>Initial Amount</th>
                        <th>Balance Amount</th>
						<th>Status</th>
						</tr>

<?php
            $obj = new dboperation();
            $date=date('Y-m-d');
			$sqlquery = "select * from tbl_request r inner join tbl_payment p on p.requestid=r.request_id inner join tbl_artwork a on r.art_id=a.art_id inner join tbl_user u on r.customer_id= u.Userid where  r.status = 'Paid' and r.delivery_date>='$date'";
            $result = $obj->executequery($sqlquery);
            while ($display = mysqli_fetch_array($result)) {
				$status=$display['status'];          

?>
					
							<tr>
								
								<td><?php echo $display['Customername']; ?></td>
								
								<td><?php echo $display['art_name']; ?></td>
								<td><?php echo $display['delivery_date']; ?></td>
								<td><?php echo $display['quantity']; ?></td>
								<td><?php echo $display['totalamount']; ?></td>
                                <td><?php echo $display['initialamount']; ?></td>
                                <td><?php echo $display['balanceamount']; ?></td>
								<td><?php echo $display['status']; ?></td>
								
							</tr>		
			
                        <?php
            }
            ?>
			</thead>
			</table>				
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php
    include_once ('footer.php');
    ?>
   