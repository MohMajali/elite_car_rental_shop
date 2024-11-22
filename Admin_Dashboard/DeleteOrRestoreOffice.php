<?php

include "../Connect.php";

$isActive = $_GET['isActive'];
$office_id = $_GET['office_id'];

$stmt = $con->prepare("UPDATE offices SET active = ? WHERE id = ? ");

$stmt->bind_param("ii", $isActive, $office_id);

if ($stmt->execute()) {

    if ($isActive == 0) {

        echo "<script language='JavaScript'>
        alert ('Office Has Been Deleted Successfully !');
        </script>";

        echo "<script language='JavaScript'>
        document.location='./Offices.php';
        </script>";

    } else {
        echo "<script language='JavaScript'>
alert ('Office Has Been Restored Successfully !');
</script>";

        echo "<script language='JavaScript'>
document.location='./Offices.php';
</script>";
    }

}
