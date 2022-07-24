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
    <title>Manager's Service</title>
    
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
    width: 25%;
    height: 25%;
    background-color:#ebeef8;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin:5%;
    box-shadow: .5rem .5rem 3rem rgba(0,0,0,0.2);
    font-family: 'Oleo Script';
}

.card .card-img{
    width:100%;
    height:16rem;
    object-fit: cover;
    -webkit-clip-path: polygon(0 0, 100% 0%, 100% 100%, 0% 100%);
    clip-path: polygon(0 0, 100% 0%, 100% 100%, 0% 100%);
}

.card h1{
    font-size:2rem;
    color: #333;
    margin:2%;
}

.about{
    font-size: 1.5rem;
    margin:2%;
    font-style: normal;
    text-align:center;
    color: #333;
    padding-right: 2%;
    padding-left: 2%;
}

.card .btn{
    padding: 1rem 1.5rem;
    background-color:#0B0742;
    border-radius: 2rem;
    margin: 1rem 0;
    text-transform:uppercase;
    color: #fdc094;
    font-size: 1.2rem;
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
</style>
</head>
<body>





<?php
include "connectdb.php";



?>


<div class="img1">
<div class="text">
    <h2>Manager's Service</h2>        

</div>
</div>

    <section>
    <div class="card-wrapper">
            <div class="card">
                <img src="image/editmenu.jfif" alt="card backgroud" class="card-img">
                <h1>Edit Menu</h1>
                <p class="about">
                    Edit the Current Menu
                </p>
                <a href="EditMenu.php"><div class="btn">Edit Menu</div></a>
            </div>

            <div class="card">
                <img src="image/TableOrder.jpg" alt="card backgroud" class="card-img">
                <h1>Table Order</h1>
                <p class="about">
                    Places order for a table
                </p>
                <a href="TableOrder.php"><div class="btn">Table Order</div></a>
            </div>

            <div class="card">
                    <img src="image/generateReport.jpg" alt="card backgroud" class="card-img">
                    <h1>Generate Report</h1>
                    <p class="about">
                        Generate progress report
                    </p>
                    <a href="GenerateReportMenu.php"><div class="btn">Generate Report</div></a>
                </div>


    </div>

    </section>
    


    <section>
        <div class="card-wrapper">
                
    
                <div class="card">
                    <img src="image/generateBill.jpg" alt="card backgroud" class="card-img">
                    <h1>Generate Bill</h1>
                    <p class="about">
                        Generate Order History
                    </p>
                    <a href="GenerateBill.php"><div class="btn">Generate Bill</div></a>
                </div>
    
                <div class="card">
                    <img src="image/manageUsers.jpg" alt="card backgroud" class="card-img">
                    <h1>Manage Users</h1>
                    <p class="about">
                        Manage Staffs Profile
                    </p>
                    <a href="ManageUsers.php"><div class="btn">Manage Users</div></a>
                </div>

                <div class="card">
                <img src="image/editprofilechef.jpg" alt="card backgroud" class="card-img">
                <h1>Edit Profile</h1>
                <p class="about">
                    Edit personal details
                </p>
                <a href="ManagerProfile.php"><div class="btn">Edit Profile</div></a>
            </div>
        </div>
    
        
        </section>
<?php
$sql="SELECT order_item.Order_ID, order_item.OrderItem_ID, order_item.Item_ID, order_item.Item_Name, order_item.Comments, order_item.OrderedItem_Status, order_item.Quantity, orders.Table_ID from order_item, orders where order_item.Order_ID = orders.Order_ID AND OrderedItem_Status ='Done Cooking';";
$result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)<=0){
        echo "<script>alert('There are no Orders.');</script>";
        
    }
        
    else{
    echo"    
    
    <div class='text'>
    
        <h2>Kitchen Progress Notification</h2>
        
</div>
    
    <section>
    <div class='card-wrapper'>";
                
    while($rows=mysqli_fetch_array($result)){
        if ($rows['OrderedItem_Status']== 'Done Cooking'){
        echo"
        <div class='card'>
        <center>
        <h3 style='padding-top:10px;'>Ordered Item Status:</td><td>".$rows['OrderedItem_Status']."</h3>
        <table>
            <tr><td>Item Name:</td><td>".$rows['Item_Name']."</td></tr>
            <tr><td>Quantity:</td><td>".$rows['Quantity']."</td></tr>
            <tr><td>Comments:</td><td>".$rows['Comments']."</td></tr>
            <tr><td>Table:</td><td>".$rows['Table_ID']."</td></tr>
        </table>
        <a href='ManagerOrderDone.php?OrderItem_ID=".$rows['OrderItem_ID']."'><div class='btn'>Done</div></a>
        </center>
        </div>";
        
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





        <!-- <section>
    <div class="card-wrapper">
            <div class="card">
                <p class="about">
                Ordered Item Status:</td><td>".$rows['OrderedItem_Status']."<br>
                Item Name:</td><td>".$rows['Item_Name']."<br>
                Quantity:</td><td>".$rows['Quantity']."<br>
                Comments:</td><td>".$rows['Comments']."<br>
                Table:</td><td>".$rows['Table_ID']."<br>
                </p>
                <a href="OrderDone.php"><div class="btn">View Menu</div></a>
            </div>
    </div>

    </section> -->
</body>
</html>
<?php
}
else{
    header("Location: login.php");
    exit();
}
?>