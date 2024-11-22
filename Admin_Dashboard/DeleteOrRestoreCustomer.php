<?php

include "../Connect.php";


$isActive = $_GET['isActive'];
$customer_id = $_GET['customer_id'];

$stmt = $con->prepare("UPDATE customers SET active = ? WHERE id = ? ");

$stmt->bind_param("ii", $isActive, $customer_id);

if ($stmt->execute()) {

    if ($isActive == 0) {

        echo "<script language='JavaScript'>
        alert ('Customer Has Been Deleted Successfully !');
        </script>";

        echo "<script language='JavaScript'>
        document.location='./Customers.php';
        </script>";

    } else {
        echo "<script language='JavaScript'>
alert ('Customer Has Been Restored Successfully !');
</script>";

        echo "<script language='JavaScript'>
document.location='./Customers.php';
</script>";
    }

}
