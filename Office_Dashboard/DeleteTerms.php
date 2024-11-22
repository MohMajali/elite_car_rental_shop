<?php

include "../Connect.php";

$term_id = $_GET['term_id'];
$car_id = $_GET['car_id'];

$stmt = $con->prepare("DELETE FROM car_terms WHERE id = ?");

$stmt->bind_param("i", $term_id);

if ($stmt->execute()) {

    echo "<script language='JavaScript'>
        alert ('Term Has Been Deleted Successfully !');
        </script>";

    echo "<script language='JavaScript'>
        document.location='./Terms.php?car_id={$car_id}';
        </script>";

}
