<?php
include "ManagerHeader.php";
include "connectdb.php";
if(isset($_SESSION['User_ID'])) {
    $sql = "SELECT Name, Email, PhoneNumber, Position, Password, SecurityQs1, SecurityQs2, SecurityQs3 FROM user WHERE User_ID = '{$_SESSION['User_ID']}'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $rows = mysqli_fetch_assoc($result);
        $rows['Name'];
       
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Manage Users</title>
	
<style>
.manageusers{
	border-collapse: collapse;
	width:90%;
    
}

.manageusers td, .manageusers th{
    padding: 8px;
}

.manageusers tr{
    background-color: #dedede;
}
          
.manageusers tr:hover {
	background-color: #686767;
    color: #ffffff;
	transition:0.25s;
}

.manageusers tr a:hover{
    color: #ffffff;
	transition:0.25s;
}
          
.manageusers th {
	padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #0B0742;
    color: #fdc094;
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
    background-color:#EDF6F9;
    color:#000000;
    padding:20px;
    margin-top: 2000%;
}


.img{
    background-image:url(Manage.jpg);
    min-height: 65%;
}

.search input[type = "text"]{
        border:0;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 3px solid #FF9190;
        padding:14px 10px;
        width:10vw;
        outline:none;
        color: black;
        border-radius: 24px;
		transition: 0.25s;
}
	
.search input[type = "text"]:focus{
	width:20vw;
    border-color:#fdc094;
}

.search input[type = "submit"]{
        border:0;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #2ecc71;
        padding:14px 10px;
        width:5vw;
        outline:none;
        color: black;
        border-radius: 24px;
		transition: 0.25s;
		cursor: pointer;
	}

.search input[type = "submit"]:hover{
    background: #2ecc71;
}

.insert{
	border:0;
    background-color:#0B0742;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #0B0742;
    padding:14px 10px;
    width:10vw;
    outline:none;
    color: #fdc094;
    border-radius: 24px;
	transition: 0.25s;
	cursor: pointer;
}

.insert:hover{
	transform: translateY(-2px);
    box-shadow:.5rem .5rem 2rem rgba(0,0,0,.2)
}
a{
    text-decoration:none;
}

input[type = "button"]{
	width:18vw;
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

input[type = "button"]:hover{
    transform: translateY(-2px);
    box-shadow:.5rem .5rem 2rem rgba(0,0,0,.2)
}

input[type = "button"]:active{
    transform:translateY(0);
    box-shadow: none;
}

h1 {
    margin-bottom: 30px;
}
.search {
    padding: 100px;
    min-height: auto;
    margin: auto;
    max-width: 800px;
    text-align: center;
}
    
#searchBar {
    width: 100%;
    height: 35px;
    border-radius: 10px;
    border: 1px solid #000000;
    padding: 5px 10px;
    font-size: 15px;
}
    
#searchWrapper {
    position: relative;
}
    
#searchWrapper::after {
    content: '🔍';
    position: absolute;
    top: 6px;
    right: 15px;
}

</style>
</head>

<body style="background-color: #EDF6F9;">


	
        <div class="search">
                <h1>&#128104; Search for Employees &#128105;</h1>
                <div id="searchWrapper">
                    <form action="ManageUsers.php" method="POST">
                        <input type="text"name="searchname"id="searchBar"placeholder="Enter Keyword">
                    </form>
                    </div>
                </div>

	<?php
		
			$searchname = isset($_POST['searchname'])?
            $_POST['searchname']:'';
            $chef='Chef';
            $staff='Staff';
    
            
			$sql = "SELECT * FROM user WHERE Name LIKE '$searchname%'";
			$result=mysqli_query($conn, $sql);
	
			if(mysqli_num_rows($result) <= 0) {
			echo "<script>alert('No Result!');</script>";
			}
			else {
			echo "<center>";
			echo "<table class='manageusers'>";
			echo "<tr>";
			echo "<th>User ID</th>";
			echo "<th>Name</th>";
			echo "<th>Email</th>";
			echo "<th>Phone Number</th>";			
			echo "<th>Position</th>";
			echo "<th>Password</th>";
			echo "<th>Salary (RM)</th>";
			echo "<th>Edit</th>";
			echo "<th>Delete</th>";
			echo "</tr>";
				
			while($rows = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$rows['User_ID']."</td>";
			echo "<td>".$rows['Name']."</td>";
			echo "<td>".$rows['Email']."</td>";
			echo "<td>".$rows['PhoneNumber']."</td>";
			echo "<td>".$rows['Position']."</td>";
			echo "<td>".$rows['Password']."</td>";
			echo "<td>".$rows['Salary']."</td>";
			echo "<td><a href='EditUserProfile.php?id=".$rows['User_ID']."'<button>Edit</button></a></td>";
			echo "<td><a href='DeleteUsers.php?id=".$rows['User_ID']."'<button>Delete</button></a></td>";
			echo "</tr>";
			}
			echo "</table>";
			echo "</center>";
            }
		?>
		<br/>
		<a href='CreateUser.php'><button class="insert">Insert New User</button></a>
        <a href='ManagerHome.php'><button class="insert">Back</button></a>
	

</body>

</html>
<?php
}
else{
    header("Location: login.php");
    exit();
}
?>