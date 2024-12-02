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

    if (isset($_POST['Submit'])) {

        $feedback = $_POST['feedback'];
        $customer_id = $_POST['customer_id'];
        $office_id = $_POST['office_id'];

        $stmt = $con->prepare("INSERT INTO feedbacks (customer_id, office_id, feedback) VALUES (?, ?, ?) ");

        $stmt->bind_param("iis", $customer_id, $office_id, $feedback);

        if ($stmt->execute()) {

            echo "<script language='JavaScript'>
          alert ('Thank you for your feedback !');
     </script>";

            echo "<script language='JavaScript'>
    document.location='./Bookings.php';
       </script>";
        }

    }

}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Elite</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link
      href="../assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />

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
	          <li class="nav-item active"><a href="Cars.php" class="nav-link">Cars</a></li>
	          <li class="nav-item "><a href="Offices.php" class="nav-link">Offices</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>

			  <?php if ($C_ID) {?>

				<li class="nav-item"><a href="Account.php" class="nav-link">Account</a></li>
				<li class="nav-item active"><a href="Bookings.php" class="nav-link">Bookings</a></li>
				<li class="nav-item"><a href="Logout.php" class="nav-link">Logout</a></li>

				<?php } else {?>



					<li class="nav-item"><a href="../Customer_Login.php" class="nav-link">Login</a></li>
					<li class="nav-item"><a href="../Customer_Register.php" class="nav-link">Sign up</a></li>

				<?php }?>


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
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span><?php echo $car_name ?> details <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Book Car<?php echo $car_name ?></h1>
          </div>
        </div>
      </div>
    </section>


		<section class="ftco-section ftco-car-details">
      <div class="container">

      	<div class="row">




                  <div class="col-lg-12">

                  <div class="card">
              <div class="card-body">
                <h5 class="card-title"></h5>

                <!-- Horizontal Form -->
                <form method="POST" action="./Feedback.php?office_id=<?php echo $office_id ?>" enctype="multipart/form-data">

                <input type="hidden" name="office_id" value="<?php echo $office_id ?>">
                <input type="hidden" name="customer_id" value="<?php echo $C_ID ?>">


                  <div class="row mb-3">
                    <label for="feedback" class="col-sm-2 col-form-label"
                      >Feedback</label
                    >
                    <div class="col-sm-10">

                      <textarea name="feedback" id="feedback" class="form-control" required></textarea>
                    </div>
                  </div>





                <!-- row2 -->
                  <div class="text-end">
                    <button type="submit" name="Submit" class="btn btn-primary">
                      Submit
                    </button>
                    <button type="reset" class="btn btn-secondary">
                      Reset
                    </button>
                  </div>
                </form>
                <!-- End Horizontal Form -->
              </div>
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