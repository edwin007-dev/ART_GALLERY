
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
            
              <h2>CUSTOMER LOGIN</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 mb-5" data-aos="fade-up" data-aos-delay="100">
            <form action=loginaction.php method="post"> 

            <div class="form-group row">
            <div class="col-md-12 mb-4 mb-lg-0">
                  <label>Username</label>
                  <input type="text" class="form-control" placeholder=" username" name="username" required>
                </div>
                </div>
                <div class="form-group row">
                <div class="col-md-12 mb-4 mb-lg-0">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="password" name="password" required>
                </div>
</div>

               

              <div class="form-group row">
                <div class="col-md-6 ml-auto">
                  <button type="submit" class="btn btn-primary " name="Submit">Login</button> 
                  <a href="forgotpassword.php"  style="margin: left 220px;"> forgot password</a>
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
 