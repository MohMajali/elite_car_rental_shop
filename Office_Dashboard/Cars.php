<?php
session_start();

include "../Connect.php";

$O_ID = $_SESSION['O_Log'];

if (!$O_ID) {

    echo '<script language="JavaScript">
     document.location="../Office_Login.php";
    </script>';

} else {

    $sql1 = mysqli_query($con, "select * from offices where id='$O_ID'");
    $row1 = mysqli_fetch_array($sql1);

    $name = $row1['name'];
    $email = $row1['email'];
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title> Cars - Elite</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="../assets/img/logo.jpg" rel="icon" />
    <link href="../assets/img/logo.jpg" rel="apple-touch-icon" />

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
          <img src="../assets/img/logo.jpg" alt="" />

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

    <main id="main" class="main">



      <div class="pagetitle">
        <h1> Cars</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"> Cars</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->
      <section class="section">


      <div class="mb-3">
          <a
          href="./Add_Car.php"
            class="btn btn-primary"
          >
            Add New Car
</a>
        </div>




        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Image</th>
                      <th scope="col">Type</th>
                      <th scope="col">Color</th>
                      <th scope="col">Gear Type</th>
                      <th scope="col">Seats #</th>
                      <th scope="col">model</th>
                      <th scope="col">Price / Day</th>
                      <th scope="col">Status</th>
                      <th scope="col">Active</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>


                  <?php
$sql1 = mysqli_query($con, "SELECT * from cars WHERE office_id = '$O_ID' ORDER BY id DESC");

while ($row1 = mysqli_fetch_array($sql1)) {

    $car_id = $row1['id'];
    $type_id = $row1['type_id'];
    $image = $row1['image'];
    $color = $row1['color'];
    $gear_transmission = $row1['gear_transmission'];
    $number_of_seats = $row1['number_of_seats'];
    $model = $row1['model'];
    $price_per_day = $row1['price_per_day'];
    $availability_status = $row1['availability_status'];
    $active = $row1['active'];
    $created_at = $row1['created_at'];

    $sql2 = mysqli_query($con, "SELECT * from cars_types WHERE id = '$type_id'");
    $row2 = mysqli_fetch_array($sql2);

    $type = $row2['type'];

    ?>
                    <tr>
                      <th scope="row"><?php echo $car_id ?></th>
                      <th scope="row"><img src="../Office_Dashboard/<?php echo $image ?>" alt="" width="150px" height="150px"></th>
                      <th scope="row"><?php echo $type ?></th>
                      <td scope="row"><?php echo $color ?></td>
                      <td scope="row"><?php echo $gear_transmission ?></td>
                      <td scope="row"><?php echo $number_of_seats ?></td>
                      <td scope="row"><?php echo $model ?></td>
                      <td scope="row"><?php echo $price_per_day ?> JODs</td>
                      <td scope="row"><?php echo $availability_status ?></td>
                      <td scope="row"><?php echo $active ?></td>
                      <th scope="row"><?php echo $created_at ?></th>
                      <th>


                      <div class="d-flex flex-column">


                        <?php if ($active == 1) {?>
  
  <a href="./DeleteOrRestoreCar.php?car_id=<?php echo $car_id ?>&isActive=<?php echo 0 ?>" class="btn btn-danger mb-2">Delete</a>
  
  <?php } else {?>
  
    <a href="./DeleteOrRestoreCar.php?car_id=<?php echo $car_id ?>&isActive=<?php echo 1 ?>" class="btn btn-primary mb-2">Restore</a>
  
  <?php }?>
  
  <a href="./Edit_Car.php?car_id=<?php echo $car_id ?>" class="btn btn-primary mb-2">Edit</a>
  <a href="./Terms.php?car_id=<?php echo $car_id ?>" class="btn btn-success">Terms & Conditions</a>

                      </div>


                      </th>
                    </tr>
<?php
}?>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
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
     document.querySelector('#sidebar-nav .nav-item:nth-child(3) .nav-link').classList.remove('collapsed')
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