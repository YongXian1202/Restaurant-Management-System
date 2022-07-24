<?php
include "connectdb.php";
$id = $fullname = $email = $phonenumber = $password = $rtpassword = $salary = $sq1 = $sq2 = $sq3 = "";
$error = array('fullname'=>"", 'email'=>"", 'phonenumber'=>"", 'password'=>"", 'rtpassword'=>"", 'salary'=>"", 'sq1'=>"", 'sq2'=>"", 'sq3'=>"");

if(isset($_POST['update'])){
    if(!empty($_POST['userID'])){
        $id = $_POST['userID'];
    }
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
        if(!preg_match("/(601)[0-9]{8,9}$/", $phonenumber)){
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

    if(empty($_POST['salary'])){
        $error['salary'] = "Salary is required";
    }
    else{
        $salary = $_POST['salary'];
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

    
        $sql1 = "UPDATE user SET Name = '$fullname', Email = '$email', PhoneNumber = '$phonenumber',  Password = '$password', RetypePassword = '$rtpassword', Salary = '$salary', SecurityQs1 = '$a', SecurityQs2 = '$b', SecurityQs3 = '$c' WHERE User_ID = '$id'";
        $results = mysqli_query($conn,$sql1);
            if ($results){
               echo "<script>alert('Profile Updated')</script>";
               echo "<script>window.location.href='ManageUsers.php';</script>";
            }else{
                //error
                echo "Query error: ". mysqli_error($conn);// showing the database connection error
            }
        
}//close update if

if(isset($_POST['cancel'])){
    echo "<script>window.location.href = 'ManageUsers.php'</script>";
}
?>