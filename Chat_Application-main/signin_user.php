<?php 
    session_start();
    include("include/connection.php");

    if(isset($_POST['sing_in'])){

        $email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
        $pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));

        $select_user = "select * from users where user_email = '$email' and user_pass = '$pass'";
        $query = mysqli_query($con, $select_user);
        $check_user = mysqli_num_rows($query);

        if($check_user==1){
            $_SESSION['user_email']=$email;
            $update_msg = mysqli_query($con,"UPDATE users SET log_in='online' WHERE user_email='$email'");
            $user = $_SESSION['user_email'];
            $get_user = "SELECT * FROM users WHERE user_email = '$user'";
            $run_user = mysqli_query($con, $get_user);
            $row = mysqli_fetch_array($run_user);

            $user_name = $row['user_name'];

            echo "<script>window.open('h1.php?user_name=$user_name', '_self')</script>";

        }
        else{
            echo "<script>alert('Check your email and password.')</script>";
            echo "<script>window.open('signin.php', '_self')</script>";
            
        }
    }
?>