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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Manager's Service</title>
    
    <style>
    body{
    background-image: url();
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-color: #EDF6F9;
}

.img{
    position: relative;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

* {
  box-sizing: border-box;
}

form.Search input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}
form.Search button {
  float: left;
  width: 20%;
  padding: 10px;
  background: black;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.Search button:hover {
  background: grey;
}

form.Search::after {
  content: "";
  clear: both;
  display: table;
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

    .card:hover{
        transform: scale(0.9);
    }
}

a{
    text-decoration:none;
}

.wrapper{
            width: 1000px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
        .btn {
            color:white;
            background-color: #686767;
            border: 1px solid transparent;
            border-radius: 5px;
            padding: .5rem 1rem;
            transition: all .3s;
            float: right
        }

        .btn:hover{
            background-color: rgba(158, 158, 158, 0.87);
            transition: all .3s;
        }
        .container-fluid {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}

.container-fluid > .navbar-header,
.container-fluid > .navbar-collapse {
  margin-right: -15px;
  margin-left: -15px;
}

.container-fluid{
    padding-right: 15px;
    padding-left: 15px;
    border-radius: 6px;
}

.container-fluid:before,
.container-fluid:after{
    display: table;
    content: " ";
}

.container-fluid:after{
    clear: both;
}

.row {
    margin-right: -15px;
    margin-left: -15px;
}

.row:before,
.row:after{
    display: table;
    content: " ";
}

.row:after{
    clear: both;
}

.col-md-12{
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

.page-header {
    padding-bottom: 9px;
    margin: 40px 0 20px;
    border-bottom: 1px solid #eee;
}

.clearfix:before,
.clearfix:after{
    display: table;
    content: " ";
}

.clearfix:after{
    clear: both;
}

.pull-left {
    float: left !important;
}

table {
    border-spacing: 0;
    border-collapse: collapse;
    border-collapse: collapse !important;
    background-color: transparent;
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
    text-align: center;
}

.table td,
.table th {
  background-color: #fff !important;
  text-align: center;
}

.table > thead > tr > th,
.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > tbody > tr > td,
.table > tfoot > tr > td {
  padding: 8px;
  line-height: 1.42857143;
  vertical-align: top;
  border-top: 1px solid #ddd;
}
.table > thead > tr > th {
  vertical-align: bottom;
  border-bottom: 2px solid #ddd;
}
.table > caption + thead > tr:first-child > th,
.table > colgroup + thead > tr:first-child > th,
.table > thead:first-child > tr:first-child > th,
.table > caption + thead > tr:first-child > td,
.table > colgroup + thead > tr:first-child > td,
.table > thead:first-child > tr:first-child > td {
  border-top: 0;

}
.table > tbody + tbody {
  border-top: 2px solid #ddd;
}
.table .table {
  background-color: #fff;
}

.table-bordered {
    border: 1px solid #ddd;
}

.table-bordered th,
.table-bordered td {
  border: 1px solid #ddd !important;
}

.table-bordered {
    border: 1px solid #ddd;
}

  .table-bordered > thead > tr > th,
  .table-bordered > tbody > tr > th,
  .table-bordered > tfoot > tr > th,
  .table-bordered > thead > tr > td,
  .table-bordered > tbody > tr > td,
  .table-bordered > tfoot > tr > td {
    border: 1px solid #ddd;
}
  .table-bordered > thead > tr > th,
  .table-bordered > thead > tr > td {
    border-bottom-width: 2px;
}
  .table-striped > tbody > tr:nth-of-type(odd) {
    background-color: #f9f9f9;
}

.btn3{
    width:15vw;
    font-family: 'Oleo Script';
    padding: 1rem 2.5rem;
    background-color:#0B0742;
    border-radius: 2rem;
    margin: 1rem 0;
    text-transform:uppercase;
    font-size: 1rem;
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

<body>
<div class="img">
<div class="text">
        
        <h2>Edit Menu Details</h2>
        
</div>
</div>
<section class="section section-light">
<form action="EditMenuDetails.php" method="post" class="Search" style="margin:auto;margin-bottom:15px;max-width:300px">
			<input type="text" name="search_key" placeholder="Enter Name Keyword!"/>
            <button type="submit"><i class="fa fa-search"></i></button>
<br/>
		</form>
        <section>

<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    
<?php

            include "connectdb.php";
                    
            $search_key = isset($_POST['search_key'])?
			$_POST['search_key']:'';
	
			$sql = "SELECT * FROM item WHERE Item_Name LIKE '$search_key%'";

			$result=mysqli_query($conn, $sql);
	
			if(mysqli_num_rows($result) <= 0)
			{
			echo "<script>alert('No Result!');</script>";
			}
			else
			{
			}
                        echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>Item Name</th>";
                                        echo "<th>Price</th>";
                                        echo "<th>Availability</th>";
                                        echo "<th>Image</th>";
                                        echo "<th>Edit</th>";
                                        echo "<th>Delete</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['Item_ID'] . "</td>";
                                        echo "<td>" . $row['Item_Name'] . "</td>";
                                        echo "<td>" . $row['Price'] . "</td>";
                                        echo "<td>" . $row['Availability'] . "</td>";
                                        echo "<td id='photo'>
            <div class='image-preview' id='imagePreview'>
            <img src = '".$row['Image']."' width='100vw' height='80vw' alt = 'Image Preview' class='image-preview__image'/>
            <span class='image-preview__default-text'></span>
            </div></td>";
			echo "<td><a href='EditFood.php?id=".$row['Item_ID']."'<button>Edit</button></a></td>";
            echo "<td><a href='DeleteFood.php?id=".$row['Item_ID']."'<button>Delete</button></a></td>";
            echo "</tr>";
			}
			echo "</table>";
		?>
        </section>
		<br/>
        <center>
		<a href='AddFood.php'><button class="btn3" style="color:#fdc094">Add New Food</button></a><a href="EditMenu.php"><input type="button" class="btn3" style="color:#fdc094" value="Previous Page" /></a>
        </center>
    </section>
<script>
const photo = document.getElementById("photo");
const previewContainer = document.getElementById("imagePreview");
const previewImage =  previewContainer.querySelector(".image-preview__image");
const previewDefaultText =  previewContainer.querySelector(".image-preview__default-text");

photo.addEventListener("change", function(){
    const file =  this.files[0];

    if(file){
        const reader = new FileReader();

        previewDefaultText.style.display="none";
        previewImage.style.display = "block";

        reader.addEventListener("load", function(){
           // console.log(this);
            previewImage.setAttribute("src", this.result);

        });
        reader.readAsDataURL(file);
    }else{
        previewDefaultText.style.display="null";
        previewImage.style.display = "null";
        previewImage.setAttribute("src", "");
    }

});

</script>	

</body>
</html>
<?php
}
else{
    header("Location: login.php");
    exit();
}
?>