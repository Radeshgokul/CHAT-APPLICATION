<?php 
    $con = mysqli_connect("localhost", "root", "", "mychat");

    $user = "SELECT * FROM users";

    $run_user = mysqli_query($con, $user);
    while($row_user = mysqli_fetch_array($run_user)){
        $user_id = $row_user['user_id'];
        $user_name = $row_user['user_name'];
        $user_profile = $row_user['user_profile'];
        $login = $row_user['log_in'];
        
        // Instead of echoing, store the HTML in a variable
        $output = "<li>
            <div class='chat-left-img'>
                <img src ='$user_profile'>
            </div>
            <div class='chat-left-details'>
                <p><a href='h1.php?user_name=$user_name'>$user_name</a></p>";
        if($login == 'online'){
            $output .= "<span><i class='fa fa-circle' aria-hidden='true'></i> Online</span>";
        } else {
            $output .= "<span><i class='fa fa-circle-o' aria-hidden='true'></i> Offline</span>";
        }
        $output .= "</div>
            </li>";
        
        echo $output; // Output after processing all users
    }
?>
