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
    $image = $row1['image'];

    if (isset($_POST['Submit'])) {

        $office_id = $_POST['office_id'];
        $type_id = $_POST['type_id'];
        $name = $_POST['name'];
        $color = $_POST['color'];
        $gear_transmission = $_POST['gear_transmission'];
        $number_of_seats = $_POST['number_of_seats'];
        $model = $_POST['model'];
        $price_per_day = $_POST['price_per_day'];
        $image = $_FILES["file"]["name"];
        $image = 'Cars_Images/' . $image;

        $stmt = $con->prepare("INSERT INTO cars (office_id, type_id, name, image, color, gear_transmission, number_of_seats, model, price_per_day) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) ");

        $stmt->bind_param("iissssisd", $office_id, $type_id, $name, $image, $color, $gear_transmission, $number_of_seats, $model, $price_per_day);

        if ($stmt->execute()) {

            move_uploaded_file($_FILES["file"]["tmp_name"], "./Cars_Images/" . $_FILES["file"]["name"]);

            echo "<script language='JavaScript'>
          alert ('Car Added Successfully !');
     </script>";

            echo "<script language='JavaScript'>
    document.location='./Cars.php';
       </script>";
        }

    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Elite</title>
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
                src="<?php echo $image ?>"
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
        <h1>Add New Car</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item">Add New Car</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"></h5>

                <!-- Horizontal Form -->
                <form method="POST" action="./Add_Car.php" enctype="multipart/form-data">

<input type="hidden" name="office_id" value="<?php echo $O_ID ?>">





                  <div class="row mb-3">
                    <label for="type_id" class="col-sm-2 col-form-label"
                      >Car Type</label
                    >
                    <div class="col-sm-10">
                    <select name="type_id" class="form-select" id="type_id" required>


                    <option value="" disabled selected>Select Type</option>
<?php
$placesSql = mysqli_query($con, "SELECT * from cars_types ORDER BY id DESC");

while ($placeRow = mysqli_fetch_array($placesSql)) {

    $type_id = $placeRow['id'];
    $type = $placeRow['type'];

    ?>
<option value="<?php echo $type_id ?>"><?php echo $type ?></option>
<?php
}?>
</select>
                    </div>
                  </div>



                  <div class="row mb-3">
                    <label for="gear_transmission" class="col-sm-2 col-form-label"
                      >Gear Transmission</label
                    >
                    <div class="col-sm-10">
                    <select name="gear_transmission" class="form-select" id="gear_transmission" required>


                    <option value="" disabled selected>Select Gear Transmission</option>
                    <option value="Automatic" >Automatic</option>
                    <option value="Manual">Manual</option>

</select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label"
                      >Name</label
                    >
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" id="name" required/>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="color" class="col-sm-2 col-form-label"
                      >Color</label
                    >
                    <div class="col-sm-10">
                      <input type="text" name="color" class="form-control" id="color" required/>
                    </div>
                  </div>



                  <div class="row mb-3">
                    <label for="number_of_seats" class="col-sm-2 col-form-label"
                      >Seats #</label
                    >
                    <div class="col-sm-10">
                      <input type="number" name="number_of_seats" class="form-control" id="number_of_seats" required/>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="model" class="col-sm-2 col-form-label"
                      >Model</label
                    >
                    <div class="col-sm-10">
                      <input type="number" min="1" name="model" class="form-control" id="model" required/>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="price_per_day" class="col-sm-2 col-form-label"
                      >Price / Day</label
                    >
                    <div class="col-sm-10">
                      <input type="number" name="price_per_day" step="0.01" class="form-control" id="price_per_day" required/>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"
                      >Image</label
                    >
                    <div class="col-sm-10">
                      <input type="file" name="file" class="form-control" id="inputText"/>
                    </div>
                  </div>

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
