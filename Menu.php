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
  <title>Menu Availabilty</title>
  <style>
      body{
    background-image: url();
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-color: #EDF6F9;
}
.dessert{
      width:80%;
      height:auto;
      align-items:center;
      text-align: center;
      border-collapse: collapse;
}

.dessert td, .dessert th{
    padding: 8px;
}

.dessert  tr{
    background-color: #dedede;
}
          
.dessert  tr:hover {
	background-color: #FDC094;
	transition:0.25s;
}
          
.dessert th {
	padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #FF9190;
    color: white;
}

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

.categories{
    padding-top:3vh ;
}

.btn3{
    width:5vw;
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

.text{
    position:absolute;
    top:50%;
    width:100%;
    text-align:center;
    color:#000;
    font-size:27px;
    letter-spacing:8px;
    text-transform: uppercase;
}

.text .border{
    background-color:transparent;
    color:black;
    padding:20px;
}

.text .border.trans{
    background-color:  transparent;
}

.img{
    background-image:url(../image/MainCourse.jpg);
    min-height: 100%;
    margin-top: -25px;
}

.img{
    position: relative;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

.section{
    text-align:center;
    padding: 50px 80px;
}

.section-light{
    background-color:#f4f4f4;
    columns: #666;
}

input[type = "submit"]{
    font-family: 'Oleo Script';
    width:12vw;
    padding: 1rem ;
    background-color:#0B0742;
    border-radius: 2rem;
    margin: 1rem 0;
    text-transform:uppercase;
    color: #fdc094;
    font-size: 1.4rem;
    align-items: center;
    align-content: center;
}

input[type = "submit"]:hover{
    transform: translateY(-2px);
    box-shadow:.5rem .5rem 2rem rgba(0,0,0,.2)
	}

input[type = "submit"]:active{
    transform:translateY(0);
    box-shadow: none;
}

input[type = "button"]{
    font-family: 'Oleo Script';
    width:12vw;
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

input[type = "button"]:hover{
    transform: translateY(-2px);
    box-shadow:.5rem .5rem 2rem rgba(0,0,0,.2)
	}

input[type = "button"]:active{
    transform:translateY(0);
    box-shadow: none;
}
    
.bg{
    background-color: #EDF6F9;
}

a{
    text-decoration: none;
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
    padding-bottom:2vw;
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
    padding: 1rem 1.5rem;
    background-color:green;
    border-radius: 2rem;
    margin: 1rem 0;
    text-transform:uppercase;
    color: white;
    font-size: 1.2rem;
}

.card .btn2{
    padding: 1rem 1.5rem;
    background-color:red;
    border-radius: 2rem;
    margin: 1rem 0;
    text-transform:uppercase;
    color: white;
    font-size: 1.2rem;
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
        animation:fadeIn .5s 1s backwards;
    }

    .card:nth-child(2){
        animation:fadeIn .5s 1s backwards;
    }

    .card:nth-child(3){
        animation:fadeIn .5s 1s backwards;
    }
    .card:nth-child(4){
        animation:fadeIn .5s 1s backwards;
    }
    .card:nth-child(5){
        animation:fadeIn .5s 1s backwards;
    }
    .card:nth-child(6){
        animation:fadeIn .5s 1s backwards;
    }
    .card:nth-child(7){
        animation:fadeIn .5s 1s backwards;
    }
    .card:nth-child(8){
        animation:fadeIn .5s 1s backwards;
    }
    .card:nth-child(9){
        animation:fadeIn .5s 1s backwards;
    }
    .card:nth-child(10){
        animation:fadeIn .5s 1s backwards;
    }

    .card:hover{
        transform: scale(0.9);
    }
}

  </style>
</head>
<body>
  
    <div class="text">
        
        <h2>MENU AVAILABILITY</h2>
        </span>
    </div>
</div>



<section class="bg">
  <center>
  <form action="UpdateAvailability.php" method="post">
      <?php

      include "connectdb.php";

      $id = $_GET['id'];
      $sql = "SELECT Item_ID, Item_Name, Availability, Image FROM item WHERE Main_ID = $id AND Display = 'Shown';";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) <= 0) {
          echo "<script>alert('There are no desserts.');</script>";
      } else {
        echo"<div class='menu'>
        <section>
        <div class='card-wrapper'>";
   
          while ($rows = mysqli_fetch_array($result)) {
              $item_id = $rows['Item_ID'];
              $item_name = $rows['Item_Name'];
              $availability = $rows['Availability'];
              $image = $rows['Image'];
              ?>
            <div class='card'>
              <img width='200vw' height='160vw' src="\FYP/<?php echo $image; ?>" alt="card backgroud" class="card-img">
                  <h1><?php echo $item_name; ?></h1></br>
                      <h1><?php echo $availability?></h1>

          </br>
          </div>
 
              
                  <?php

                }
                echo"</div>
                </section>
                </div>"; }
                ?> 

<table>

    <tr>
    <td><center><a href="ViewMenu.php"><input type="button" value="Back" class="btn3"></a></center></td>
    </tr>
    </table>
    </form>
    </center>
</section>
</body>
</html>
<?php
}
else{
    header("Location: login.php");
    exit();
}
?>