<?php
session_start();

include "../Connect.php";

$C_ID = $_SESSION['C_Log'];
$type_id = $_GET['type_id'];

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
	      <a class="navbar-brand" href="index.php">Car<span>Book</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
		  <ul class="navbar-nav ml-auto">
	          <li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item active"><a href="Cars.php" class="nav-link">Cars</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>

			  <?php if($C_ID) {?>
				
				<li class="nav-item"><a href="Account.php" class="nav-link">Account</a></li>
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Choose Your Car</h1>
          </div>
        </div>
      </div>
    </section>


		<section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">



			<?php
$sql1 = $type_id ? mysqli_query($con, "SELECT * from cars WHERE active = 1 AND type_id = '$type_id' ORDER BY id DESC") :
 mysqli_query($con, "SELECT * from cars WHERE active = 1 ORDER BY id DESC");

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
    					<div class="img rounded d-flex align-items-end" style="background-image: url(../Office_Dashboard/<?php echo $car_image ?>);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php"><?php echo $type ?></a></h2>
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