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
        <form action="forgot_pass.php" method="post">
            <div class="form-header">
                <h1>Fogot Password</h1>
                <p>Mychat</p>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email Address" Autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="">Best Friend Name</label>
                <input type="text" class="form-control" name="bf" placeholder="Someone......." Autocomplete="off" required>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn-btn-primary btn-block btn-lg" name="submit">Submit</button>
            </div>
            
                    <div class="text-center small" style="color:#674288;">Back To Signin <a href="signin.php">Click hear</a></div>
   
        </form>
 </div>
    <?php 
        session_start();
        include("include/connection.php");
        if(isset($_POST['submit'])){
            $email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
            $recover_account = htmlentities(mysqli_real_escape_string($con, $_POST['bf']));
            $query = "update users set forgotten_answer='$recover_account' WHERE user_email='$email'";
        $query1 = mysqli_query($con, $query);

            $select_user = "select * from users where user_email = '$email' and forgotten_answer = '$recover_account'";
            $query = mysqli_query($con, $select_user);
            $check_user = mysqli_num_rows($query);

            if($check_user==1){
                $_SESSION['user_email']=$email;
                echo "<script>window.open('create_password.php','_self')</script>";
            }else{
                echo "<script>alert('your email or best frind name is incorrect.')</script>";
                echo "<script>window.open('forgot_pass.php','_self')</script>";
            }
        }
    ?>
    <?php 
    mysqli_close($con);
?>
</body>
</html> 