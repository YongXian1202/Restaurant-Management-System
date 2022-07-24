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
    <title>Book Table</title>
    <style>

body{
    background-image: url();
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-color: #EDF6F9;
}

.img1{
    position: relative;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

.section{
    text-align:center;
    padding: 50px 80px;
}

.section-light{
    background-color:#EDF6F9;
    columns: #666;
}

section{
    padding:10rem 0;
    background-color: #fff;
}

.img{
    background-image:url(Tables.jpg);
    min-height: 65%;
    position: relative;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
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
	width: 32rem;
	border-radius: 24px;
  background-color:#ebeef8;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin:2rem 0;
	box-shadow: .5rem .5rem 3rem rgba(0,0,0,0.2);
	padding-top: 3vh;
	padding-bottom: 3vh;
}

.card .card-img{
    width:100%;
    height:26rem;
    object-fit: cover;
    -webkit-clip-path: polygon(0 0, 100% 0%, 100% 100%, 0 70%);
    clip-path: polygon(0 0, 100% 0%, 100% 100%, 0 70%);
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
        animation:fadeIn .5s .5s backwards;
    }
}

input[type = "button"], input[type = "submit"]{
	width:9vw;
	height:4vw;
	font-family: 'Oleo Script';
    background-color:#0B0742;
    border-radius: 2rem;
    margin: 0.25rem 0;
    text-transform:uppercase;
    color: #fdc094;
    font-size: 1.4rem;
    align-items: center;
    align-content: center;
}

input[type = "button"]:hover, input[type = "submit"]:hover{
    transform: translateY(-2px);
    box-shadow:.5rem .5rem 2rem rgba(0,0,0,.2)
}

input[type = "button"]:active, input[type = "submit"]:active{
    transform:translateY(0);
    box-shadow: none;
}

.addfood{
  margin-bottom: 1vw;
	border-collapse: collapse;
	border-radius: 24px;
	font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
	text-transform:uppercase;
}

.addfood td{
    padding-top: 5px;
}
          
.addfood tr:hover {
	background-color: #FDC094;
	transition:0.25s;
}

.addfood input[type = "text"],.addfood input[type = "tel"], .addfood input[type = "time"], .addfood input[type = "date"]{
    border:0;
    background: none;
		display: block;
		margin: 1vw;
    text-align: center;
    border: 3px solid #FF9190;
    padding:9px 10px;
    width:160px;
    outline:none;
    color: black;
    border-radius: 24px;
		transition: 0.25s;
		position: sticky;
  }
    </style>
</head>
<body>


    <?php
include "connectdb.php";
    //$user_id = $_SESSION['User_ID'];
    $booking_id = $_GET['id'];
    $sql="Select b.Booking_ID, b.Cust_Name, b.Booking_Date, b.Booking_Time, b.Contact_Number, GROUP_CONCAT(bt.Table_ID) FROM bookings b, table_booking bt WHERE b.Booking_ID = bt.Booking_ID AND b.Booking_ID = '$booking_id' GROUP BY b.Booking_ID;";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)<=0){
        echo "<script>alert('There's no data for this booking.');window.location.href='ViewBookingHistory.php';</script>";
    }
    else{
    while($rows=mysqli_fetch_array($result)){
        $booking_date=$rows['Booking_Date'];
        $booking_time=$rows['Booking_Time'];
        $cust_name=$rows['Cust_Name'];
        $contact_number=$rows['Contact_Number'];
        $table_id=$rows['GROUP_CONCAT(bt.Table_ID)']; // IN STATEMENT
    }
    }
    ?>
    <section class="section section-light">
        <div class="card-wrapper">
          <div class="card">
    <center>
    <h1>Edit Table Booking</h1>
    <form action="<?php echo "EditBookingScript.php?id=".$booking_id ; ?>" method="post">
    <table align="center" class="addfood">
   <tr><th>Customer Name</th><td><input type="text" name="cust_name" value="<?php echo $cust_name;?>"required></td>     
   <tr><th>Booking Date</th><td> <input type="Date" name="booking_date" value="<?php echo $booking_date;?>" required></td></tr>
   <tr><th>Booking Time</th><td> <input type="time" name="booking_time" format="hh:mm" min="0900" max="2100" value="<?php echo $booking_time;?>" required></td></tr>
   <tr><th>Contact Number</th><td> <input type="text" name="contact_number" pattern="(601)[0-9]{8,9}$" title="Example: 60123456789/601234567890" value="<?php echo $contact_number;?>" required><td></tr>
   <tr><th rowspan="4">Table Number</th><td>
   
   <?php

   $sql1="SELECT Table_ID FROM tables;";
   $result1=mysqli_query($conn,$sql1);
   $limit=3;
   $count=0;

       while($rows=mysqli_fetch_array($result1)){
           $show_tables = $rows['Table_ID'];
       ?>

        <input type="checkbox" name="table_id[]" value="<?php echo $show_tables;?>,"
        <?php
        $sql2="SELECT * FROM table_booking  WHERE Booking_ID='".$booking_id."' AND Table_ID IN($table_id);";
        $result2=mysqli_query($conn,$sql2);

        while($row=mysqli_fetch_array($result2)){
        if($show_tables == $row['Table_ID']){ 
            echo " checked='checked'";
        }else{}
    }
        

?>><?php echo $show_tables;
if($count==$limit){
    echo "<br/>";
    $count=-1;
}
$count++;

}?></td></tr>
</table>
   <table>
   <tr><td><input type="submit" id='btnSubmit' value="Update"></td> <td><a href="Staff_ViewBookingHistory.php"><input type="button" value="Back"></a></td></tr>
    </table>
    </center>
    </form>
</div>
</div>
</section>
</body>
</html>
<?php
}
else{
    header("Location: login.php");
    exit();
}
?>