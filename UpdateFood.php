<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
	<?php
include "connectdb.php";
		
$uid = $_POST['uid'];
$name = $_POST['name'];
$price = $_POST['price'];
$availability = $_POST['availability'];	
$display = $_POST['display'];


$sql = "Update item SET ".
"Item_Name = '$name', ".
"Price = '$price', ".
"Availability= '$availability', ".
"Display = '$display' Where Item_ID = $uid";

mysqli_query($conn, $sql);

		if(mysqli_affected_rows($conn)<=0)
		{
        echo("<script>alert('Cannot Update Items Record!');</script>");
        echo "<script>window.location.href='EditFood.php?id=$uid';</script>";
        
		}
		
		echo "<script>alert('Successful to Update Items Record!');</script>";
		echo "<script>window.location.href='EditFood.php?id=$uid';</script>";
    ?>
</body>
</html>