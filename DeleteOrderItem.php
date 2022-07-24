<?php
$OrderItem_ID=$_GET['OrderItem_ID'];

include "connectdb.php";

$sql1="Select Order_ID from order_item where OrderItem_ID = '".$OrderItem_ID."';";
$result1=mysqli_query($conn,$sql1);

while($rows=mysqli_fetch_array($result1)){
    $order_id=$rows['Order_ID'];
}

$sql="Delete from order_item where OrderItem_ID='".$OrderItem_ID."' AND OrderedItem_Status='Cooking';";

$result = mysqli_query($conn,$sql);

if (mysqli_affected_rows($conn)<=0){
    
    echo die('<script>alert("The ordered item cannot be cancel!");window.history.go(-1);</script>');
}

else{
$sql2="Select * from order_item where Order_ID = '".$order_id."' ;";
$result2=mysqli_query($conn,$sql2);


if(mysqli_num_rows($result2)<=0){
   $sql3="Delete from orders where Order_ID = '".$order_id."';";
    mysqli_query($conn,$sql3);
    echo "<script>alert('The ordered items is removed!');window.history.go(-1);</script>";
}
else{
    echo "<script>alert('The ordered items is removed!');window.history.go(-1);</script>";
}
}
?>