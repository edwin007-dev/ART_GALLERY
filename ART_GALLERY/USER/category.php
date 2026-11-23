<?php
include_once ('header.php');
include_once("../dboperation.php");
$obj=new dboperation();

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
								<h1 class="mb-10">Search Category</h1>
								
                            </div>
						</div>
					</div>					
					<div class="row">
<?php
            $obj = new dboperation();
            $sqlquery = "select * from tbl_category";
            $result = $obj->executequery($sqlquery);
            while ($display = mysqli_fetch_array($result)) {
                $image = $display['Image'];
                $imgSrc = "../upload/" . $image;
                if (!file_exists($imgSrc) && file_exists("../GUEST/images/ART_IMAGES/" . $image)) {
                    $imgSrc = "../GUEST/images/ART_IMAGES/" . $image;
                } elseif (!file_exists($imgSrc) && file_exists("../GUEST/images/ART_IMAGES/" . $display['Category_name'] . ".jpg")) {
                    $imgSrc = "../GUEST/images/ART_IMAGES/" . $display['Category_name'] . ".jpg";
                }
?>
                                  
						<div class="col-lg-3 col-md-6 single-blog mb-4">
                        <a href="artwork.php?category_id=<?php echo $display['Category_id']; ?>"><div class="thumb" style="overflow: hidden; border-radius: 5px;">
								<img class="img-fluid" src="<?php echo $imgSrc; ?>" alt="<?php echo htmlspecialchars($display['Category_name']); ?>" style="height:250px; width:100%; object-fit:cover;"> 					
							</div>
							<p class="date"></p>
							<h4><?php echo $display['Category_name']; ?></h4></a>						
						</div>	
                        <?php
            }
            ?>
                        
                        
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