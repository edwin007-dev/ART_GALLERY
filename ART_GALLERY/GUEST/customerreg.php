<?php
include_once ('header.php');
include_once("../dboperation.php");
$obj=new dboperation();  
?>
<div class="site-section bg-light" id="contact-section">

      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="">
            <div class="block-heading-1">
            
              <h2>CUSTOMER REGISTRATION</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 mb-5" data-aos="fade-up" data-aos-delay="100">
            <form action=customerregaction.php method="post" enctype="multipart/form-data"> 

            <div class="form-group row">
            <div class="col-md-12 mb-4 mb-lg-0">
                  <label>customer Name</label>
                  <input type="text" class="form-control" placeholder="Customer Name"name="customername">
                </div>
                </div>
                <div class="form-group row">
                <div class="col-md-12 mb-4 mb-lg-0">
                  <label>House Name</label>
                  <input type="text" class="form-control" placeholder="House Name"name="housename">
                </div>
</div>

                <div class="form-group row">
                <div class="col-md-12 mb-4 mb-lg-0">
                  <label>Land Mark</label>
                  <input type="text" class="form-control" placeholder="Land mark"name="landmark">
                </div>
              </div>

                <div class="form-group row">
                
                <div class="col-md-12 mb-4 mb-lg-0">
                <label>District</label>
                <select class="form-control" name="d_id" id="district">
                                                <option value="" selected disabled>-------select district------</option>
                                                <?php
                                                $sql = "select * from tbl_district";
                                                $res = $obj->executequery($sql);
                                                while (($dis = mysqli_fetch_array($res))) {
                                                    ?>
                                                    <option value="<?php echo $dis['district_id']; ?>">
                                                    <?php echo $dis['district_name']; ?>
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                    </div>
                  </div>

                  <div class="form-group row">
                
                <div class="col-md-12 mb-4 mb-lg-0">
                  <label>Location</label>
                  <select class="form-control" name="l_id" id="location">
                                                <option value="" selected disabled>-------select location------</option>
                                               
                                            </select>
                    </div>
                  </div>
                  
                  

                  <div class="form-group row">
                
                <div class="col-md-12 mb-4 mb-lg-0">
                  <label>Pincode</label>
                  <input type="text" class="form-control" placeholder="Pincode" name="pincode" required>
                </div>
              </div>

              <div class="form-group row">
                
                <div class="col-md-12 mb-4 mb-lg-0">
                  <label>Email</label>
                  <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>
              </div>

              
              <div class="form-group row">
                
                <div class="col-md-12 mb-4 mb-lg-0">
                  <label>Phone</label>
                  <input type="text" class="form-control" placeholder="Phone" name="phone" required>
                </div>
              </div>

              
              <div class="form-group row">
                
                <div class="col-md-12 mb-4 mb-lg-0">
                  <label>Image</label>
                  <input type="file" class="form-control" placeholder="Image" name="image" required>
                </div>
              </div>

              <div class="form-group row">
                
                <div class="col-md-12 mb-4 mb-lg-0">
                  <label>Username</label>
                  <input type="text" class="form-control" placeholder="Username" name="username" required>
                </div>
              </div>

              <div class="form-group row">
                
                <div class="col-md-12 mb-4 mb-lg-0">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="password" name="password" required>
                </div>
              </div>

              <div class="form-group row">
                
                <div class="col-md-12 mb-4 mb-lg-0">
                  <label>Regdate</label>
                  <input type="text" class="form-control" value= <?php echo date('Y-m-d'); ?> readonly placeholder="Regdate" name="regdate" required>
                </div>
          
              </div>

              <div class="form-group row">
                <div class="col-md-6 ml-auto">
                  <button type="submit" class="btn btn-primary " name="Submit">Submit</button> 
                </div>
              </div>
            </form>
            </table>
          </div>
          <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black">Need to know more on details. Get In Touch</h2>
            <p>An online platform where artists can showcase their work and users can browse, admire, and purchase art pieces. It offers a seamless experience with features like artist profiles, secure payment processing, and a responsive design for accessibility across devices.</p>
            <p><a href="#" class="btn btn-primary text-white">Get Started</a></p>
          </div>
        </div>
      </div>
    </div>

    
    <?php
include_once ('footer.php');
?>

    <script src="../jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {

            //alert("hai");
            $("#district").change(function () {
                var did = $(this).val();//1

                $.ajax({
                    type: "POST",
                    url: "getlocation.php",
                    data: "districtid=" + did,

                    success: function (data) {
                        //alert(did);
                        $("#location").html(data);
                    }
                });
            });
        });
    </script>