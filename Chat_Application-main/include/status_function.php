
<?php 
    // Establish database connection
    $con = mysqli_connect("localhost", "root", "", "mychat") or die("Connection was not established");

    // Function to retrieve and display user images
    function getimage(){
        global $con;

        // Check if form is submitted
        if(isset($_POST['submit'])){
            // Get user email from form input
            $user_email = $_POST['user_email'];
            
            // Query to fetch user details based on email
            $query_user = "SELECT * FROM users WHERE user_email = '$user_email' LIMIT 1";
            $result_user = mysqli_query($con, $query_user);
            
            // If user exists
            if(mysqli_num_rows($result_user) > 0){
                while($row_user = mysqli_fetch_assoc($result_user)){
                    $user_id = $row_user['user_id']; // User ID from users table

                    // Query to fetch images associated with the user
                    $query_images = "SELECT * FROM status WHERE user_status_id ='$user_id'";
                    $result_images = mysqli_query($con, $query_images);
                    
                    // Display images
                    while($row_image = mysqli_fetch_assoc($result_images)){
                        echo "<img src='images/".$row_image['imgs']."'>";
                    }
                }
            }
        }
    }
?>
