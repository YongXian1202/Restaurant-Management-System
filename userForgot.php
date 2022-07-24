<?php
include ("connectdb.php");
session_start();
$useremail = $SecurityQs1 = $SecurityQs2 = $SecurityQs3 = $userPassword = $userrtPassword = "";
$error = array('userEmail'=>"", 'SecurityQs1'=>"", 'SecurityQs2'=>"", 'SecurityQs3'=>"", 'userPassword'=>"", 'userrtPassword'=>"");

if(isset($_POST['submit'])){
    if(empty($_POST['userEmail'])){
        $error['userEmail'] = "Email is required";
    }
    else{
        $useremail = $_POST['userEmail'];
        if(!preg_match("/(@)(gmail|imail|outlook|hotmail|yahoo)(.com)/", $useremail)){
            $error['userEmail'] = "Please enter a valid email address";
        }
    }

    if(empty($_POST['SecurityQs1'])){
        $error['SecurityQs1'] = "Answer is required";
    }
    else{
        $SecurityQs1 = $_POST['SecurityQs1'];
    }

    if(empty($_POST['SecurityQs2'])){
        $error['SecurityQs2'] = "Answer is required";
    }
    else{
        $SecurityQs2 = $_POST['SecurityQs2'];
    }

    if(empty($_POST['SecurityQs3'])){
        $error['SecurityQs3'] = "Answer is required";
    }
    else{
        $SecurityQs3 = $_POST['SecurityQs3'];
    }
    if(empty($_POST['userPassword'])){
        $error['userPassword'] = "New Password is required";
    }
    else{
        $userPassword = $_POST['userPassword'];
    }

    if(empty($_POST['userrtPassword'])){
        $error['userrtPassword'] = "Password is required";
    }
    else{
        $userrtPassword = $_POST['userrtPassword'];
    }

    if($_POST['userPassword']!==$_POST['userrtPassword']){
        $error['userrtPassword'] = "Retyped Password isn't identical to Password";
    }
    
    if(!array_filter($error)){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $useremail = validate($_POST['userEmail']);
        $SecurityQs1 = validate($_POST['SecurityQs1']);
        $a = strtolower($SecurityQs1);
        $SecurityQs2 = validate($_POST['SecurityQs2']);
        $b = strtolower($SecurityQs2);
        $SecurityQs3 = validate($_POST['SecurityQs3']);
        $c = strtolower($SecurityQs3);
        $userPassword = validate($_POST['userPassword']);
        $userrtPassword = validate($_POST['userrtPassword']);
        $sql = "SELECT * FROM user WHERE Email = '$useremail' AND SecurityQs1 = '$a' AND SecurityQs2 = '$b' AND SecurityQs3 = '$c'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if($row['Email'] === $useremail && $row['SecurityQs1'] == $a && $row['SecurityQs2'] == $b && $row['SecurityQs3'] == $c){
                $sql2 = "UPDATE user SET Password ='$userPassword', RetypePassword = '$userrtPassword' WHERE Email = '$useremail'";
                $results = mysqli_query($conn,$sql2);
                if ($results){
                   echo "<script>alert('Password Changed')</script>";
                   echo "<script>window.location.href='Login.php';</script>";
                }else{
                    //error
                    echo "<script>alert('Wrong Answer. Password Not Changed')</script>";
                    echo "Query error: ". mysqli_error($conn);// showing the database connection error
                }
                
            
        }
        
    }
    else{
        echo "<script>alert('Account does not exist or incorrect answers')</script>";
        echo "<script>window.location.href = 'login.php'</script>";
    }
    }
}




?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Login</title>

    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            
        }
        body{
            background-color: rgb(219, 226, 226);
            
        }
        .row{
            background-color: white;
            border-radius: 30px;
            box-shadow: 12px 12px 22px gray;
        }
        img{
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }
        .btn1{
            border:none;
            outline: none;
            height: 55px;
            width: 100%;
            background-color: black;
            color: white;
            border-radius: 4px;
            font-weight: bold;
        }
        .btn1:hover{
            background-color: white;
            border: 1px solid;
            color: black;
        }



    </style>

  </head>
  <body>
    
    <section class="Form my-4 mx-5 pt-6">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-5">
                    <img src="./image/restaurant.gif" class="img-fluid" alt="something">
                </div>
                <div class="col-lg-7 px-5 pt-5">

                    <h1 class="fw-bold py-3">Forgot Your Password?</h1>

                    <form action="userForgot.php" method="POST">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <h4>Enter Email Address</h4>
                                <input type="email" class="form-control my-3 p-3" name = "userEmail" placeholder="Email Address">
                                <div style="color: red; font-size: 20px;"><?php echo $error['userEmail'] ?></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <h4>Favourite Colour</h4>
                                <input type="text" class="form-control my-3 p-3" name = "SecurityQs1" placeholder="Enter Answer">
                                <div style="color: red; font-size: 20px;"><?php echo $error['SecurityQs1'] ?></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <h4>Favourite Food</h4>
                                <input type="text" class="form-control my-3 p-3" name = "SecurityQs2" placeholder="Enter Answer">
                                <div style="color: red; font-size: 20px;"><?php echo $error['SecurityQs2'] ?></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <h4>Favourite Activity</h4>
                                <input type="text" class="form-control my-3 p-3" name = "SecurityQs3" placeholder="Enter Answer">
                                <div style="color: red; font-size: 20px;"><?php echo $error['SecurityQs3'] ?></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <h4>Enter New Password</h4>
                                <input type="password" class="form-control my-3 p-3" name = "userPassword" placeholder="Password">
                                <div style="color: red; font-size: 20px;"><?php echo $error['userPassword'] ?></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <h4>Re-type Password</h4>
                                <input type="password" class="form-control my-3 p-3" name = "userrtPassword" placeholder="Re-type Password">
                                <div style="color: red; font-size: 20px;"><?php echo $error['userrtPassword'] ?></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <button type="submit" class="btn1 mt-3 mb-3" name="submit">Submit</button>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                            <input type="button" class="btn1 mt-3 mb-3" onClick="location.href='Login.php'" value='Back'>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>