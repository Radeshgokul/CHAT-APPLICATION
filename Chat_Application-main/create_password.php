<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/signin.css">
</head>
<body>
    <div class="signin-form">
        <form action="" method="post">
            <div class="form-header">
                <h1>Create new password</h1>
                <p> My Chat</p>
            </div>
            <div class="form-group">
                <label for="">Enter Password</label>
                <input type="password" class="form-control" name="pass1" placeholder="Password" Autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" class="form-control" name="pass2" placeholder="Confirm Password" Autocomplete="off" required>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn-btn-primary btn-block btn-lg" name="change">Change</button>
            </div>
            
            
        </form>
    </div>
    <?php
        session_start();
        include("include/connection.php");

        if(isset($_POST['change'])){
            $user = $_SESSION['user_email']; 
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];

            if($pass1 !== $pass2){
                echo "
                    <div class='alert alert-danger'>
                        <strong>You New password didn't match comform password</strong>
                    </div>
                ";
            } 

            if($pass1 < 9 AND $pass2 < 9){
                echo "
                    <div class='alert alert-danger'>
                        <strong>Use 9 or morethan characters</strong>
                    </div>
                ";
            }

            if($pass1 == $pass2){
                $update_pass = mysqli_query($con, "UPDATE users SET user_pass='$pass1' where user_email='$user'");
                session_destroy();
                echo "<script>alert('Go ahead and signin')</script>";
                echo "<script>window.open('signin.php','_self')</script>";
            }
        }
    ?>
</body>
</html>