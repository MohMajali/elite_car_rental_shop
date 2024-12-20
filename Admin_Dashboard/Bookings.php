<?php
session_start();

include "../Connect.php";

$A_ID = $_SESSION['A_Log'];

$customerId_query = $_GET['customer_id'];
$officeId_query = $_GET['office_id'];


$sqlQuery = "SELECT * from bookings ORDER BY id DESC";

if (!$A_ID) {

    echo '<script language="JavaScript">
     document.location="../Admin_Login.php";
    </script>';

} else {

    $sql1 = mysqli_query($con, "select * from admins where id='$A_ID'");
    $row1 = mysqli_fetch_array($sql1);

    $name = $row1['name'];
    $email = $row1['email'];




    if ($customerId_query && $officeId_query) {

      $sqlQuery = "SELECT * from bookings WHERE office_id = '$officeId_query' AND customer_id = '$customerId_query' ORDER BY id DESC";

  } else if ($customerId_query) {

      $sqlQuery = "SELECT * from bookings WHERE customer_id = '$customerId_query' ORDER BY id DESC";

  } else if ($officeId_query) {

      $sqlQuery = "SELECT * from bookings WHERE office_id = '$officeId_query' ORDER BY id DESC";

  }

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Bookings - Elite</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="../assets/img/Logo.png" rel="icon" />
    <link href="../assets/img/Logo.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="../assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="../assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
          <img src="../assets/img/Logo.png" alt="" />

        </a>
      </div>
      <!-- End Logo -->
      <!-- End Search Bar -->

      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
          <li class="nav-item dropdown pe-3">
            <a
              class="nav-link nav-profile d-flex align-items-center pe-0"
              href="#"
              data-bs-toggle="dropdown"
            >
              <img
                src="https://www.computerhope.com/jargon/g/guest-user.png"
                alt="Profile"
                class="rounded-circle"
              />
              <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $name ?></span> </a
            >

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $name ?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="./Logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul>
          </li>
          <!-- End Profile Nav -->
        </ul>
      </nav>
      <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php require './Aside-Nav/Aside.php'?>
    <!-- End Sidebar-->


    <script>
        function printDiv() {
            var divContents = document.getElementById("div_print").innerHTML;
            var a = window.open('', '', 'height=1000, width=5000');
            a.document.write('<html>');
            a.document.write('<body >');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>




    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Bookings</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item">Bookings</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->
      <section class="section">


      <div class="mb-3">

<input type="button" value="PRINT REPORT" class="btn btn-primary" onclick="printDiv()">
</div>


        <div id="div_print">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <!-- Table with stripped rows -->







                <form action="./Bookings.php">

                <select name="customer_id" id="">

<option value="" selected disabled>Select Customer</option>
  <?php
$sql323232 = mysqli_query($con, "SELECT * from customers WHERE active = 1 ORDER BY id DESC");

while ($row323232 = mysqli_fetch_array($sql323232)) {

$customer_id = $row323232['id'];
$customer_name = $row323232['name'];

?>

<option value="<?php echo $customer_id ?>"><?php echo $customer_name ?></option>
<?php
}?>
</select>




<select name="office_id" id="">

<option value="" selected disabled>Select Office</option>
  <?php
$sql12121 = mysqli_query($con, "SELECT * from offices WHERE active = 1 ORDER BY id DESC");

while ($row12121 = mysqli_fetch_array($sql12121)) {

$office_id = $row12121['id'];
$office_name = $row12121['name'];

?>

<option value="<?php echo $office_id ?>"><?php echo $office_name ?></option>
<?php
}?>
</select>


<button type="submit" >Filter</button>

                </form>













                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Customer Name</th>
                      <th scope="col">Office Name</th>
                      <th scope="col">Car</th>
                      <th scope="col">Start Date</th>
                      <th scope="col">End Date</th>
                      <th scope="col">Total Price</th>
                      <th scope="col">Profits</th>
                      <th scope="col">Payment Type</th>
                      <th scope="col">Status</th>
                      <th scope="col">Created At</th>
                    </tr>
                  </thead>
                  <tbody>


                  <?php

                  $totalProfits = 0;
                  $totalPrices = 0;
$sql1 = mysqli_query($con, $sqlQuery);

while ($row1 = mysqli_fetch_array($sql1)) {

    $booking_id = $row1['id'];
    $car_id = $row1['car_id'];
    $customer_id = $row1['customer_id'];
    $start_date = $row1['start_date'];
    $end_date = $row1['end_date'];
    $total_price = $row1['total_price'];

    $profits = $total_price * 0.05;

    $payment_type = $row1['payment_type'];
    $status = $row1['status'];
    $created_at = $row1['created_at'];

    $sql2 = mysqli_query($con, "SELECT * from cars WHERE id = '$car_id'");
    $row2 = mysqli_fetch_array($sql2);

    $office_id = $row2['office_id'];
    $type_id = $row2['type_id'];
    $color = $row2['color'];
    $car_name = $row2['name'];

    $sql3 = mysqli_query($con, "SELECT * from cars_types WHERE id = '$type_id'");
    $row3 = mysqli_fetch_array($sql3);

    $type = $row3['type'];

    $sql4 = mysqli_query($con, "SELECT * from offices WHERE id = '$office_id'");
    $row4 = mysqli_fetch_array($sql4);

    $office_name = $row4['name'];
    $office_phone = $row4['phone'];

    $sql5 = mysqli_query($con, "SELECT * from customers WHERE id = '$customer_id'");
    $row5 = mysqli_fetch_array($sql5);

    $customer_name = $row5['name'];
    $customer_phone = $row5['phone'];


    $totalProfits += $profits;
    $totalPrices += $total_price;

    ?>
                    <tr>
                      <th scope="row"><?php echo $booking_id ?></th>
                      <th scope="row"><?php echo $customer_name ?></th>
                      <th scope="row"><?php echo $office_name ?></th>
                      <th scope="row"><?php echo $car_name ?></th>
                      <th scope="row"><?php echo $start_date ?></th>
                      <th scope="row"><?php echo $end_date ?></th>
                      <th scope="row"><?php echo $total_price ?> JODs</th>
                      <th scope="row"><?php echo $profits ?> JODs</th>
                      <th scope="row"><?php echo $payment_type ?></th>
                      <th scope="row"><?php echo $status ?></th>
                      <th scope="row"><?php echo $created_at ?></th>
                    </tr>
<?php
}?>

<tr>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th><?php echo $totalPrices?> JODs</th>
  <th><?php echo $totalProfits?> JODs</th>
  <th></th>
  <th></th>
  <th></th>
</tr>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
              </div>
            </div>
          </div>
        </div>

        </div>


      </section>
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="copyright">
        &copy; Copyright <strong><span>Elite</span></strong
        >. All Rights Reserved
      </div>
    </footer>
    <!-- End Footer -->

    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <script>
    window.addEventListener('DOMContentLoaded', (event) => {
     document.querySelector('#sidebar-nav .nav-item:nth-child(4) .nav-link').classList.remove('collapsed')
   });
</script>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
  </body>
</html>
