<?php
    session_start();
    $user_id = $_SESSION['User_ID'];
    $booking_id = $_GET['id'];
    $cust_name = $_POST['cust_name'];
    $booking_date = $_POST['booking_date'];
    $booking_time = $_POST['booking_time'];
    $contact_number = (String)$_POST['contact_number'];
    $table_id = $_POST['table_id'];

    date_default_timezone_set("Singapore");
    $current_date = date('Y-m-d');
    $current_time = date('H:i:s');

    include "connectdb.php";
    if(empty($table_id)){
         die("<script>alert('Please select at least one table!');window.history.go(-1);</script>");
    }
    if ($booking_date < $current_date) {
        echo "<script>alert('There is a mistake with your booking date!');window.location.href='EditBooking.php?id=".$booking_id."';</script>";
    } elseif ($booking_date == $current_date && $booking_time < $current_time) {
        echo "<script>alert('There is a mistake with your booking time!');window.location.href='EditBooking.php?id=".$booking_id."';</script>";
    } else {

        $y = implode("", (array) $table_id); //change array to string

        $check_tableid = rtrim($y, ",");
        $sql = "SELECT b.Booking_ID, b.Booking_Date, b.Booking_Time, GROUP_CONCAT(bt.Table_ID) FROM bookings b, table_booking bt WHERE b.Booking_ID = bt.Booking_ID AND NOT b.Booking_ID = '" . $booking_id . "' AND Booking_Date = '" . $booking_date . "' AND Table_ID IN (" . $check_tableid . ") AND Booking_Time BETWEEN SUBTIME('" . $booking_time . "', '0:15:0') AND ADDTIME('" . $booking_time . "', '0:15:0') GROUP BY b.Booking_ID;";
        $result = mysqli_query($conn, $sql);

        //Check the table are booked by other customers or not at the booking time and date
        //If not, update the record in bookings, detele the record in booked_table and insert a new record into the booked_table with the booking_id
        
        if (mysqli_num_rows($result) <= 0) {
            $sql4 = "DELETE FROM table_booking WHERE Booking_ID ='" . $booking_id . "';";
            mysqli_query($conn, $sql4);

            $sql1 = "UPDATE bookings SET ".
            "Cust_Name='".$cust_name."' , ".
            "Booking_Date ='".$booking_date."' , ".
            "Booking_Time ='".$booking_time."' , ".
            "Contact_Number='".$contact_number."' , ".
            "User_ID='".$user_id."' WHERE Booking_ID = '".$booking_id."';";

            mysqli_query($conn, $sql1);

            $count = count($table_id);
            for ($i = 0; $i < $count; $i++) {
                $table_id[$i];

                $sql3 = "INSERT INTO table_booking(Booking_ID, Table_ID) VALUES ('" . $booking_id . "', '" . $table_id[$i] . "');";
                mysqli_query($conn, $sql3);
            } //for loop
            if (mysqli_affected_rows($conn) > 0) {
                echo "<script>alert('The booking is updated successully.');window.location.href='EditBooking.php?id=".$booking_id."';</script>";
            } //if(mysqli_affected_rows($conn)>0)
            elseif(mysqli_affected_rows($conn)<=0) {
                die("<script>alert('Fail: The booking record is not updated!');window.location.href='EditBooking.php?id=".$booking_id."';</script>");
            } //else
        } else { // show the table id from other booking records which their booking time is closed to the current booking's booking time
            while ($rows = mysqli_fetch_array($result)) {

                $z = $rows['GROUP_CONCAT(bt.Table_ID)'];
            }
            echo "<script>alert('The table " . $z . " is booked by other customers!');window.location.href='UpdateBooking.php?id=".$booking_id."';</script>";
        }
    }

    ?>