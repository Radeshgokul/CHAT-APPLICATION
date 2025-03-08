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
    <title>Account setting</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    

    
</head>
<body>
    <div class="row">
        <div class="col-sm-2">
        </div>
        <?php
            $user = $_SESSION['user_email'];
            $get_user = "select * from users where user_email = '$user'";
            $run_user = mysqli_query($con , $get_user);
            $row = mysqli_fetch_array($run_user);

            $user_name = $row['user_name'];
            $useer_pass = $row['user_pass'];
            $user_email = $row['user_email'];
            $user_profile = $row['user_profile'];
            $user_location = $row['user_location'];
            $user_gender = $row['user_gender'];
        ?>
        <div class="col-sm-8">
            <form action="" method="post" enctype="multipart/form-data">
                 <table class="table table-bordered table-hover">

                    <tr align="center">
                        <td colspan="6" class="active">Change account Setting</td>
                    </tr>

                    <tr>
                        <td style="font-weight:bold;">Change your username</td>
                        <td>
                            <input type="text" name="u_name" class="form-control" required value="<?php 
                            echo $user_name; ?>" />
                        </td>
                    </tr>

                    <tr><td style="font-weight:bold;">Change your profile image</td><td><a class = "btn btn-default" style="text-decoration:none; font-size:15px;" href="upload.php"><i class="fa fa-user" aria-hidden="true"></i> Change profile</a></td></tr>

                    <tr>
                        <td style="font-weight:bold;">Change your email</td>
                        <td>
                            <input type="text" name="u_email" class="form-control" required value="<?php 
                            echo $user_email; ?>"/>
                        </td>
                    </tr>

                    <tr>
                        <td style="font-weight:bold;">Change your location</td>
                        <td>
                            <select name="u_location" class="form-control">
                                <option value=""><?php echo $user_location ?></option>
                                <option value="ampara">ampara</option>
                                <option value="anuradapuraya">anuradapuraya</option>
                                <option value="badulla">badulla</option>
                                <option value="batticaloa">batticaloa</option>
                                <option value="colombo">colombo</option>
                                <option value="galle">galle</option>
                                <option value="gampaha">gampaha</option>
                                <option value="hambanthota">hambanthota</option>
                                <option value="jaffna">jaffna</option>
                                <option value="kaluthara">kaluthara</option>
                                <option value="kandy">kandy</option>
                                <option value="kegalla">kegalla</option>
                                <option value="kilinotchi">kilinotchi</option>
                                <option value="kurunagala">kurunagala</option>
                                <option value="mannayama">mannayama</option>
                                <option value="mathale">mathale</option>
                                <option value="mathara">mathara</option>
                                <option value="monaragla">monaragla</option>
                                <option value="mullaitivu">mullaitivu</option>
                                <option value="nuwara eliya">nuwara eliya</option>
                                <option value="polonnaruwa">polonnaruwa</option>
                                <option value="putthalma">putthalma</option>
                                <option value="rathnapura">rathnapura</option>
                                <option value="trincomalee">trincomalee</option>
                                <option value="vavuniya">vavuniya</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="font-weight:bold;">Change your gender</td>
                        <td>
                            <select name="u_gender" class="form-control">
                                <option value=""><?php echo $user_gender; ?></option>
                                <option value="male">male</option>
                                <option value="female">female</option>
                                <option value="other">other</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="font-weight:bold;" >Forgotten password</td>
                        <td>
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Forgotten Password</button>

                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="recovery.php?id=<?php echo $user_id; ?>" method="post" id="f">
                                                <strong>what is your school best friend name</strong>
                                                <textarea name="content" placeholder="Someone" cols="53" rows="4" class=""></textarea><br>
                                                <input type="submit" class="btn btn-default" name="sub" value="Submit" style="width:100px;"><br><br>
                                                <pre>Answer the about question we will ask you this question if you forget your <br>Password.</pre>
                                                <br><br>
                                            </form>
                                            <?php 
                                                if(isset($_POST['sub'])){
                                                    $bfn = htmlentities($_POST['content']);

                                                    if($bfn == ''){
                                                         echo "<script>alert('plece entere something.')</script>";
                                                         echo "<script>window.open('account_setting.php', '_self')</seript>";
                                                         exit();
                                                    }else{
                                                        $update = "UPDATE users SET forgotten_answer = '$bfn' WHERE user_email = '$user'";
                                                        $run = mysqli_query($con, $update);

                                                        if($run){
                                                            echo "<script>alert('working......')</script>";
                                                            echo "<script>window.open('account_setting.php', '_self')</seript>";
                                                        }else{
                                                            echo "<script>alert('error while updating information')</script>";
                                                            echo "<script>window.open('account_setting.php', '_self')</seript>";
                                                        }
                                                    }
                                                }
                                            ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type ="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </tr>
                    <tr><td></td><td><a class="btn btn-default" style="text-decoration:none; font-size:15px;" href="change_password.php"><i class="fa fa-key fa-fw" aria-hidden="true"></i> Change Password</a></td></tr>
                    <tr align="center">
                        <td colspan ="6">
                            <input type="submit" value="update" name = "update" class="btn btn-info">
                        </td>
                    </tr>

                 </table>
            </form>
            <?php 
                if(isset($_POST['update'])){
                    $user_name = htmlentities($_POST['u_name']);
                    $email =htmlentities($_POST['u_email']);
                    $u_location=htmlentities($_POST['u_location']);
                    $u_gender = htmlentities($_POST['u_gender']);

                    $update = "update users set user_name = '$user_name',user_email = '$email', user_location='$u_location', user_gender = '$u_gender' where user_email='$user'";
                    
                    $run = mysqli_query($con, $update);

                    if($run){
                        echo "<script>window.open('account_setting.php', '_self')</seript>";
                    }
                }
            
            ?>
        </div>
        <div class = "col-sm-2">

        </div>
    </div>
</body>
</html>
<?php 
     
?>