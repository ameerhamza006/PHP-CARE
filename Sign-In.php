<?php require_once "header.php"; ?>


<section class="banner banner-02 ">
<label></label>


<!--=================================
    banner -->
    <section class="inner-banner bg-light ">
      <div class="container">
        <div class="row align-items-center intro-title">
          <div class="col-12">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="index.html"> <i class="fas fa-home"></i> </a></li>
              <li class="breadcrumb-item"> <i class="fas fa-chevron-right"></i> <a href="javascript:void(0)">Pages</a></li>
              <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Team </span></li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <!--=================================
    banner -->

<br>
<?php 
	
     $fun->login();
	
	
	//$error->Front_Find('login success','Not login','','','','');

	
?>


<!--=================================
    login-->
    <section class="space-ptb ">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 col-lg-9 col-md-10">
            <div class="login-form">
				<!--<h4 class="text-primary text-center">Login To Your Account!</h4>
                Login form -->
              <form method="post">
                <h3 class="mb-4 text-center text-primary">Login to your Account</h3>
                <div class="row align-items-center">
                  <div class="form-group col-md-12">
					  <label class="text-dark">Email&nbsp;&nbsp;<b class="text-danger"><?php echo $fun->ev; ?></b></label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                  </div>
                  <div class="form-group col-md-12">
					  <label class="text-dark">Password&nbsp;&nbsp;&nbsp;<b class="text-danger"><?php echo $fun->pv; ?></b></label>
                    <input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Password">
                  </div>
                  <div class="form-group col-md-6">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">Remember me</label>
                    </div>
                  </div>
                  <div class="form-group col-md-6 text-md-right">
                    <a href="#">Forget Password?</a>
                  </div>
                  <div class="form-group col-lg-12">
                  </div>
                  <div class="form-group col-sm-12 mb-0">
                    <button type="submit" name="login" class="btn btn-primary">Login Now</button>
                    <span class="ml-3">Don’t have an account? <a href="Sign-Up">Create Account</a></span>
                  </div>
                </div>
              </form>
              <!-- Login form -->
              <!-- login-social START -->
              <div class="login-social-media">
                <div class="mb-4 d-block text-center"><b class="bg-white pl-2 pr-2 d-block">Login or Sign in with</b></div>
                <form class="row">
                  <div class="col-sm-6">
                    <a class="btn facebook-bg social-bg-hover d-block mb-3" href="#"><span><i class="fab fa-facebook-f"></i>Login with Facebook</span></a>
                  </div>
                  <div class="col-sm-6">
                    <a class="btn twitter-bg social-bg-hover d-block mb-3" href="#"><span><i class="fab fa-twitter"></i>Login with Twitter</span></a>
                  </div>
                  <div class="col-sm-6">
                    <a class="btn instagram-bg social-bg-hover d-block mb-3 mb-sm-0" href="#"><span><i class="fab fa-instagram"></i>Login with Instagram</span></a>
                  </div>
                  <div class="col-sm-6">
                    <a class="btn linkedin-bg social-bg-hover d-block" href="#"><span><i class="fab fa-linkedin-in"></i>Login with Linkedin</span></a>
                  </div>
                </form>
              </div>
              <!-- login-social END -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=================================
    Contact-info-->
</section>
<br>
<br>
<br>
<br>

<?php require_once "footer.php"; ?>