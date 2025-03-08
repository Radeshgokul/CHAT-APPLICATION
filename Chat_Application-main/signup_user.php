<?php 
    include("include/connection.php");

    

    if(isset($_POST['signup'])){
        $name = htmlentities(mysqli_real_escape_string($con, $_POST['user_name']));
        $pass = htmlentities(mysqli_real_escape_string($con, $_POST['user_pass']));
        $email = htmlentities(mysqli_real_escape_string($con, $_POST['user_email']));
        $location = htmlentities(mysqli_real_escape_string($con, $_POST['user_location']));
        $gender = htmlentities(mysqli_real_escape_string($con, $_POST['user_gender']));
        $rand = rand(1, 2);

        if($name == ''){
            echo "<script>alert('we can not verify your name')</script>";
            echo "<script>window.open('signup.php','_self')</script>";
        }
        if(strlen($pass)<8){
            echo "<script>alert('password show be minimun 8 charactrrs')</script>";
            echo "<script>window.open('signup.php','_self')</script>";
            exit();
        }
        $check_email = "select * from users where user_email ='$email'";
        $run_email = mysqli_query($con, $check_email);

        $check = mysqli_num_rows($run_email);
        if($check==1){
            echo "<script>alert('email allrady exist, place try again')</script>";
            echo "<script>window.open('signup.php','_self')</script>";
            exit();
        }
        if($rand== 1){
            $profile_pic = "images/download.jpg";
        }
        else if($rand==2){
            $profile_pic = "images/download.png";
        }
        $insertx = "insert into users (user_name, user_pass, user_email, user_profile, user_location, user_gender)
        values ('$name','$pass','$email','$profile_pic','$location','$gender')";

        $query = mysqli_query($con, $insertx);
        if($query){
            echo "<script>alert('Congratulation $name, your account has been created successful')</script>";

            echo "<script>window.open('signin.php','_self')</script>";
        }
        else{
            echo "<script>alert('Registration faild, place try again')</script>";
            echo "<script>window.open('signup.php,'_self')</script>";
        }
    }
?>