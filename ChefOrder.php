<?php
include "ChefHeader.php";
include "connectdb.php";
if(isset($_SESSION['User_ID'])) {
    $sql = "SELECT Name, Email, PhoneNumber, Position, Password, SecurityQs1, SecurityQs2, SecurityQs3 FROM user WHERE User_ID = '{$_SESSION['User_ID']}'";
    $results = mysqli_query($conn,$sql);
    if(mysqli_num_rows($results) > 0){
        $row = mysqli_fetch_assoc($results);
        $row['Name'];
        $row['Email'];
        $row['PhoneNumber'];
        $row['Position'];
        $row['Password'];
        $row['SecurityQs1'];
        $row['SecurityQs2'];
        $row['SecurityQs3'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef Orders</title>
<style>



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
    .card:nth-child(7){
        animation:fadeIn .5s 0.5s backwards;
    }

    .card:nth-child(8){
        animation:fadeIn .5s 0.5s backwards;
    }
    .card:nth-child(9){
        animation:fadeIn .5s 0.5s backwards;
    }
    .card:nth-child(10){
        animation:fadeIn .5s 0.5s backwards;
    }
    .card:nth-child(11){
        animation:fadeIn .5s 0.5s backwards;
    }
    .card:nth-child(12){
        animation:fadeIn .5s 0.5s backwards;
    }

    .card:hover{
        transform: scale(0.9);
    }
}

a{
    text-decoration:none;
    
}

button {  
    background-color: lightblue;  
    color: black;  
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
.btn3{
    width:15vw;
    font-family: 'Oleo Script';
    padding: 1rem 2.5rem;
    background-color:#0B0742;
    border-radius: 2rem;
    margin: 1rem 0;
    text-transform:uppercase;
    color: #fdc094;
    font-size: 1.4rem;
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
<body style="background-color: #EDF6F9;">



<?php

$sql="SELECT OrderItem_ID, Item_ID,  Order_ID, Item_Name, Comments, OrderedItem_Status, Quantity from order_item where OrderedItem_Status ='cooking'";
$result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)<=0){
        echo "<script>alert('There are no Orders.');</script>";
        echo "<script>window.location.href='ChefHome.php';</script>";
    }

    else{
    echo"

<div class='text'>

        <h2>Order Notification</h2>

        <center>
        <a href='ChefHome.php'><input type='button' value='Back' class='btn3'></a>
        </center>
</div>

<section>
<div class='card-wrapper'>
    ";

    while($rows=mysqli_fetch_array($result)){
        if ($rows['OrderedItem_Status']== 'Cooking'){
        echo"

        <div class='card'>
        <center>
        <h3>Ordered Item ID:</td><td>".$rows['OrderItem_ID']."</h3>
        <table>
            <tr><td>Item Name:</td><td>".$rows['Item_Name']."</td></tr>
            <tr><td>Quantity:</td><td>".$rows['Quantity']."</td></tr>
            <tr><td>Comments:</td><td>".$rows['Comments']."</td></tr>
        </table>
        <a href='OrderDone.php?OrderItem_ID=".$rows['OrderItem_ID']."'><div class='btn'>Done</div></a>
        <center>
        </div>

    ";
                }
                else
                {}
}
    echo"</div>
    </section>
    </div>
    ";
}

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