<?php
session_start();

include "../Connect.php";

$C_ID = $_SESSION['C_Log'];
$car_id = $_GET['car_id'];
$office_id = $_GET['office_id'];

if ($C_ID) {

    $sql1 = mysqli_query($con, "select * from customers where id='$C_ID'");
    $row1 = mysqli_fetch_array($sql1);

    $name = $row1['name'];
    $email = $row1['email'];

    $sql2 = mysqli_query($con, "select * from bookings where customer_id='$C_ID'");
    $row2 = mysqli_num_rows($sql2);

    if (isset($_POST['Submit'])) {

        $customer_id = $_POST['customer_id'];
        $office_id = $_POST['office_id'];
        $car_id = $_POST['car_id'];
        $booking_nums = $_POST['booking_nums'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $payment_type = $_POST['payment_type'];

        $sql3 = mysqli_query($con, "select * from cars where id='$car_id'");
        $row3 = mysqli_fetch_array($sql3);

        $pricePerDay = $row3['price_per_day'];

        $start = new DateTime($start_date);
        $end = new DateTime($end_date);
        $interval = $start->diff($end);
        $daysDifference = $interval->days;

        $totalPrice = $pricePerDay * $daysDifference;

        if ($booking_nums == 0) {

            $totalPrice = $totalPrice * 0.10;

        } else if ($booking_nums == 4) {

            $totalPrice = $totalPrice * 0.50;

        }

        $start_date = date('Y-m-d', strtotime($start_date));
        $end_date = date('Y-m-d', strtotime($end_date));


        $stmt = $con->prepare("INSERT INTO bookings (office_id, car_id, customer_id, start_date, end_date, total_price, payment_type) VALUES (?, ?, ?, ?, ?, ?, ?) ");

        $stmt->bind_param("iiissds", $office_id, $car_id, $customer_id, $start_date, $end_date, $totalPrice, $payment_type);

        if ($stmt->execute()) {

            echo "<script language='JavaScript'>
          alert ('Car Booked Successfully !');
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

    <link
      href="../assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    
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
				<li class="nav-item "><a href="Bookings.php" class="nav-link">Bookings</a></li>
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
                <form method="POST" action="./Order.php?car_id=<?php echo $car_id ?>&office_id=<?php echo $office_id ?>" enctype="multipart/form-data">

                <input type="hidden" name="office_id" value="<?php echo $office_id ?>">
                <input type="hidden" name="car_id" value="<?php echo $car_id ?>">
                <input type="hidden" name="customer_id" value="<?php echo $C_ID ?>">
                <input type="hidden" name="booking_nums" value="<?php echo $row2 ?>">

                  <div class="row mb-3">
                    <label for="start_date" class="col-sm-2 col-form-label"
                      >Start Date</label
                    >
                    <div class="col-sm-10">
                      <input type="date" name="start_date" class="form-control" min="<?php echo date('Y-m-d'); ?>" id="start_date" required/>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="end_date" class="col-sm-2 col-form-label"
                      >End Date</label
                    >
                    <div class="col-sm-10">
                      <input type="date" name="end_date" class="form-control" min="<?php echo date('Y-m-d'); ?>" id="end_date" required/>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="payment_type_id" class="col-sm-2 col-form-label"
                      >Payment Type</label
                    >
                    <div class="col-sm-10">
                      <select name="payment_type" id="payment_type_id" class="form-select" required>
                        <option value="Cash">Cash</option>
                        <option value="Online Payment">Online Payment</option>
                      </select>
                    </div>
                  </div>







                  <div id="online" style="display: none;">

                  <div class="row mb-3">
                    <label for="name_on_card" class="col-sm-2 col-form-label"
                      >Name On Card</label
                    >
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name_on_card" />
                    </div>
                  </div>




                  <div class="row mb-3">
                    <label for="card_number" class="col-sm-2 col-form-label"
                      >Card Number</label
                    >
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="card_number" />
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="expiry_date" class="col-sm-2 col-form-label"
                      >Expiry Date</label
                    >
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="expiry_date" />
                    </div>
                  </div>




                  <div class="row mb-3">
                    <label for="cvv" class="col-sm-2 col-form-label"
                      >CVV</label
                    >
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="cvv" />
                    </div>
                  </div>


                  </div>



                  <div class="col-12">


                  <?php if ($row2 === 0) {?>

                    <p class="small mb-0">
                        It's your first time booking from Elite, you will have 10% discount on your first booking
                    </p>


                    <?php } else if ($row2 === 4) {?>



                        <p class="small mb-0">
                        You will get 50% on you next booking
                    </p>

                    <?php }?>
                      </div>
                <!-- row2 -->



                <div class="row mb-3">
                <p class="small mb-0">
                          Terms & Conditions
                          <a href="" data-bs-toggle="modal"
                          data-bs-target="#verticalycentered">Terms & Conditions</a>

                        </p>
                  
                  </div>







                  <div class="modal fade" id="verticalycentered" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Information</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">

<div>





<?php
$sql1 = mysqli_query($con, "SELECT * from car_terms WHERE car_id = '$car_id' ORDER BY id DESC");
$counter = 0;
while ($row1 = mysqli_fetch_array($sql1)) {

    $term_id = $row1['id'];
    $terms = $row1['terms'];
    $created_at = $row1['created_at'];

    $counter += 1;
    ?>






  <div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label"
      ><?php echo $counter?>.</label
    >
    <div class="col-sm-10">
       <p><?php echo $terms?>.</p>
    </div>
  </div>

  <?php
}?>


</div>




              </div>
              <div class="modal-footer">
                <button
                id="accept-btn"
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Accept
                </button>
              </div>
            </div>
          </div>
        </div>









                  <div class="text-end">
                    <button type="submit" name="Submit" class="btn btn-primary" id="submit-btn" disabled>
                      Submit
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


  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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




  <script>
    document.getElementById('payment_type_id').addEventListener('change', function(){
            const value = this.value
            if(value === 'Online Payment') {
                document.getElementById('online').style.display = 'block'
            } else {
                document.getElementById('online').style.display = 'none'
            }
    })










    document.getElementById('accept-btn').addEventListener('click', function() {

document.getElementById('submit-btn').disabled = false
})
  </script>
  
  </body>
</html>