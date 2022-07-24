<?php
include "connectdb.php";
session_start();
$user_id = $_SESSION['User_ID'];
$cust_name = $_POST['cust_name'];
$booking_date = $_POST['booking_date'];
$booking_time = $_POST['booking_time'];
$contact_number = $_POST['contact_number'];
$table_id = $_POST['table_id'];

date_default_timezone_set("Singapore");
$current_date = date('Y-m-d');
$current_time = date('H:i:s');

if($booking_date<$current_date){
    echo "<script>alert('There is a mistake with your booking date!');window.history.go(-1);</script>";
}
    elseif($booking_date==$current_date && $booking_time < $current_time )
    {
    echo "<script>alert('There is a mistake with your booking time!');window.history.go(-1);</script>";
}
else{

$y= implode("", (array)$table_id);//change array to string

$check_tableid = rtrim($y, ",");

    $sql = "SELECT b.Booking_ID, b.Booking_Date, b.Booking_Time, GROUP_CONCAT(table_booking.Table_ID) FROM bookings b, table_booking tb WHERE b.Booking_ID = tb.Booking_ID AND Booking_Date = '" . $booking_date . "' AND Booking_Time BETWEEN ADDTIME('" . $booking_time . "', '-0:15:0') AND ADDTIME('" . $booking_time . "', '0:15:0') AND Table_ID IN (" . $check_tableid . ") GROUP BY Booking_ID;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) <= 0) {
        $sql1 = "INSERT INTO bookings (Cust_Name, Booking_Date, " .
            "Booking_Time, Contact_Number, User_ID)" .
            "VALUES ('$cust_name', '$booking_date', '$booking_time'," .
            "'$contact_number', '$user_id');";
        mysqli_query($conn, $sql1);

        $count = count($table_id);
        for ($i = 0; $i < $count; $i++) {
            $table_id[$i];
            $check_tableid1 = rtrim($table_id[$i], ",");
            $sql2 = "SELECT Booking_ID FROM bookings ORDER BY Booking_ID DESC LIMIT 1;";
            $result2 = mysqli_query($conn, $sql2);
            while ($rows = mysqli_fetch_array($result2)) {
                $booking_id = $rows['Booking_ID'];
            }

            
            $sql3 = "INSERT INTO table_booking(Booking_ID, Table_ID) VALUES ('" . $booking_id . "', '" . $check_tableid1. "');";
            mysqli_query($conn,$sql3);
        } //for loop
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('The booking is made successully.');window.history.go(-1);</script>";
            
        } //if(mysqli_affected_rows($conn)>0)
        else {
            //die("<script>alert('Fail: Unable to insert the booking record!');window.history.go(-1);</script>");
           echo $sql3;
        } //else
    } else {
        while ($rows = mysqli_fetch_array($result)) {
            
                $z = $rows['GROUP_CONCAT(tb.Table_ID)'];
        }
        echo "<script>alert('The table ".$z." is booked by other customers!');window.history.go(-1);</script>";
    }
}
?>