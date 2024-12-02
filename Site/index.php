<?php
session_start();

include "../Connect.php";

$C_ID = $_SESSION['C_Log'];

if ($C_ID) {

    $sql1 = mysqli_query($con, "select * from customers where id='$C_ID'");
    $row1 = mysqli_fetch_array($sql1);

    $name = $row1['name'];
    $email = $row1['email'];

}

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Elite</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

	<link href="../assets/img/Logo.png" rel="icon" />
    <link href="../assets/img/Logo.png" rel="apple-touch-icon" />
	
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Eli<span>te</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="Cars.php" class="nav-link">Cars</a></li>
	          <li class="nav-item "><a href="Offices.php" class="nav-link">Offices</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>

			  <?php if($C_ID) {?>
				
				<li class="nav-item"><a href="Account.php" class="nav-link">Account</a></li>
				<li class="nav-item "><a href="Bookings.php" class="nav-link">Bookings</a></li>
				<li class="nav-item"><a href="Logout.php" class="nav-link">Logout</a></li>
				
				<?php } else { ?>



					<li class="nav-item"><a href="../Customer_Login.php" class="nav-link">Login</a></li>
					<li class="nav-item"><a href="../Customer_Register.php" class="nav-link">Sign up</a></li>

				<?php }  ?>


	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-8 ftco-animate">
          	<div class="text w-100 text-center mb-md-5 pb-md-5">
	            <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
	            <p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts</p>
	            <a href="https://vimeo.com/45830194" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
	            	<div class="icon d-flex align-items-center justify-content-center">
	            		<span class="ion-ios-play"></span>
	            	</div>
	            	<div class="heading-title ml-5">
		            	<span>Easy steps for renting a car</span>
	            	</div>
	            </a>
            </div>
          </div>
        </div>
      </div>
    </div>

     <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-12	featured-top">
    				<div class="row no-gutters d-flex align-items-center">

	  					<div class="col-md-9 d-flex align-items-center">
	  						<div class="services-wrap rounded-right w-100">
	  							<h3 class="heading-section mb-4">Better Way to Rent Your Perfect Cars</h3>
	  							<div class="row d-flex mb-4">
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Choose Your Pickup Location</h3>
				                </div>
					            </div>
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Select the Best Deal</h3>
					              </div>
					            </div>
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Reserve Your Rental Car</h3>
					              </div>
					            </div>
					          </div>
					        </div>
	  						</div>
	  					</div>
	  				</div>
				</div>
  		</div>
    </section>


    <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">What we offer</span>
            <h2 class="mb-2">Cars Types</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="carousel-car owl-carousel">


            <?php
$sql1 = mysqli_query($con, "SELECT * from cars_types ORDER BY id DESC");

while ($row1 = mysqli_fetch_array($sql1)) {

    $type_id = $row1['id'];
    $type = $row1['type'];
    $image = $row1['image'];

    ?>
    					<div class="item">
    						<div class="car-wrap rounded ftco-animate">
		    					<div class="img rounded d-flex align-items-end" style="background-image: url(<?php echo $image ?>);">
		    					</div>
		    					<div class="text text-center">
		    						<h2 class="mb-0"><a href="#"><?php echo $type ?></a></h2>
		    						<!-- <div class="d-flex mb-3">
			    						<span class="cat">Cheverolet</span>
			    						<p class="price ml-auto">$500 <span>/day</span></p>
		    						</div> -->
		    						<p class="d-flex mb-0 d-block align-items-center justify-content-center">
                      <a href="./Cars.php?type_id=<?php echo $type_id ?>" class="btn btn-primary py-2 mr-1 mt-2">Book now</a>
                      <!-- <a href="#" class="btn btn-secondary py-2 ml-1">Details</a> -->
                    </p>
		    					</div>
		    				</div>
    					</div>




              <?php
}?>



    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section ftco-about">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about.jpg);">
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section heading-section-white pl-md-5">
	          	<span class="subheading">About us</span>
	            <h2 class="mb-4">Welcome to Elite</h2>

	            <p>



              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae officiis dolore dicta quam rem sunt minima ipsa odit aperiam consequuntur. Ipsum dolorum eaque quibusdam quaerat eum animi, neque dolores asperiores!

              Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, ex assumenda possimus excepturi quam debitis illo? Odit natus at ducimus, in cumque quidem impedit. Atque eligendi quasi officia consequatur. Asperiores.
              </p>
	            <p><a href="#" class="btn btn-primary py-3 px-4">Search Vehicle</a></p>
	          </div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Services</span>
            <h2 class="mb-3">Our Latest Services</h2>
          </div>
        </div>
				<div class="row">
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wedding-car"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Wedding Ceremony</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">City Transfer</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Airport Transfer</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Whole City Tour</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section ftco-intro" style="background-image: url(images/bg_3.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-md-6 heading-section heading-section-white ftco-animate">
            <h2 class="mb-3">Do You Want To Earn With Us? So Don't Be Late.</h2>
            <!-- <a href="#" class="btn btn-primary btn-lg">Become A Driver</a> -->
          </div>
				</div>
			</div>
		</section>


    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-3">Our Cars</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">






              <?php
$sql1 = mysqli_query($con, "SELECT * from cars WHERE active = 1 ORDER BY id DESC");

while ($row1 = mysqli_fetch_array($sql1)) {

    $car_id = $row1['id'];
    $office_id = $row1['office_id'];
    $type_id = $row1['type_id'];
    $car_name = $row1['name'];
    $car_image = $row1['image'];
    $color = $row1['color'];
    $gear_transmission = $row1['gear_transmission'];
    $number_of_seats = $row1['number_of_seats'];
    $model = $row1['model'];
    $price_per_day = $row1['price_per_day'];
    $availability_status = $row1['availability_status'];

    $sql2 = mysqli_query($con, "SELECT * from cars_types WHERE id = '$type_id'");
    $row2 = mysqli_fetch_array($sql2);

    $type = $row2['type'];

    ?>
    					<div class="item">
    						<div class="car-wrap rounded ftco-animate">
		    					<div class="img rounded d-flex align-items-end" style="background-image: url(../Office_Dashboard/<?php echo $car_image ?>);">
		    					</div>
		    					<div class="text text-center">
		    						<h2 class="mb-0"><a href="#"><?php echo $type ?></a></h2>
		    						<div class="d-flex mb-3">
			    						<span class="cat"><?php echo $car_name ?></span>
			    						<p class="price ml-auto">JOD<?php echo $price_per_day ?> <span>/day</span></p>
		    						</div>
		    						<p class="d-flex mb-0 d-block align-items-center justify-content-center">
                      <a href="./Order.php?car_id=<?php echo $car_id ?>&office_id=<?php echo $office_id ?>" class="btn btn-primary py-2 mr-1 mt-2">Book now</a>
					  <?php if ($C_ID) {?>
						<a href="./Car.php?car_id=<?php echo $car_id ?>" class="btn btn-secondary py-2 ml-1">Details</a>
						<?php }?>
                    </p>
		    					</div>
		    				</div>
    					</div>




              <?php
}?>



            </div>
          </div>
        </div>
      </div>
    </section>





    <?php

require './Footer.php'
?>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  </body>
</html>
