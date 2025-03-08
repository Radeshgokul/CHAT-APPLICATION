<!DOCTYPE html>
<?php 
    session_start();
    include("include/find_friend_function.php");
    include("include/connection.php");

    if(!isset($_SESSION['user_email'])){
        header("location: signin.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Your Friend</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.cycle2.js"></script>
    
    <link rel="stylesheet" href="css/friend.css">
</head>
<body> 
   <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" herf="#">
        <?php 
            $user = $_SESSION['user_email'];
            $get_user = "SELECT * FROM users WHERE user_email = '$user'";
            $run_user = mysqli_query($con, $get_user);
            $row = mysqli_fetch_array($run_user);

            $user_name = $row['user_name'];
            echo "<a class='navbar-brand' href='h1.php?user_name=$user_name'>Mychat<a/>";
        ?>
    </a>
    <ul class="navbar-nav">
        <li><a style="color:white; text-decoration:none; font-size:20px" href="account_setting.php">Setting</a></li>
    </ul>
   </nav><br>

   <div class="row">
    <div class="col-sm-2 left-sidebar">
    </div>
    <div class="col-sm-8 right-sidebar">
        <div class="slideshow cycle-slideshow"
            data-cycle-timeout="2000"
            data-cycle-pause-on-hover="true"
            data-cycle-slides=">div "
        >
            <?php 
                $user_id = $_GET['users_id'];
                $sqlimg = "SELECT * FROM status WHERE user_status_id ='$user_id'";
                $resultimg = mysqli_query($con, $sqlimg);
                while($rowimg = mysqli_fetch_assoc($resultimg)){
                    echo "<div class='im'>";
                    echo "<img src='images/".$rowimg['imgs']."'>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-1 left-sidebar"></div>
    <div class="col-sm-11 right-sidebar">
        <div class="container1">
            <h1>You can upload images</h1>
            <?php 
                $user_id = $_GET['users_id'];
                $sqlimg = "SELECT * FROM status WHERE user_status_id ='$user_id'";
                $resultimg = mysqli_query($con, $sqlimg);
                while($rowimg = mysqli_fetch_assoc($resultimg)){
                    echo "<div class='im'>";
                    echo "<button><img src='images/".$rowimg['imgs']."'></button>";
                    echo "<p>".$rowimg['text']."</p>";
                    echo "<b></b>" . "<p>".$rowimg['time']."</p>";
                    echo "<form method='post'>
                            <div class='form-group'>
                                <input type='text' placeholder='comment' autocomplete='off' name='xxxy'>
                                <br>
                                <br>
                                <button class='btn' type='submit' name='submit'>Upload</button>
                                <br>
                                <a href='view_comment.php?id={$rowimg['imgs']}&name=$user_name'>View comments</a>
                            </div>
                        </form>";
                    echo "</div>";
                }

                if(isset($_POST['submit'])){
                    $xxxy = $_POST['xxxy'];
                    $sqls = "INSERT INTO comments (comment_status_id, comment) VALUES ('{$_GET['users_id']}', '$xxxy')";
                    $run = mysqli_query($con, $sqls);
                }
            ?>
        </div>
    </div>
</div><br><br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.min.js" integrity="sha256-iMTCex8BQ+iVxpZO83MoRkKBaoh9Dz9h3tEVrM5Rxqo=" crossorigin="anonymous"></script>
</body>
</html>
