<!DOCTYPE html>
<?php 
    session_start();
    include("find_friend_function.php");

    if(!isset($_SESSION['user_email'])){
        header("location: signin.php");
    }
else { ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>search your friend</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/find_friend.css">

    
</head>
<body> 
   <nav class= "navbar navbar-expand-sm bg-dark navbar-dark">
    <a class= "navbar-brand" herf="#" >
        <?php 
        
            $user= $_SESSION['user_email'];
            $get_user = " select * from users where user_email = '$user'";
            $run_user = mysqli_query($con, $get_user);
            $row = mysqli_fetch_array($run_user);

            $user_name = $row['user_name'];
            echo "<a class='navbar-brand' href='../h1.php?user_name=$user_name'>Mychat<a/>";
        ?>
    </a>
    <ul class="navbar-nav">
            <li><a style="color:white; text-decoration:none; font-size:20px" href="../account_setting.php">Setting</a></li>
        </ul>
   </nav><br>

   <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <form class="search_form">
                <input type="text" name="search_query" placeholder="Search friend" autocomplete="off" required>
                <button class="btn" type="submit" name="search_btn">Search</button>
            </form>
        </div>
        <div class="col-sm-4">
        </div>
   </div><br><br>
   <?php search_user(); ?>
</body>
</html>
<?php } ?> 