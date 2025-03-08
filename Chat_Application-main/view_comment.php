<?php
session_start();
include("include/connection.php");

// Get image ID and user name from URL parameters
$image_id = $_GET['id'];
$user_name = $_GET['name'];

// Display user name and image
echo "<p>$user_name</p>";
echo "<img src='images/$image_id'>";

// Select comments associated with the image
$sqla = "SELECT * FROM comments WHERE comment_status_id = '$image_id'";
$result = mysqli_query($con, $sqla);

// Display comments
while ($row = mysqli_fetch_assoc($result)) {
    $comment = $row['comment'];

    // Get user name associated with the comment
    $comment_user_id = $row['user_id'];
    $sql_user = "SELECT user_name FROM users WHERE user_id = '$comment_user_id' LIMIT 1";
    $result_user = mysqli_query($con, $sql_user);
    $row_user = mysqli_fetch_assoc($result_user);
    $comment_user_name = $row_user['user_name'];

    // Display comment and user name
    echo "<p>Comment by: $comment_user_name</p>";
    echo "<p>$comment</p>";
}
?>
