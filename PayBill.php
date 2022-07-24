<?php
    include "connectdb.php";
if($_POST['balance']<0){
    echo die("<script>alert('The payment amount is not sufficient!');window.history.go(-1);</script>");
    }
    
    session_start();
    $date=$_POST['date'];
    $time=$_POST['time'];
    $order_type=$_POST['order_type'];
    $total_amount=$_POST['amount'];
    $gst=$_POST['GST'];
    $discount=$_POST['discountamount'];
    $actual_amount=$_POST['actual_amount'];
    $customer_pay=$_POST['customer_pay'];
    $balance=$_POST['balance'];
    $paying_method=$_POST['paying_method'];
    $table_id=$_POST['table_id'];
    $user_id=$_SESSION['User_ID'];
    $order_id=$_POST['order_id'];

if(!empty($discount)){
    $discount=$_POST['discountamount'];

$sql1="Update tables SET Table_Status='Free' where Table_ID='".$table_id."';";
$result1=mysqli_query($conn,$sql1);

$sql="Update orders SET ".
"Date='".$date."' ".
",Time='".$time."' ".
",Order_Type='".$order_type."' ".
",Total_Amount='".$total_amount."' ".
",GST='".$gst."' ".
",Discount='".$discount."' ".
",Actual_Amount='".$actual_amount."' ".
",Customer_Pay='".$customer_pay."' ".
",Balance='".$balance."' ".
",Paying_Method='".$paying_method."' ".
",Table_ID='".$table_id."' ".
",User_ID='".$user_id."' ". 
"Where Order_ID='".$order_id."';";

$result=mysqli_query($conn,$sql);


if(mysqli_affected_rows($conn)<=0){
"<script>alert('The data is not stored!');window.history.go(-1);</script>";
echo $sql;

}
else{
    echo "<script>alert('Successfully Updated!');window.location.href='TableOrder.php';</script>";

}

}
else{// (else the discount is empty)

$sql1="Update tables SET Table_Status='Free' where Table_ID='".$table_id."';";
$result1=mysqli_query($conn,$sql1);

$sql="Update orders SET ".
"Date='".$date."' ".
",Time='".$time."' ".
",Order_Type='".$order_type."' ".
",Total_Amount='".$total_amount."' ".
",Discount= NULL ".
",Actual_Amount='".$actual_amount."' ".
",Customer_Pay='".$customer_pay."' ".
",Balance='".$balance."' ".
",Paying_Method='".$paying_method."' ".
",Table_ID='".$table_id."' ".
",User_ID='".$user_id."' ". 
"Where Order_ID='".$order_id."';";

$result=mysqli_query($conn,$sql);

$sqlorderstatus = "UPDATE order_item SET OrderedItem_Status = 'Order Completed' WHERE Order_ID='".$order_id."'";
$resultOrder=mysqli_query($conn,$sqlorderstatus);


if(mysqli_affected_rows($conn)<=0){
"<script>alert('The data is not stored!');window.history.go(-1);</script>";
echo $sql;

}
else{
    echo "<script>alert('Successfully Updated!');window.location.href='TableOrder.php';</script>";

}

}




?>