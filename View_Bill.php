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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>View Bill</title>
<style>
    body{
    background-image: url();
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-color: #EDF6F9;
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
    font-family: 'Oleo Script';
    padding: 1.5rem 2.5rem;
    background-color:#0B0742;
    border-radius: 2rem;
    margin: 1rem 0;
    text-transform:uppercase;
    font-size: 1.5rem;
    align-items: center;
    align-content: center;
}  

button {  
    background-color: lightblue;  
    color: black;  

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

.img{
    background-image:url(Bill.jpg);
    min-height: 65%;
}

.img{
    position: relative;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

.title1{
    color: black;
    margin-top:4vw;
    margin-bottom:4vw;
    font-size: 6vw;
    font-family: 'Oleo Script';
}

.insert{
	border:0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #0B0742;
    padding:14px 10px;
    width:10vw;
    outline:none;
    color: black;
    border-radius: 24px;
	transition: 0.25s;
	cursor: pointer;
}

.insert:hover{
	background: #5E72EB;
}

a{
    text-decoration:none;
}
.container {  
    width:20vw;
    font-family: 'Oleo Script';
    padding: 1.5rem 2.5rem;
    background-color:#0B0742;
    border-radius: 2rem;
    margin: 1rem 0;
    text-transform:uppercase;
    font-size: 1.5rem;
    align-items: center;
    align-content: center;
}  

button {  
    background-color: lightblue;  
    color: black;  

} 
.btn3{
    width:12vw;
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
</style>
</head>

<body>
<div class="img">
    <div class="text">
            VIEW BILL
    </div>
</div>
<center>
	<?php
		include "connectdb.php";
		$id = $_GET['id'];
		$sql = "Select Item_ID, Item_Name, Comments, OrderedItem_Status, Price, Quantity, Amount from order_item where Order_ID = $id Order By Item_ID ASC";
		$result = mysqli_query($conn, $sql);
		
     	echo "<table class='table table-bordered table-striped'>";
        echo "<thead>";
     	echo "<tr>";
     	echo "<th>Item Id</th>";
     	echo "<th>Item Name</th>";
     	echo "<th>Comments</th>";
     	echo "<th>Ordered Item Status</th>";
     	echo "<th>Price</th>";
     	echo "<th>Quantity</th>";
     	echo "<th>Amount</th>";
     	echo "</tr>";
        echo "</thead>";

        echo "<tbody>";
        
        while ($rows = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>".$rows['Item_ID']."</td>";
        echo "<td>".$rows['Item_Name']."</td>";
        echo "<td>".$rows['Comments']."</td>";
        echo "<td>".$rows['OrderedItem_Status']."</td>";
        echo "<td>".$rows['Price']."</td>";
        echo "<td>".$rows['Quantity']."</td>";
        echo "<td>".$rows['Amount']."</td>";
	    echo "</tr>";
        }
        echo "</table>";
	
	?>

	<a href="GenerateBill.php"><button class="btn3" style="color:#fdc094">Back</button></a>

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