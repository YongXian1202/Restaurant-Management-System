<?php
include "ManagerHeader.php";
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
    <title>View Booking History</title>
    <style>
    .greport{
	border-collapse: collapse;
	width:90%;
}

.greport td, .manageusers th{
    padding: 8px;
}

.greport tr{
    background-color: #dedede;
}
          
.greport tr:hover {
	background-color: #FDC094;
	transition:0.25s;
}
          
.greport th {
	padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #FF9190;
    color: white;
}

body {
	background-color: lavenderblush;
	font-family: Arial;
	color: #211a1a;
	font-size: 0.9em;
}

.img1{
	position: relative;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
	min-height: 65%;
	background-image: url(TakingOrder.jpg);
}

.text{
	font-family: 'Oleo Script';
    position:absolute;
    top:50%;
    width:100%;
    text-align:center;
    color:#000;
    font-size:27px;
    letter-spacing:8px;
    text-transform: uppercase;
}

.text .border{
    background-color:#0B0742;
    color:#fdc094;
    padding:20px;
    
}

.text .border.trans{
    background-color:  transparent;
}

input[type = "submit"]{
	width:9vw;
	height:4vw;
	font-family: 'Oleo Script';
    background-color:#0B0742;
    border-radius: 2rem;
    margin-bottom:2vw;
    text-transform:uppercase;
    color: #fdc094;
    font-size: 1.4rem;
    align-items: center;
    align-content: center;
}

input[type = "submit"]:hover{
    transform: translateY(-2px);
    box-shadow:.5rem .5rem 2rem rgba(0,0,0,.2)
}

input[type = "submit"]:active{
    transform:translateY(0);
    box-shadow: none;
}

button{
	width:10vw;
	height:4vw;
	font-family: 'Oleo Script';
    background-color:#0B0742;
    border-radius: 2rem;
    margin-bottom:2vw;
    text-transform:uppercase;
    color: #fdc094;
    font-size: 1.4rem;
    align-items: center;
    align-content: center;
}

button:hover{
    transform: translateY(-2px);
    box-shadow:.5rem .5rem 2rem rgba(0,0,0,.2)
}

button:active{
    transform:translateY(0);
    box-shadow: none;
}

input[type = "button"]{
	width:18vw;
	height:4vw;
	font-family: 'Oleo Script';
    background-color:#0B0742;
    border-radius: 2rem;
    margin-bottom:2vw;
    text-transform:uppercase;
    color: #fdc094;
    font-size: 1.4rem;
    align-items: center;
    align-content: center;
}

input[type = "button"]:hover{
    transform: translateY(-2px);
    box-shadow:.5rem .5rem 2rem rgba(0,0,0,.2)
}

input[type = "button"]:active{
    transform:translateY(0);
    box-shadow: none;
}

</style>
</head>
<body>
<div class="img1">
<div class="text">
        <span class="border">
            Order
        </span>
</div>
</div>

<div>
<center>
    <h1>Search</h1>
    <script>
function search(){
    var x = document.getElementById("search_date").value;
    if(x===""){
        alert("Please enter a search date!");
    }
}
</script>
    <form action="BookingHistory.php" method="post">
    Select a date to search booking: <input type ="date" name="search_date" id="search_date">
    <input type="submit" value="Search" onclick="search()"/>    
    </form>
    <?php
    include "connectdb.php";
    if(!empty($_POST["search_date"])){
        $search_date=$_POST["search_date"];
        $sql1="Select b.Booking_ID, b.Customer_Name, b.Booking_Date, b.Booking_Time, b.Contact_Number, GROUP_CONCAT(bt.Table_ID) from bookings b, booked_table bt where b.Booking_ID = bt.Booking_ID AND Booking_Date = '".$search_date."' GROUP BY Booking_ID ORDER BY b.Booking_Time ASC;";
        $result1=mysqli_query($conn,$sql1);

        if(mysqli_num_rows($result1)<=0){
            echo "No booking on ".$search_date."!";
            
        }
else{
    ?>
    <center>
        <table class='greport'>
            <tr><th>Booking ID</th><th>Customer Name</th><th>Booking Date</th><th>Booking Time</th><th>Contact Number</th><th>Table</th><th>Edit</th><th>Delete</th></tr>
    <?php
        while($rows=mysqli_fetch_array($result1)){
            echo "<tr>";
            echo "<td>".$rows['Booking_ID']."</td>";
            echo "<td>".$rows['Customer_Name']."</td>";
            echo "<td>".$rows['Booking_Date']."</td>";
            echo "<td>".$rows['Booking_Time']."</td>";
            echo "<td>".$rows['Contact_Number']."</td>";
            echo "<td>".$rows['GROUP_CONCAT(bt.Table_ID)']."</td>";
            echo "<td><a href='UpdateBooking.php?id=".$rows['Booking_ID']."'><button>Edit</button></a></td>";
            echo "<td><a href='DeleteBooking.php?id=".$rows['Booking_ID']."'><button>Complete</button></a></td>";
            echo "</tr>";
        }
    }
 }

        ?>
    </table>

        <h1>Booking History</h1>
        <div class="test">
            
            <?php
            include "connectdb.php"; 
            date_default_timezone_set("Singapore");  
            $current_date = date("Y/m/d");
            $sql="Select b.Booking_ID, b.Customer_Name, b.Booking_Date, b.Booking_Time, b.Contact_Number, GROUP_CONCAT(bt.Table_ID) from bookings b, booked_table bt where b.Booking_ID = bt.Booking_ID AND Booking_Date = '".$current_date."' GROUP BY Booking_ID ORDER BY b.Booking_Time ASC;";
            $result=mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)<=0){
                echo "<h3>No Booking for today!";
                echo $current_date;
                
            }
            else{
?>

<table class='greport'>
            <tr><th>Booking ID</th><th>Customer Name</th><th>Booking Date</th><th>Booking Time</th><th>Contact Number</th><th>Table</th><th>Edit</th><th>Delete</th></tr>
            <?php
            while($rows=mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$rows['Booking_ID']."</td>";
                echo "<td>".$rows['Customer_Name']."</td>";
                echo "<td>".$rows['Booking_Date']."</td>";
                echo "<td>".$rows['Booking_Time']."</td>";
                echo "<td>".$rows['Contact_Number']."</td>";
                echo "<td>".$rows['GROUP_CONCAT(bt.Table_ID)']."</td>";
                echo "<td><a href='UpdateBooking.php?id=".$rows['Booking_ID']."'><button>Edit</button></a></td>";
                echo "<td><a href='DeleteBooking.php?id=".$rows['Booking_ID']."'><button>Complete</button></a></td>";
                echo "</tr>";
            }
        }
            ?>
        </table>
    </center>
        </div>
    </center>
        </div>
        <center>
        <a href="BookTable.php"><input type="button" value="Add Table Bookings"></a><a href="TableStatus.php"><input type="button" value="Change Table Status"></a><a href="TableOrder.php"><input type="button" value="Back"></a>
        </center>
    </body>    
</html>
<?php
}
else{
    header("Location: login.php");
    exit();
}
?>