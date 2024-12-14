<?php

include "../Connect.php";

$status = $_GET['status'];
$book_id = $_GET['book_id'];

$stmt = $con->prepare("UPDATE bookings SET status = ? WHERE id = ? ");

$stmt->bind_param("si", $status, $book_id);

if ($stmt->execute()) {

    if ($status == 'Accepted') {

        echo "<script language='JavaScript'>
        alert ('Booking Request Has Been Accepted Successfully !');
        </script>";

        echo "<script language='JavaScript'>
        document.location='./Bookings.php';
        </script>";

    } else {
        echo "<script language='JavaScript'>
alert ('Car Has Been Rejected Successfully !');
</script>";

        echo "<script language='JavaScript'>
document.location='./Bookings.php';
</script>";
    }

}
