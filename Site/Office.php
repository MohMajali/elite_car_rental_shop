<?php
session_start();

include "../Connect.php";

$C_ID = $_SESSION['C_Log'];
$office_id = $_GET['office_id'];

if ($C_ID) {

    $sql1 = mysqli_query($con, "select * from customers where id='$C_ID'");
    $row1 = mysqli_fetch_array($sql1);

    $name = $row1['name'];
    $email = $row1['email'];

}


$sql2 = mysqli_query($con, "select * from offices where id='$office_id'");
$row2 = mysqli_fetch_array($sql2);

$office_name = $row2['name'];
$office_email = $row2['email'];
$office_phone = $row2['phone'];
$office_image = $row2['image'];
$office_address = $row2['address'];
$office_description = $row2['description'];


$sql3 = mysqli_query($con, "select * from feedbacks where id='$office_id'");
$row3 = mysqli_num_rows($sql3);

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
	          <li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item "><a href="Cars.php" class="nav-link">Cars</a></li>
	          <li class="nav-item active"><a href="Offices.php" class="nav-link">Offices</a></li>
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
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span><?php echo $office_name?> details <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread"><?php echo $office_name?> Details</h1>
          </div>
        </div>
      </div>
    </section>
		

		<section class="ftco-section ftco-car-details">
      <div class="container">
      	<div class="row justify-content-center">
      		<div class="col-md-12">
      			<div class="car-details">
      				<div class="img rounded" style="background-image: url(../Office_Dashboard/<?php echo $office_image?>);"></div>
      				<div class="text text-center">
      					<span class="subheading"><?php echo $office_email?></span>
      					<h2><?php echo $office_name?></h2>
      				</div>
      			</div>
      		</div>
      	</div>
     
      	<div class="row">
      		<div class="col-md-12 pills">
						<div class="bd-example bd-example-tabs">
							<div class="d-flex justify-content-center">
							  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

						
							    <li class="nav-item">
							      <a class="nav-link active" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
							    </li>
							  </ul>
							</div>

						  <div class="tab-content" id="pills-tabContent">
		

						    <div class="tab-pane fade show active" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
						      <p><?php echo $office_description?></p>
						    </div>

						    <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
						      <div class="row">
							   		<div class="col-md-12">
							   			<h3 class="head"><?php echo $row3?> Reviews</h3>




                                           <?php
$sql1 = mysqli_query($con, "SELECT * from feedbacks WHERE office_id = '$office_id' ORDER BY id DESC");

while ($row1 = mysqli_fetch_array($sql1)) {

    $feedbac_id = $row1['id'];
    $customer_id = $row1['customer_id'];
    $feedback = $row1['feedback'];
    $created_at = $row1['created_at'];

    $sql2 = mysqli_query($con, "SELECT * from customers WHERE id = '$customer_id'");
    $row2 = mysqli_fetch_array($sql2);

    $customer_name = $row2['name'];

    ?>


                                    
							   			<div class="review d-flex">
									   		<div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left"><?php echo $customer_name?></span>
									   				<span class="text-right"><?php echo $created_at?></span>
									   			</h4>
									  
									   			<p><?php echo $feedback?></p>
									   		</div>
									   	</div>


                                           <?php
}?>


							   		</div>
							   	
							   	</div>
						    </div>
						  </div>
						</div>
		      </div>
				</div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pt">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Choose Car</span>
            <h2 class="mb-2"><?php echo $office_name?> Cars</h2>
          </div>
        </div>
        <div class="row">


        <?php
$sql1 = mysqli_query($con, "SELECT * from cars WHERE active = 1 AND office_id = '$office_id' ORDER BY id DESC");

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








        	<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(../Office_Dashboard/<?php echo $car_image?>);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php"><?php echo $type?></a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat"><?php echo $car_name?></span>
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