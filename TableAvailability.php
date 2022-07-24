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
  <title>Available Tables</title>

  <style>
.switch{
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
}

/*Hide default HTML checkbox*/
.switch input{
    opacity: 0;
    width: 0;
    height: 0;

}

.slider{
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}
input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

a{
    text-decoration:none;
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
    background-color:transparent;
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
    padding-bottom:2vw;
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

    </style>
</head>
<body>
    <div class="text">
            TABLE Availability
    </div>
</div>
      <form action="UpdateTable.php" method="post">
      <div class='menu'>
        <div class='card-wrapper'>
            <?php
            include "connectdb.php";
            $sql="SELECT * FROM tables;";
            $result=mysqli_query($conn,$sql);
            
            while($rows=mysqli_fetch_array($result)){
              $tables=$rows['Table_ID'];
              $table_status=$rows['Table_Status'];
?>
              <div class='card'>
                  <h1><?php echo $tables; ?></h1></br>
                  <label class='switch'>
            <input type ='checkbox' name ='table_id[]' value='<?php echo $tables.",";?>' <?php if($table_status=='Booked'){echo 'checked';}?>>
            <span class = 'slider round'></span>
                    </label>
          </br>
          </div>

<?php
}
echo"</div>
</div>";
?>
<center>
    
            <input type="submit" value="Confirm"><a href="BookingHistory.php"></a>
            <a href="TableOrder.php"><input type="button" value="Back"></a>

</center>
</form>

    </body>
</html>

<?php
}
else{
    header("Location: login.php");
    exit();
}
?>