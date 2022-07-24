<?php
include "connectdb.php";

$orderID = $_GET['OrderItem_ID'];
$confirm ="UPDATE order_item SET OrderedItem_Status='Order Complete' WHERE OrderItem_ID=".$orderID;
$run=mysqli_query($conn,$confirm);

if(mysqli_affected_rows($conn)<0)
    {
        
        echo "<script>alert('Cannot update data!');</script>";
        echo "<script>window.location.href='ManagerHome.php';</script>";
            }
else {
    echo "<script>alert('Successfuly to update data!');</script>";
    echo "<script>window.location.href='ManagerHome.php';</script>";
}



?>