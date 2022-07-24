<?php
include "StaffHeader.php";
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
    <title>Table Order</title>

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

.button1, .button2,.button3, .button4,.button5{
    border:0;
    font-family:'Oleo Script';
    background: none;
    display: block;
    width:20vw;
    height: 6vw;
    padding: 0.5rem 2.5rem;
    background-color:#0B0742;
    border-radius: 2rem;
    margin: 1rem 0;
    text-transform:uppercase;
    color: #fdc094;
    font-size: 1.4rem;
    align-items: center;
    text-align: center;
    align-content: center;
    outline:none;
    cursor: pointer;
    transition: 0.25s;
}

.button1:hover, .button2:hover,.button3:hover, .button4:hover, .button5:hover{
    transform: translateY(-2px);
    box-shadow:.5rem .5rem 2rem rgba(0,0,0,.2);
    transform: scale(0.9);
}

.button1:active, .button2:active,.button3:active, .button4:active, .button5:active{
    transform:translateY(0);
    box-shadow: none;
}
    
    #container-right{
        width:25%;
        height:60%;
        float:right;
        padding:1%;
    }

    .btn_table{ /*table contains the table button*/
        width:70%;
        text-align: center;
        align-items: center;
        }        
    
    .table {
        border: solid;
        padding: 16px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius:100px;
        width:200px;
        height:200px;
        border:solid;
        color: black; 
        background-image:url(table.png);
        background-position: center;
        background-size: 7.5vw;
      }    
    a{
        text-decoration: none;
    }
    button{
    display: block;
    width:100%;
    height:15%;
    margin-top:5%;
    margin-bottom:20%;
    font-size:large;
    }
      .table:hover {
        background-color:rgb(167, 180, 201);
        color: black;
      }
      
    
    </style>
</head>
<body>
<div class="text">
            Table Order
</div>
</div>

<center>

    <div id="container-right">
    <?php
    
    $get_tableid = isset($_GET['table_id'])?$_GET['table_id']:''; 
        
    echo "<a href='Staff_FoodOrder.php?table_id=".$get_tableid."'><button class='button1'>Order</button></a>";
    echo "<a href='Staff_CheckOrderList.php?id=".$get_tableid."'><button class='button2'>Check Order List</button></a>";
    echo "<a href='Staff_TableAvailability.php?'><button class='button3'>Change Table Availability</button></a>";
    echo "<a href='Staff_Reset.php?'><button class='button3'>Reset Table</button></a>";
    echo "<a href='Staff_ViewBookingHistory.php?'><button class='button4'>View Booking History</button></a>";
    echo "<a href='StaffHome.php'><button class='button5'>Back</button></a>";
    
    
    ?>
    </div>

         <table class="btn_table">
         <tr>

    <?php
    include "connectdb.php";
    $sql="Select * from tables;";
    $result=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)<=0){
        die("<script>alert('Technical Error: There's no table chosen');</script>");
    }
    
    else{
    $limit=3;
    $count=0;
    while($rows=mysqli_fetch_array($result)){
    if($rows['Table_Status']=="Occupied"){
    echo "<td><a href='?table_id=".$rows['Table_ID']."'>";
    echo "<button style='background-color:red;' class='table' id = 'table_hover' onclick='selected_table()'>".$rows['Table_ID']."</button></a></td>";
    }
    
    elseif($rows['Table_Status']=="Booked"){
        echo "<td><a href='?table_id=".$rows['Table_ID']."'>";
        echo "<button style='background-color: green;' class='table' disabled onclick='selected_table()' id='tid'>".$rows['Table_ID']."</button></a></td>";
        }
    
    else{
        echo "<td><a href='?table_id=".$rows['Table_ID']."'>";
        echo "<button class='table' onclick='selected_table()' id='tid'>".$rows['Table_ID']."</button></a></td>";
    }
    
    if($count==$limit){
        echo "</tr>";
        echo "<tr>"; 
        $count=-1;
           }
    $count++;
        }
    echo "</tr>";
    }
    ?>
    
    </div>
    <!--<script scr="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type=text/JavaScript>
    function selected_table{
        $document(#tid).on('click',function()){
            $(this).addcalss('active').siblings().removeClass('active')
        }
    
    /*function selected_table(){
    <style='button.active:black;'>;*/
    }
    </script>-->
    </table>
    </body>
</html>
<?php
}
else{
    header("Location: login.php");
    exit();
}
?>