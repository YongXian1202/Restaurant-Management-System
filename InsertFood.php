<?php
$item_name=$_POST['item_name'];
$price=$_POST['price'];
$availability=$_POST['availability'];
$mainid = $_POST['category'];
$display = $_POST['display'];



$target_dir = "Menu/"; 
$target_file = $target_dir . basename($_FILES["photo"]["name"]); 

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 

$check = getimagesize($_FILES["photo"]["tmp_name"]); 
if($check !== false)  {  
    echo "<script>alert('File is an image - " 
    . $check["mime"] . ".');</script>"; }  
else  { 
    echo "<script>alert('File is not an image.Please try again!');</script>";  
    die("<script>window.history.go(-1);</script>"); } 

if (file_exists($target_file)) {
    echo "<script>alert('Sorry, file already exists.');window.history.go(-1);</script>"; 
}

else{

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ){  
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.Please try again!');</script>";  
        die("<script>window.history.go(-1);</script>"); } 
     
    if (! move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)){  
     } 
     
    echo "<script>alert('The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.');</script>"; 

include "connectdb.php";
session_start();
$sql = "INSERT into item (Item_Name, Price, Availability, Image, Display, Main_ID, User_ID) VALUES ('$item_name', '$price', '$availability', '$target_file', '$display','$mainid', '1');"; //$_SESSION['User_ID']
mysqli_query($conn,$sql);

if(mysqli_affected_rows($conn)<=0){
    die("<script>alert('Fail to add the food!');window.history.go(-1);</script>");
}
else{
    echo "<script>alert('Successfully add the food!');window.location.href='EditMenuDetails.php';</script>";
}
}
?>