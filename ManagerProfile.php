<?php
include "ManagerHeader.php";
include "connectdb.php";
if(isset($_SESSION['User_ID'])) {
    $sql = "SELECT Name, Email, PhoneNumber, Position, Password, RetypePassword, SecurityQs1, SecurityQs2, SecurityQs3 FROM user WHERE User_ID = '{$_SESSION['User_ID']}'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $row['Name'];
        $row['Email'];
        $row['PhoneNumber'];
        $row['Position'];
        $row['Password'];
        $row['RetypePassword'];
        $row['SecurityQs1'];
        $row['SecurityQs2'];
        $row['SecurityQs3'];
    }

    $fullname = $email = $phonenumber = $password = $rtpassword = $sq1 = $sq2 = $sq3 = "";
    $error = array('fullname'=>"", 'email'=>"", 'phonenumber'=>"", 'password'=>"",'rtpassword'=>"", 'sq1'=>"", 'sq2'=>"", 'sq3'=>"");

    if(isset($_POST['update'])){
        if(empty($_POST['fullname'])){
            $error['fullname'] = "Full Name is required";
        }
        else{
            $fullname = $_POST['fullname'];
        }

        if(empty($_POST['email'])){
            $error['email'] = "Email is required";
        }
        else{
            $email = $_POST['email'];
            if(!preg_match("/(@)(gmail|imail|outlook|hotmail|yahoo)(.com)/", $email)){
                $error['email'] = "Please enter a valid email address";
            }
        }

        if(empty($_POST['phonenumber'])){
            $error['phonenumber'] = "Phone Number is required";
        }
        else{
            $phonenumber = $_POST['phonenumber'];
            if(!preg_match("/(01)[0-9]{8,9}$/", $phonenumber)){
                $error['phonenumber'] = "Please enter a valid Malaysian phone number";
            }
        }

        if(empty($_POST['password'])){
            $error['password'] = "Password is required";
        }
        else{
            $password = $_POST['password'];
        }

        if(empty($_POST['rtpassword'])){
            $error['rtpassword'] = "Password is required";
        }
        else{
            $rtpassword = $_POST['rtpassword'];
        }

        if($_POST['password']!==$_POST['rtpassword']){
            $error['rtpassword'] = "Retyped password isn't identical to Password";
        }
        
        if(empty($_POST['sq1'])){
            $error['sq1'] = "Security Answer is required";
        }
        else{
            $sq1 = $_POST['sq1'];
            $a = strtolower($sq1);
        }

        if(empty($_POST['sq2'])){
            $error['sq2'] = "Security Answer is required";
        }
        else{
            $sq2 = $_POST['sq2'];
            $b = strtolower($sq2);
        }

        if(empty($_POST['sq3'])){
            $error['sq3'] = "Security Answer is required";
        }
        else{
            $sq3 = $_POST['sq3'];
            $c = strtolower($sq3);
        }

        if(!array_filter($error)){
            $sql1 = "UPDATE user SET Name = '$fullname', Email = '$email', PhoneNumber = '$phonenumber',  Password = '$password', RetypePassword='$rtpassword', SecurityQs1 = '$a', SecurityQs2 = '$b', SecurityQs3 = '$c' WHERE User_ID = '{$_SESSION['User_ID']}'";
            $results = mysqli_query($conn,$sql1);
                if ($results){
                   echo "<script>alert('Profile Updated')</script>";
                   echo "<script>window.location.href='ManagerProfile.php';</script>";
                }else{
                    //error
                    echo "Query error: ". mysqli_error($conn);// showing the database connection error
                }
        }
            
            
    }//close update if

    if(isset($_POST['cancel'])){
        echo "<script>window.location.href = 'ManagerHome.php'</script>";
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager's Profile</title>
    
    <style>
    body {
    margin: 0;
    padding-top: 0%;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-top: 1rem;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h3.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h4.sub-user {
    margin: 0 0 0.5rem 0;
    font-weight: 400;
    color: #696767;
    text-align: left;
    padding-left: 40px;
    
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h6 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}

    </style>
</head>

<body>
<br>
<div class="container">

<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<h3 class="user-name"><?php echo $row["Name"]?></h3>
                <br>
				<h5 class="sub-user" style="text-align: left;">Email: <?php echo $row["Email"]?></h5>
                <h5 class="sub-user" style="text-align: left;">Phone Number: <?php echo $row["PhoneNumber"]?></h5>
                <h5 class="sub-user" style="text-align: left;">Position: <?php echo $row["Position"]?></h5>
			</div>
			
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body" style="padding-top: 2rem; padding-left: 2rem; padding-right: 2rem; padding-bottom: 2rem;">
    <form action="ManagerProfile.php" method="POST">
        <div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Personal Details</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">Full Name</label>
					<input type="text" class="form-control" id="fullName" name="fullname" placeholder="Enter full name" style="font-size: 12px;" value="<?php echo $row["Name"]?>" >
                    <div style="color: red"><?php echo $error['fullname']; ?></div>
				</div>
			</div>

			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="eMail" name="email" placeholder="Enter email ID" style="font-size: 12px;" value="<?php echo $row["Email"]?>" >
                    <div style="color: red"><?php echo $error['email']; ?></div>
				</div>
			</div>
			
			
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Phone</label>
					<input type="text" class="form-control" id="phone" name="phonenumber" placeholder="Enter phone number" style="font-size: 12px;" value="<?php echo $row["PhoneNumber"]?>" >
                    <div style="color: red"><?php echo $error['phonenumber']; ?></div>
				</div>
			</div>
		</div>
        <br>
        <div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Security Key</h6>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" style="font-size: 12px;" value="<?php echo $row["Password"]?>" >
                    <div style="color: red"><?php echo $error['password']; ?></div>
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="password">Re-type Password</label>
					<input type="password" class="form-control" id="rtpassword" name="rtpassword" placeholder="Re-type Password" style="font-size: 12px;" value="<?php echo $row["RetypePassword"]?>" >
                    <div style="color: red"><?php echo $error['rtpassword']; ?></div>
				</div>
			</div>
        </div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mt-3 mb-2 text-primary">Security Questions</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="sq1">Favourite color</label>
					<input type="text" class="form-control" id="sq1" name="sq1" placeholder="Enter Answer for Security Question 1" style="font-size: 12px;" value="<?php echo $row["SecurityQs1"]?>" >
                    <div style="color: red"><?php echo $error['sq1']; ?></div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="sq2">Favourite food</label>
					<input type="text" class="form-control" id="sq2" name="sq2" placeholder="Enter Answer for Security Question 2" style="font-size: 12px;" value="<?php echo $row["SecurityQs2"]?>" >
                    <div style="color: red"><?php echo $error['sq2']; ?></div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="sq3">Favourite activity</label>
					<input type="text" class="form-control" id="sq3" name="sq3" placeholder="Enter Answer for Security Question 3" style="font-size: 12px;" value="<?php echo $row["SecurityQs3"]?>" >
                    <div style="color: red"><?php echo $error['sq3']; ?></div>
				</div>
			</div>
		</div>
        
        <br>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
					<button type="submit" id="submit" name="cancel" class="btn btn-secondary">Cancel</button>
					<button type="submit" id="submit" name="update" class="btn btn-primary">Update</button>
				</div>
			</div>
		</div>
        </form>
	</div>
</div>
</div>

</div>
</div>

</body>
</html>
<?php
}
else{
    header("Location: login.php");
    exit();
}
?>