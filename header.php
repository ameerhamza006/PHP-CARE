<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themes.potenzaglobalsolutions.com/html/medileaf/index-02.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jan 2021 12:47:09 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Medileaf - Health and Medical HTML Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Medileaf - Health and Medical </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700&amp;display=swap" rel="stylesheet">

    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="css/font-awesome/all.min.css" />
    <link rel="stylesheet" href="css/flaticon/flaticon.css" />
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />

    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="css/select2/select2.css" />
    <link rel="stylesheet" href="css/datetimepicker/datetimepicker.min.css" />
    <link rel="stylesheet" href="css/owl-carousel/owl.carousel.min.css" />

    <!-- Template Style -->
    <link rel="stylesheet" href="css/style.css" />
<?php require_once "database/class.php";
	
	$db = new db();
	$crud = new CRUD();
	$fun = new functionality();
	$error = new errors();
	
  if(isset($_SESSION['EmailUser'])){

  $session = $_SESSION['EmailUser'];

  $se = $crud->Update_get_by_id('*','users'," where email='$session' ");

  $se_id = $se['id'];
  $se_firstname = $se['firstname'];
  $se_lastname = $se['lastname'];
  $se_email = $se['email'];
  $se_phone = $se['phone'];
  $se_city = $se['cityname'];
  $se_password = $se['password'];
  $se_address = $se['address'];
  $se_state = $se['state'];
  $se_zip = $se['zip'];





  }
	?>
  </head>

  <body>

    <!--=================================
    header -->
    <header class="header header-02 header-transparent header-sticky">
		
      <div class="container">
        <div class="row d-none d-lg-flex">
          <div class="col-md-3">
            <a class="navbar-brand" href="index.html">
              <img class="img-fluid" src="images/logo.svg" alt="logo">
            </a>
          </div>
          <div class="col-md-9 d-block d-md-flex justify-content-xl-end justify-content-center align-items-center">
            <div class="d-flex mr-3 mr-xl-5">
              <i class="flaticon-placeholder-1 fa-2x text-dark"></i>
              <div class="ml-3">
                <span class="text-dark font-weight-bold">17504 Carlton Cuevas </span>
                <p class="mb-0 small">Gulfport, MS, 39503 </p>
              </div>
            </div>
            <div class="d-flex mr-3 mr-xl-5">
              <i class="flaticon-phone-call fa-2x text-dark"></i>
              <div class="ml-3">
                <span class="text-dark font-weight-bold">+(704) 279-1249 </span>
                <p class="mb-0 small">Mon-Fri 8:30am-6:30pm </p>
              </div>
            </div>
            <div class="d-flex">
              <i class="flaticon-email-2 fa-2x text-dark"></i>
              <div class="ml-3">
                <span class="text-dark font-weight-bold">letstalk@medileaf.com </span>
                <p class="mb-0 small">24 X 7 online support </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="main-header">
        <div class="container">
          <nav class="navbar navbar-static-top navbar-expand-lg bg-primary">
            <a class="navbar-brand" href="index.html">
              <img class="img-fluid" src="images/logo-white.svg" alt="logo">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse"><i class="fas fa-align-left"></i></button>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                 <li class="nav-item active">
                  <a class="nav-link" href="http://localhost:82/PHP-CARE/">
                    Home
                  </a>
                </li>
				                 <li class="nav-item ">
                  <a class="nav-link" href="index.php">
                    About 
                  </a>
                </li>
				  
                <li class="dropdown nav-item">
                  <a class="nav-link" href="javascript:void(0)" data-toggle="dropdown">Doctors<i class="far fa-plus-square"></i></a>
                  <ul class="dropdown-menu megamenu dropdown-menu-lg">
                    <li>
                      <div class="row">
						 
						  <?php $data = $crud->View('*',' specialities ','','ORDER BY id DESC'); 
						  
						  foreach($data as $doctor){
							  
						  
						  
						  ?>
                        <div class="col-sm-3">
                          
                          <ul class="list-unstyled mt-lg-3">
                            <li><a class="dropdown-item" href="Doctors?Specialist=<?php echo $doctor['specialitie_name']; ?>"><?php echo $doctor['specialitie_name']; ?> </a></li>
                           
                          </ul>
                        </div>
						  
						  <?php } ?>
                        
                      </div>
                    </li>
                  </ul>
                </li>
                
                  
                
                <li class="nav-item">
                  <a class="nav-link" href="Latest-News">
                    News
                  </a>
                </li>
              
                <li class="nav-item">
                  <a class="nav-link" href="contact-us.html">
                    Contact Us 
                  </a>
                </li>
				  <li class="nav-item">
          <?php if(isset($_SESSION['EmailUser'])){   ?>
                  <a class="nav-link" href="contact-us.html" style="color: #88c250;">
                    <?php echo $se_firstname." ".$se_lastname; ?> 
                  </a>
                  <?php }else{ ?>
                    <a class="nav-link" href="contact-us.html">
                    login 
                  </a>
                    <?php } ?>
                </li>
				  
              </ul>
				<div class="add-listing d-none d-sm-block">
        <?php if(isset($_SESSION['EmailUser'])){  $fun->Logout('sign-In');  ?>
                <form method="POST">
               
               <button type="submit" name="logout" class="btn btn-secondory" ><i class="fa fa-sign-in-alt"></i>Logout</button>
             
                </form>
              <?php }else{ ?>
                   
                <a class="btn btn-secondory" href="Sign-In"><i class="fa fa-sign-in-alt"></i>Login</a>

              <?php } ?>
            </div>
            </div>
            
          </nav>
        </div>
      </div>
    </header>
    <!--=================================
    header -->
