<?php
session_start();

include "../Connect.php";

$O_ID = $_SESSION['O_Log'];

$term_id = $_GET['term_id'];
$car_id = $_GET['car_id'];

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

    $sql2 = mysqli_query($con, "select * from car_terms where id='$term_id'");
    $row2 = mysqli_fetch_array($sql2);

    $terms = trim($row2['terms']);

    if (isset($_POST['Submit'])) {

        $term_id = $_POST['term_id'];
        $car_id = $_POST['car_id'];
        $terms = $_POST['terms'];

        $stmt = $con->prepare("UPDATE car_terms SET terms = ? WHERE id = ?");

        $stmt->bind_param("si", $terms, $term_id);

        if ($stmt->execute()) {

            echo "<script language='JavaScript'>
            alert ('Term Updated Successfully !');
       </script>";

            echo "<script language='JavaScript'>
      document.location='./Terms.php?car_id={$car_id}';
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
        <h1>Edit Term</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item">Edit Term</li>
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
                <form method="POST" action="./Edit_Term.php?term_id=<?php echo $term_id ?>&car_id=<?php echo $car_id ?>" enctype="multipart/form-data">

<input type="hidden" name="term_id" value="<?php echo $term_id ?>">
<input type="hidden" name="car_id" value="<?php echo $car_id ?>">




                  <div class="row mb-3">
                    <label for="terms" class="col-sm-2 col-form-label"
                      >Text</label
                    >
                    <div class="col-sm-10">

                      <textarea name="terms" id="terms" class="form-control" required>

                      <?php echo trim($terms) ?>
                      </textarea>
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
