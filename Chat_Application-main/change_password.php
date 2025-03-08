<!DOCTYPE html>
<?php 
    session_start();
    include("include/connection.php");
    include("include/header.php");

    if(!isset($_SESSION['user_email'])){
        header("location: signin.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change profile picture</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <style>
        body{
            overflow-x:hidden;
        }
        
    </style>
</head>
<body>
    
    <div class="row">
        <div class= "col-sm-2">
        </div>
    
        <div class="col-sm-8">
            <form action="" method="post" enctype="mulitpart/form-data">
                <table class="table table-bordered table-hover">

                    <tr align="center">
                        <td colspan="6" class="active">Change password</td>
                    </tr>

                    <tr>
                        <td style="font-weight:bold;">Current password</td>
                        <td>
                            <input type="password" name="current_pass" id="mypass" class="form-control" required placeholder="Current Password" />
                        </td>
                    </tr>

                    <tr>
                        <td style="font-weight:bold;">New password</td>
                        <td>
                            <input type="password" name="u_pass1" id="mypass" class="form-control" required placeholder="New Password" />
                        </td>
                    </tr>

                    <tr>
                        <td style="font-weight:bold;">Comform password</td>
                        <td>
                            <input type="password" name="u_pass2" id="mypass" class="form-control" required placeholder="Comform password" />
                        </td>
                    </tr>

                    <tr align="center">
                        <td colspan="6">
                            <input type="submit" name="change" value="change" class="btn btn-info"/>
                        </td>
                    </tr>
                </table>
            </form>
            <?php 
                if(isset($_POST['change'])){
                    $c_pass = $_POST['current_pass'];
                    $pass1 = $_POST['u_pass1'];
                    $pass2 = $_POST['u_pass2'];

                    $user = $_SESSION['user_email'];
                    $get_user = "select * from users where user_email = '$user'";
                    $run_user = mysqli_query($con , $get_user);
                    $row = mysqli_fetch_array($run_user);
    
            
                    $user_password = $row['user_pass'];

                    if($c_pass!== $user_password){
                        echo "
                            <div class='alert alert-danger'>
                                <strong>Your old password didn't match</strong>
                            </div>
                        ";
                    }

                    if($pass1 !== $pass2){
                        echo "
                            <div class='alert alert-danger'>
                                <strong>You New password didn't match comform password</strong>
                            </div>
                        ";
                    }

                    if($pass1 < 9 && $pass2 < 9){
                        echo "
                            <div class='alert alert-danger'>
                                <strong>Use 9 or morethan characters</strong>
                            </div>
                        ";
                    }

                    if($pass1 == $pass2 && $c_pass== $user_password){
                        $update_pass = mysqli_query($con, "UPDATE users SET user_pass='$pass1' where user_email='$user'");
                        echo "
                            <div class='alert alert-danger'>
                                <strong> password is changed Successfully</strong>
                            </div>
                        ";
                    }
                }
            ?>
        </div>
        <div class = "col-fn-2">
        </div>
    </div>
         
</body>
</html>