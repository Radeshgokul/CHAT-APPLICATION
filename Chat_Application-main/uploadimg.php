<?php 
    session_start();
    
    include("include/connection.php");
    $user= $_SESSION['user_email'];
    $pppp =  $_SESSION['x'];
    
?>

<?php  
	if(isset($_POST['submit'])){
        $file_name = rand(1000,100000)."-".$_FILES['image']['name'];
        $file_loc = $_FILES['image']['tmp_name'];
        $folder = "images/";
        $new_file_name = strtolower($file_name);
        $final_file = str_replace(' ','-',$new_file_name);
    
        $text = $_POST['text'];
    
        if(move_uploaded_file($file_loc, $folder.$final_file)){
            header("location: status.php?uploadsuccess");

            $sql = "INSERT INTO status ( user_status_id, imgs, text) VALUES ('$pppp','$final_file', '$text')";
            mysqli_query($con, $sql);
            header('location: status.php');
        }

        $query = "UPDATE status SET time = NOW() WHERE user_status_id='$pppp'";
        $result_set = mysqli_query($con, $query);
        if(!$result_set){
            die("database query failed");
        }
        
    }

    // Close the database connection
    mysqli_close($con);
?>

