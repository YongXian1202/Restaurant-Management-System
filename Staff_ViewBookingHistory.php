<?php
include "StaffHeader.php";
include "connectdb.php";
if(isset($_SESSION['User_ID'])) {
    $sql = "SELECT Name FROM user WHERE User_ID = '{$_SESSION['User_ID']}'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $row['Name'];
        
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Booking List</title>
    
    <style>
    body{
    background-image: url();
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-color: #EDF6F9;
}

.img1{
    min-height: 45%;
}

.text{
    position:relative;
    top:30%;
    width:100%;
    text-align:center;
    color:#000;
    font-size:27px;
    letter-spacing:8px;
    text-transform: uppercase;
    font-family: 'Oleo Script';
    padding:50px;

}

.text .border{
    background-color:#EDF6F9;
    padding:20px;
    
}

.text .border.trans{
    background-color:  transparent;
}

.card-wrapper{
    display:flex;
    align-items: center;
    align-content: center;
    flex-direction: column;
}

.card{
    width: 25vw;
    background-color:#ebeef8;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin:2rem 0;
    box-shadow: .5rem .5rem 3rem rgba(0,0,0,0.2);
    font-family: 'Oleo Script';
}

.card .card-img{
    width:100%;
    height:26rem;
    object-fit: cover;
    -webkit-clip-path: polygon(0 0, 100% 0%, 100% 100%, 0% 100%);
    clip-path: polygon(0 0, 100% 0%, 100% 100%, 0% 100%);
}

.card h1{
    font-size:2.5rem;
    color: #333;
    margin:1.5rem 0;
}

.about{
    font-size: 1.5rem;
    margin:1.5rem 0;
    font-style: normal;
    text-align:center;
    color: #333;
    padding-right: 1vw;
    padding-left: 1vw;
}

.card .btn{
    padding: 1rem 2.5rem;
    background-color:#0B0742;
    border-radius: 2rem;
    margin: 1rem 0;
    text-transform:uppercase;
    color: #fdc094;
    font-size: 1.4rem;
}

.card .popuptext {
    visibility: hidden;
    width: 16vw;
    background-color: #0066ff;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 120%;
    left: 50%;
    margin-left: -8vw;
}

.card .show {
    visibility: visible;
  }

.card .btn:hover{
    transform: translateY(-2px);
    box-shadow:.5rem .5rem 2rem rgba(0,0,0,.2)
}

.card .btn:active{
    transform:translateY(0);
    box-shadow: none;
}

@media screen and (min-width:700px){
.card-wrapper{
    flex-direction: row;
    flex-wrap:wrap;
    justify-content: center;
    align-items: center;
}

.card{
    margin:2rem;
    transition: transform.5s;
}

@keyframes fadeIn{
    from{
        opacity:0;
    }
    to{
        opacity:1;
    }
}
    
.card:nth-child(1){
        animation:fadeIn .5s 0.5s backwards;
    }

    .card:nth-child(2){
        animation:fadeIn .5s 0.5s backwards;
    }

    .card:nth-child(3){
        animation:fadeIn .5s 0.5s backwards;
    }
    .card:nth-child(4){
        animation:fadeIn .5s 0.5s backwards;
    }
    .card:nth-child(5){
        animation:fadeIn .5s 0.5s backwards;
    }
    .card:nth-child(6){
        animation:fadeIn .5s 0.5s backwards;
    }

    .card:hover{
        transform: scale(0.9);
    }
}

a{
    text-decoration:none;
}


.wrapper{
            width: 1000px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
        .btn {
            color:white;
            background-color: #686767;
            border: 1px solid transparent;
            border-radius: 5px;
            padding: .5rem 1rem;
            transition: all .3s;
            float: right
        }

        .btn:hover{
            background-color: rgba(158, 158, 158, 0.87);
            transition: all .3s;
        }
        .container-fluid {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}

.container-fluid > .navbar-header,
.container-fluid > .navbar-collapse {
  margin-right: -15px;
  margin-left: -15px;
}

.container-fluid{
    padding-right: 15px;
    padding-left: 15px;
    border-radius: 6px;
}

.container-fluid:before,
.container-fluid:after{
    display: table;
    content: " ";
}

.container-fluid:after{
    clear: both;
}

.row {
    margin-right: -15px;
    margin-left: -15px;
}

.row:before,
.row:after{
    display: table;
    content: " ";
}

.row:after{
    clear: both;
}

.col-md-12{
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}


table {
    border-spacing: 0;
    border-collapse: collapse;
    border-collapse: collapse !important;
    background-color: transparent;
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
    text-align: center;
}

.table td,
.table th {
  background-color: #fff !important;
  text-align: center;
}

.table > thead > tr > th,
.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > tbody > tr > td,
.table > tfoot > tr > td {
  padding: 8px;
  line-height: 1.42857143;
  vertical-align: top;
  border-top: 1px solid #ddd;
}
.table > thead > tr > th {
  vertical-align: bottom;
  border-bottom: 2px solid #ddd;
}
.table > caption + thead > tr:first-child > th,
.table > colgroup + thead > tr:first-child > th,
.table > thead:first-child > tr:first-child > th,
.table > caption + thead > tr:first-child > td,
.table > colgroup + thead > tr:first-child > td,
.table > thead:first-child > tr:first-child > td {
  border-top: 0;
}
.table > tbody + tbody {
  border-top: 2px solid #ddd;
}
.table .table {
  background-color: #fff;
}

.table-bordered {
    border: 1px solid #ddd;
}

.table-bordered th,
.table-bordered td {
  border: 1px solid #ddd !important;
}

.table-bordered {
    border: 1px solid #ddd;
}

  .table-bordered > thead > tr > th,
  .table-bordered > tbody > tr > th,
  .table-bordered > tfoot > tr > th,
  .table-bordered > thead > tr > td,
  .table-bordered > tbody > tr > td,
  .table-bordered > tfoot > tr > td {
    border: 1px solid #ddd;
}
  .table-bordered > thead > tr > th,
  .table-bordered > thead > tr > td {
    border-bottom-width: 2px;
}
  .table-striped > tbody > tr:nth-of-type(odd) {
    background-color: #f9f9f9;
}


.container {  
    width:20vw;
    height: 5vw;
    font-family: 'Oleo Script';
    padding: 1.5rem 2.5rem;
    background-color:#0B0742;
    border-radius: 2rem;
    margin: 1rem 0;
    text-transform:uppercase;
    font-size: 1rem;
    align-items: center;
    align-content: center;
}  

.btn3{
    width:20vw;
    font-family: 'Oleo Script';
    padding: 1rem 2.5rem;
    background-color:#0B0742;
    border-radius: 2rem;
    margin: 1rem 0;
    text-transform:uppercase;
    color: #fdc094;
    font-size: 1.2rem;
    align-items: center;
    align-content: center;
}

.btn3:hover{
    transform: translateY(-2px);
    box-shadow:.5rem .5rem 2rem rgba(0,0,0,.2)
}

.btn3:active{
    transform:translateY(0);
    box-shadow: none;
}


.btnd {
            color:white;
            background-color: gray;
            border: 1px solid transparent;
            border-radius: 5px;
            padding: .5rem 1rem;
            transition: all .3s;
            text-align: center;

        }
.btnd:hover{
            background-color: rgba(158, 158, 158, 0.87);
            transition: all .3s;
        }

button {  
    color: black;  
} 
</style>
</head>
<body>
<div class="img1">
<div class="text">
        <h2>
            View Booking List
        </h2>
</div>
</div>

<script>
    function searchDate(){
        var x = document.getElementById("date").value;
        if (x === ""){
            alert("Please Insert A Date");
        }
    }
</script>


<section style="text-align: center;">
<form action="Staff_ViewBookingHistory.php" method="POST">

<div>
<label for="date">Date Of Booking</label><br>
<input type="date" name="date" id="date">

<button type="submit" onclick="searchDate()" class="container" style="color:#fdc094; width:10vw; height: 5vw; font-size: 1.0em;">Search</button>

</form>


<section>

<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

<?php
            include "connectdb.php";

            
//get current date
date_default_timezone_set("Singapore");  
$curdate = date("Y/m/d");


// echo "<center><h3>$date $day</h3></center>";
        
	

            $sqlfirst ="Select bookings.Booking_ID, bookings.Cust_Name, bookings.Booking_Date, bookings.Booking_Time, bookings.Contact_Number, GROUP_CONCAT(table_booking.Table_ID) FROM bookings, table_booking where bookings.booking_Id=table_booking.Booking_Id AND Booking_Date = '".$curdate."' GROUP BY Booking_ID ORDER BY bookings.Booking_Time ASC";
			$result=mysqli_query($conn, $sqlfirst);
	

			if(mysqli_num_rows($result) <= 0)
			{
			echo "There is no Booking Today ".$curdate." ";
			}
			else
			{
                echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Booking ID</th>";
                                        echo "<th>Customer Name</th>";
                                        echo "<th>Booking Date</th>";
                                        echo "<th>Booking Time</th>";
                                        echo "<th>Contact Number</th>";
                                        echo "<th>Table</th>";
                                        echo "<th>Edit</th>";
                                        echo "<th>Delete</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($rows = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>".$rows['Booking_ID']."</td>";
                                    echo "<td>".$rows['Cust_Name']."</td>";
                                    echo "<td>".$rows['Booking_Date']."</td>";
                                    echo "<td>".$rows['Booking_Time']."</td>";
                                    echo "<td>".$rows['Contact_Number']."</td>";
                                    echo "<td>".$rows['GROUP_CONCAT(table_booking.Table_ID)']."</td>";
                                    echo "<td><button class='btnd'><a href='Staff_EditBooking.php?id=".$rows['Booking_ID']."'>Edit</a></button></td>";
                                    echo "<td><button class='btnd'><a href='Staff_DeleteBooking.php?id=".$rows['Booking_ID']."'>Complete</a></button></td>";
                                    echo "</tr>";
			}
                        
                                    
			echo "</tr>";
			}
			echo "</table>";

        
?>

</section>

<section>

<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">


<?php

            include "connectdb.php";

                    
            if(!empty($_POST["date"])){
                $date=$_POST["date"];

                
//extract day month year form combined date
$time=strtotime($date);
$day=date("l",$time);
$month=date("m",$time);
$monthFull=date("F",$time);
$year=date("Y",$time);


// echo "<center><h3>$date $day</h3></center>";
        
	

            $sql ="Select bookings.Booking_ID, bookings.Cust_Name, bookings.Booking_Date, bookings.Booking_Time, bookings.Contact_Number, GROUP_CONCAT(table_booking.Table_ID) FROM bookings, table_booking where bookings.booking_Id=table_booking.Booking_Id AND Booking_Date = '".$date."' GROUP BY Booking_ID ORDER BY bookings.Booking_Time ASC";
			$result=mysqli_query($conn, $sql);
	

			if(mysqli_num_rows($result) <= 0)
			{
			echo "no booking on ".$date." ";
			}
			else
			{
                echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>Booking ID</th>";
                                    echo "<th>Customer Name</th>";
                                    echo "<th>Booking Date</th>";
                                    echo "<th>Booking Time</th>";
                                    echo "<th>Contact Number</th>";
                                    echo "<th>Table</th>";
                                    echo "<th>Edit</th>";
                                    echo "<th>Delete</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($rows = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>".$rows['Booking_ID']."</td>";
                                    echo "<td>".$rows['Cust_Name']."</td>";
                                    echo "<td>".$rows['Booking_Date']."</td>";
                                    echo "<td>".$rows['Booking_Time']."</td>";
                                    echo "<td>".$rows['Contact_Number']."</td>";
                                    echo "<td>".$rows['GROUP_CONCAT(table_booking.Table_ID)']."</td>";
                                    echo "<td><button class='btnd' formaction='Staff_EditBooking.php?id=".$rows['Booking_ID']."'>Edit</button></td>";
                                    echo "<td><button class='btnd' formaction='Staff_DeleteBooking.php?id=".$rows['Booking_ID']."'>Complete</button></td>";
                                    echo "</tr>";
			}
                        
                                    
			echo "</tr>";
			}
			echo "</table>";

        }
?>

</section>




<center>
<button class="btn3" style="color:#fdc094" formaction="Staff_BookTable.php">Book Table</button>
<button class="btn3" style="color:#fdc094" formaction="Staff_TableAvailability.php">Table Availability</button>
<button class="btn3" style="color:#fdc094" formaction="Staff_TableOrder.php">Back</button>
</center>

<?php

    include "connectdb.php";
                    
?>
</body>
</html>
<?php
}
else{
    header("Location: login.php");
    exit();
}
?>