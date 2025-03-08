
<?php
session_start();
include("include/connection.php");

// Define $username1 here to avoid undefined variable warnings
$username1 = "";

if (!isset($_SESSION['user_email'])) {
    header("location: signin.php");
    exit(); // Add exit after redirection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mychat - home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body> 
   
    <div class="container main-section">
        <div class = "row">
            <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
                <div class="input-group searchbox">
                    <div class="input-group-btn">
                        <center>
                            <a href="include/find_friend.php">
                            <button class="btn btn-default search-icon" name = "search_user" type = "submit">Add new user</button></a>
                             <a href="status.php">
                            <button class="btn btn-default search-icon" name = "search_user" type = "submit">status</button></a>
                        </center>
                        
                    </div>
                </div> 
                <div class="left-chat">
                    <ul>
                        <?php include("include/get_users_data.php"); ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
                <div class="row">
                    <!--getting the user information who is logged in -->
                    <?php
                        $user = $_SESSION['user_email'];
                        $get_user = "SELECT * FROM users WHERE user_email = '$user'";
                        $run_user = mysqli_query($con, $get_user);
                        $row = mysqli_fetch_array($run_user);

                        $user_id = $row['user_id'];
                        $user_name = $row['user_name'];

                    ?>
                    <!-- getting the user data on which click -->
                    <?php
                        if(isset($_GET['user_name'])){

                            global $con;
                            $get_username = $_GET['user_name'];
                            
                            $get_user = "select * from users where user_name = '$get_username'";
                            
                            $run = mysqli_query($con, $get_user);
                            $row1 = mysqli_fetch_array($run);
                            
                            if($row1){
                                $username1 = $row1['user_name'];
                                $user_profile_image = $row1['user_profile'];
                            }
                        }

                        $total_messages = "SELECT * FROM users_chats WHERE (sender_username = '$user_name' AND receiver_username = '$username1') OR ( receiver_username= '$user_name' 
                        AND sender_username = '$username1')";

                        $run_messages = mysqli_query($con, $total_messages);
                        $total = mysqli_num_rows($run_messages);
                    ?>
                    <div class="col-md-12 right-header">
                        <div class="right-header-img">
                            <img src="<?php echo $user_profile_image; ?>">
                        </div>
                        <div class="right-header-details">
                            <form  method="post">
                                <p><?php echo $username1; ?></p>
                                <span><?php echo $total; ?> messages</span>&nbsp &nbsp
                                <button name="logout" class="btn btn-danger">logout</button>
                            </form>
                            <?php
                                if(isset($_POST['logout'])){
                                    $update_msg = mysqli_query($con, "UPDATE users SET log_in = 'offline' WHERE user_name = '$user_name'");
                                     header("Location:logout.php");
                                    exit();
                                }
                            ?>
                        </div>
                    </div>
                </div>
                
                <div class = "row">
                    <div id= "scrolling_to_bottom" class="col-md-12 right-header-contentchat">
                        <?php
                            $update_msg = mysqli_query($con, "UPDATE users_chats SET msg_status = 'read'
                            WHERE sender_username = '$username1' AND receiver_username = '$user_name'");

                            $select_msg = "SELECT * FROM users_chats WHERE (sender_username = '$user_name' AND receiver_username = '$username1')
                            OR (receiver_username = '$user_name' AND sender_username = '$username1') ORDER BY msg_date ASC";
                            $run_msg = mysqli_query($con, $select_msg);

                            if(mysqli_num_rows($run_msg) > 0) {
                                while($row = mysqli_fetch_array($run_msg)){
                                    $sender_username = $row['sender_username'];
                                    $receiver_username = $row['receiver_username'];
                                    $msg_content = $row['msg_content'];
                                    $msg_date = $row['msg_date'];
                                    
                                    // Rest of your code for displaying messages
                                    ?>
                                    <ul>
                                    <?php 
                                        if($user_name == $sender_username && $username1 == $receiver_username ){
                                            echo "
                                                <li>
                                                    <div class='rightside-right-chat'>
                                                        <span>$username1 <small>$msg_date <a href='delete.php?op=delete&msg=$msg_content&user_name=$username1'>delete</a></small></span><br><br>
                                                        <p>$msg_content</p>
                                                    </div>
                                                </li>
                                            ";
                                        } elseif($user_name == $receiver_username && $username1 == $sender_username ){
                                            echo "
                                                <li>
                                                    <div class='rightside-left-chat'>
                                                        <span>$username1 <small>$msg_date <a href='delete.php?op=delete&msg=$msg_content'>delete</a></small></span><br><br>
                                                        <p>$msg_content</p>
                                                    </div>
                                                </li>
                                            ";
                                        }
                                    ?>
                                    </ul>
                                    <?php
                                }
                            } 
                            // else {
                                // echo "<p>No messages to display.</p>";
                            // }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 right-chat-textbox">
                        <form method="post">
                        <input autocomplete="off" type="text" name="msg_content" placeholder="write your msg">
                        <button class="btn" name="submit"><i class="fa fa-telegram" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <?php 
    if (isset($_POST['submit'])) {
        $msg = htmlentities($_POST['msg_content']);

        if (empty($msg)) {
            // Handle empty message case
        } elseif (strlen($msg) > 100) {
            echo "<div class='alert alert-danger'>
                    <strong><center>Message is too long, only 100 characters allowed</center></strong>
                  </div>";
        } else {
            $insert = "INSERT INTO users_chats (sender_username, receiver_username, msg_content,
                        msg_status, msg_date) VALUES ('$user_name', '$username1', '$msg', 'unread', NOW())";
            $run_insert = mysqli_query($con, $insert);
            if ($run_insert) {
                // Message sent successfully
                // You can redirect or show a success message here if needed
            }
        }
    }
    ?>

    <!-- JavaScript scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
    $('#scrolling_to_bottom').animate({
        scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight}, 1000);
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var height = $(window).height();
        $('.left-chat').css('height',(height - 92)+ 'px');
        $('.right-header-contentchat').css('height', (height - 163) + 'px');
    });
</script>
</body>
</html>
