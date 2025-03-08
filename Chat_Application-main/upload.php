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
    <title>Change Profile Picture</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            max-width: 400px;
            margin: auto;
            text-align: center;
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
        }

        .card img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 20px;
            margin-left:70px;
        }

        .card h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 15px;
        }

        #update_profile {
            display: inline-block;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s;
        }

        #update_profile:hover {
            background-color: #0056b3;
        }

        input[type="file"] {
            display: none;
        }

        button[type="submit"] {
            border: none;
            outline: none;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #28a745;
            color: #fff;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }

        p {
            margin-top: 20px;
        }

        p a {
            color: #dc3545;
            text-decoration: none;
            transition: color 0.3s;
        }

        p a:hover {
            color: #c82333;
        }
    </style>
</head>
<body>
    <?php  
        $user = $_SESSION['user_email'];
        $get_user = "SELECT * FROM users WHERE user_email = '$user'";
        $run_user = mysqli_query($con, $get_user);
        $row = mysqli_fetch_array($run_user);

        $user_name = $row['user_name'];
        $user_profile = $row['user_profile'];

        echo "
            <div class='card'>
                <img src='$user_profile' alt='Profile Picture'>
                <h1>$user_name</h1>
                
                <form method='post' enctype='multipart/form-data'>
                    <label id='update_profile'><i class='fa fa-camera' aria-hidden='true'></i> Select profile
                        <input type='file' name='u_image' accept='image/*'>
                    </label>
                    <button type='submit' name='update'><i class='fa fa-heart' aria-hidden='true'></i> Update Profile</button>
                </form>
                <p><a href=\"deleteprofile.php?x=y&image={$row['user_profile']}\">Delete your profile picture</a></p>
            </div><br><br>
        ";
        
        if(isset($_POST['update'])){
            $u_image = $_FILES['u_image']['name'];
            $image_tmp = $_FILES['u_image']['tmp_name'];
            $random_number = rand(1, 100);

            if($u_image == ''){
                echo "<script>alert('Please select a profile picture')</script>";
            } else {
                move_uploaded_file($image_tmp, "images/$u_image.$random_number");

                $update = "UPDATE users SET user_profile='images/$u_image.$random_number' WHERE user_email = '$user'";

                $run = mysqli_query($con, $update);

                if($run){
                    echo "<script>alert('Your profile picture has been updated')</script>";
                    echo "<script>window.open('upload.php', '_self')</script>";
                }
            }
        }
    ?> 
</body>
</html>
