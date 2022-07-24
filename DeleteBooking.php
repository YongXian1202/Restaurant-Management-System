<?php
include "connectdb.php";
$sql="DELETE FROM bookings WHERE Booking_ID=".$_GET['id'].";";
mysqli_query($conn,$sql);

$sql2="DELETE FROM table_booking WHERE Booking_ID=".$_GET['id'].";";

if (mysqli_affected_rows($conn)>0){
    echo "<script>alert('The booking is removed!');window.history.go(-1);</script>";
    echo "<script>window.location.href='ViewBookingHistory.php'</script>";
}
?>