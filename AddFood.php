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
    color:black;
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

        /* profile */
        .wrapper{
          position: absolute;
          top: 55%;
          left: 50%;
          transform: translate(-50%,-50%);
          width: 1000px;
          display: flex;
          box-shadow: 0 1px 20px 0 rgba(69,90,100,.08);
        }

        .wrapper .left{
          width: 35%;
          background: linear-gradient(to right,#01a9ac,#01dbdf);
          padding: 30px 25px;
          border-top-left-radius: 5px;
          border-bottom-left-radius: 5px;
          text-align: center;
          color: #fff;
        }

        .wrapper .left img{
          border-radius: 5px;
          margin-bottom: 10px;
        }

        .wrapper .left h4{
          margin-bottom: 10px;
        }

        .wrapper .left p{
          font-size: 12px;
        }

        .wrapper .right{
          width: 65%;
          background: #fff;
          padding: 30px 25px;
          border-top-right-radius: 5px;
          border-bottom-right-radius: 5px;
        }

        .wrapper .right .info,
        .wrapper .right .projects{
          margin-bottom: 25px;
        }

        .wrapper .right .info h3,
        .wrapper .right .projects h3{
          padding-bottom: 5px;
          border-bottom: 1px solid #e0e0e0;
          color: #353c4e;
          text-transform: uppercase;
          letter-spacing: 5px;
        }

        .wrapper .right .info_data,
        .wrapper .right .projects_data{
          display: flex;
          justify-content: space-between;
        }

        .wrapper .right .info_data .data,
        .wrapper .right .projects_data .data{
          width: 65%;
        }

        .wrapper .right .info_data .data h4,
        .wrapper .right .projects_data .data h4{
          color: #353c4e;
          margin-bottom: 5px;
        }

        .wrapper .right .info_data .data p,
        .wrapper .right .projects_data .data p{
          font-size: 13px;
          margin-bottom: 10px;
          color: black;
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
        animation:fadeIn .5s .5s backwards;
    }
input[type = "submit"]{
    border:0;
    background: none;
    display: block;
    text-align: center;
    border: 2px solid #2ecc71;
    padding:14px 40px;
    width:12vw;
    outline:none;
    color: block;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer;
    margin-bottom: 2vw;
}

input[type = "submit"]:hover{
    background: #2ecc71;
	}
.image-preview{
width:300px;
min-height:100px;
border: 2px solid #dddddd;
margin-top:15px;
display:flex;
align-items:center;
justify-content: center;
font-weight:bold;
color:#cccccc;
}

.image-preview__image{
    display:none;
    width:100%;
}

.btnd {
            color:white;
            background-color: gray;
            border: 1px solid transparent;
            border-radius: 5px;
            padding: .5rem 1rem;
            transition: all .3s;

        }

        .btnd:hover{
            background-color: rgba(158, 158, 158, 0.87);
            transition: all .3s;
        }
</style>
<body>

<form action="InsertFood.php" method="post" enctype="multipart/form-data" id="uploadForm">
<div class="wrapper">
<div class="left">
    <div class="image-preview" id="imagePreview">
<img src = "" alt = "Image Preview" class="image-preview__image"/>
<span class="image-preview__default-text">Image Preview</span>
</div>
    </div>
    <div class="right">
        <div class="info">
        <h3>Add Food</h3>
        <div class ="info_data">
                 <div class="data">
                 <h4>Category: </h4>
<p><select name = "category"></p>
</div>

<?php
include "connectdb.php";
$sql="SELECT * FROM main_menu";
$result=mysqli_query($conn,$sql);

while($rows=mysqli_fetch_array($result)){
    $mainid = $rows['Main_ID'];
    $menu_name = $rows['Menu_Name'];
?>
    <option value="<?php echo $mainid;?>"><?php echo $menu_name;?></option>
    <?php
}
    ?>
    
</select>


<div class ="info_data">
<div class="data">
<h4>Food Name:</h4>
    <p><input type="text" name="item_name"></p>
    </div>
</div>
</div>
</div>

<div class="projects">
<h3></h3>
<div class="projects_data">
<div class="data">                            
<h4>Price:<h4>
    <p><input type="number" name="price" min="0" step="0.01"></p>
</div>

<div class="data">
<h4>Availability:</h4>
  <p><input type="radio" name="availability" value="Available">Available</p>
  <p><input type="radio" name="availability" value="Unavailable">Unavailable</p>
</div>
</div>
</div>
</div>

<div class="projects">
<h3></h3>
<div class="projects_data">
<div class="data">
<h4>Display:</h4>
<p>
<select name="display">
<option value="">--Please select a display--</option>
<option value="Shown">Shown</option>
<option value="Hidden">Hidden</option>
</select>
</div>
</p>

<div class="data">
<h4>Picture:</h4>
<p><input type="file" name="photo" id="photo">
</p>
</div>
</div>
</div>



<div class="projects">
<h3></h3>
<div class="projects_data">
<div class="data">		
<button type="submit" value="Submit" class="btnd">Submit</button>
</div>

<div class="data">
<button type="submit" value="Back to Home Page" class="btnd" formaction="EditMenuDetails.php">Go Back</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
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
