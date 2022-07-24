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
    <title>Edit Food</title>
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


        /* profile */
.wrapper{
          position: absolute;
          top: 55%;
          left: 50%;
          transform: translate(-50%,-50%);
          width: 800px;
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
          color: #919aa3;
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

.addfood{
  margin-bottom: 1vw;
	border-collapse: collapse;
	border-radius: 24px;
	font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
	text-transform:uppercase;
}

.addfood td{
    padding-top: 5px;
}
          
.addfood tr:hover {
	background-color: #FDC094;
	transition:0.25s;
}

.addfood input[type = "text"],.addfood input[type = "number"]{
    border:0;
    background: none;
	display: block;
	margin: 1vw;
    text-align: center;
    border: 3px solid #FF9190;
    padding:9px 10px;
    width:160px;
    outline:none;
    color: black;
    border-radius: 24px;
	transition: 0.25s;
	position: sticky;
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

a{
    text-decoration:none;
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
</head>
<body>

<?php
		include "connectdb.php";
		$id = $_GET['id'];
		$sql = "Select * from item where Item_ID = $id";
		$result = mysqli_query($conn, $sql);
		if ($rows = mysqli_fetch_array($result))
		{
		$name = $rows['Item_Name'];
		$price = $rows['Price'];
        $availability = $rows['Availability'];
        $imagepath = $rows['Image'];
        $display = $rows['Display'];
        $mainid= $rows['Main_ID'];
        $userid = $rows['User_ID'];
		}
		else
		{
		echo "<script>alert('No data from db!Technical errors!');</script>";
		die ("<script>window.location.href='Search_Users.php';</script>");
		}
	?>
    

<form method="post" action="UpdateFood.php">
<div class="wrapper">
<div class="left">
        <?php echo"<img src = '".$rows['Image']."' width='200' alt = 'Image Preview'/>";?>
    </div>
    <div class="right">
        <div class="info">
            <h3>Edit Food Details</h3>
            <div class ="info_data">
                 <div class="data">
									<h4>Item ID:</h4>
									<p><input type="text" name="uid" value="<?php echo $id;?>" readonly/></p>
                                    </div>
                 <div class="data">
									<h4>Item Name:</h4>
									<p><input type="text" name="name" value="<?php echo $name;?>" required="required"/></p>
                                      </div>
                                    <div>
                                </div>
                            </div>
                 <div class="projects">
                     <h3></h3>
                     <div class="projects_data">
                         <div class="data">
									<h4>Price:</h4>
									<p><input type="text" name="price" value="<?php echo $price;?>" required="required"/></p>
                                    </div>
                         <div class="data">
									<h4>Availability:</h4>
									<p><input type="text" name="availability" value="<?php echo $availability;?>" readonly/></p>
                                    </div>
                            </div>
                </div>
    </div>
    <div class="projects">
                 <h3></h3>
                 <div class="projects_data">
                  <div class="data">
									<h4>Display:</h4>
									<p><input type="text" name="display" value="<?php echo $display;?>" required="required"/></p>
                                    </div>
                 <div class="data">
									<h4>Main ID:</h4>
									<p><input type="text" name="Main_ID" value="<?php echo $mainid;?>" readonly/></p>
                                    </div>
                            </div>
                </div>

    <div class="projects">
                 <h3></h3>
                 <div class="projects_data">
                 <div class="data">
									<h4 style=margin-left:50%;>User ID:</h4>
									<p style=margin-left:50%;><input type="text" name="User_ID" value="<?php echo $userid;?>" readonly/></p>
                                </div>
                                <div class="data">
                    </div>
                </div>
            </div>

            <div class="projects">
            <h3></h3>
            <div class="projects_data">
                 <div class="data">		
								<button type="submit" value="Update" class="btnd">Update</button>
                                </div>
                                
                 <div class="data">
                 <button type="submit" value="Back to Previous Page" class="btnd" formaction="EditMenuDetails.php">Go Back</button>		
                 </div>
            </div>
        </div>
    </div>
</div>

                </form>

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