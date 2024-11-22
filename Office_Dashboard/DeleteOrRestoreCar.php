<?php

include "../Connect.php";


$isActive = $_GET['isActive'];
$car_id = $_GET['car_id'];

$stmt = $con->prepare("UPDATE cars SET active = ? WHERE id = ? ");

$stmt->bind_param("ii", $isActive, $car_id);

if ($stmt->execute()) {

    if ($isActive == 0) {

        echo "<script language='JavaScript'>
        alert ('Car Has Been Deleted Successfully !');
        </script>";

        echo "<script language='JavaScript'>
        document.location='./Cars.php';
        </script>";

    } else {
        echo "<script language='JavaScript'>
alert ('Car Has Been Restored Successfully !');
</script>";

        echo "<script language='JavaScript'>
document.location='./Cars.php';
</script>";
    }

}
