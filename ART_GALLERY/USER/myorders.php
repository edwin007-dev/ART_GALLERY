<?php 
// session_start();
include_once ('header.php');
include_once("../dboperation.php");
$obj=new dboperation();
$uid=$_SESSION['uid'];
?>

<!-- start banner Area -->
			<section class="banner-area relative" id="home" style="height:100px;">
				<div class="overlay overlay-bg"></div>	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-center">
																
					</div>
				</div>					
			</section>
			<!-- End banner Area -->	
					
			<!-- Start blog Area -->
			<section class="blog-area section-gap" id="blog">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Confirmation Details </h1>
								
                            </div>
						</div>
					</div>					
					<div class="row">
					<div class="col-12">
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
			$sqlquery = "select * from tbl_request r inner join tbl_payment p on p.requestid=r.request_id inner join tbl_artwork a on r.art_id=a.art_id inner join tbl_user u on r.customer_id= u.Userid where u.Userid='$uid' and r.status = 'Paid' and r.delivery_date>='$date'";
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
			</section>
			<!-- End blog Area -->

			<!-- Start gallery Area -->
			<section class="gallery-area section-gap" id="gallery">
				
			</section>
			<!-- End gallery Area -->
			
<?php
include_once ('footer.php');
?>