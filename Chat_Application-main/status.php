
<!DOCTYPE html>
<?php 
    session_start();
    include("include/find_friend_function.php");
    include("include/status_function.php");
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
    <link rel="stylesheet" href="css/status.css"> <!-- Your custom CSS file -->
</head>
<body> 
   <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="#">
        <?php 
            $user= $_SESSION['user_email'];
            $get_user = "SELECT * FROM users WHERE user_email = '$user'";
            $run_user = mysqli_query($con, $get_user);
            $row = mysqli_fetch_array($run_user);
            $user_name = $row['user_name'];
            echo "<a class='navbar-brand' href='h1.php?user_name=$user_name'>MyChat</a>";
        ?>
    </a>
    <ul class="navbar-nav">
        <li><a style="color:white; text-decoration:none; font-size:20px" href="account_setting.php">Setting</a></li>
    </ul>
   </nav><br>

   <div class="col-sm-3">
        <form class="search_form">
            <input type="text" name="search_query" placeholder="Search friend" autocomplete="off" required>
            <button class="btn btn-primary" type="submit" name="search_btn">Search</button>
        </form>
   </div>

   <div class="row">
        <div id="scrolling_to_bottom" class="col-sm-3 left-sidebar">
            <?php 
                 
                 if(isset($_GET['search_btn'])){
                     $search_query = htmlentities($_GET['search_query']);
                     $get_user = "select * from users where user_name like '%$search_query%' or user_location like '%$search_query%'";
                 }else{
                     $get_user = "SELECT * FROM users ORDER BY user_location , user_name DESC LIMIT 5";
                 }
 
 
         
                 $run_user = mysqli_query($con , $get_user);
         
                 while($row_user = mysqli_fetch_array($run_user)){
                     $user_id = $row_user['user_id'];
                     $user_name = $row_user['user_name'];
                     $user_profile = $row_user['user_profile'];
                     $location = $row_user['user_location'];
                     $gender =$row_user['user_gender'];
         
                     $get_user1 = "select * from users";
                     $run_user1 = mysqli_query($con, $get_user1);
                     while($row_user1 = mysqli_fetch_array($run_user1)){
                         $user_id1 = $row_user1['user_id'];
                     }
 
                     echo "
                         <div class='card'>
                             <img src='$user_profile'>
                             <p><b>$user_name</b></p>
                             <p><a href='friend.php?users_id={$row_user['user_id']}&userss_id=$user_id1'>view status</a></p>
                             <form method='post'>
                                 <p><button name='add'>Chat with $user_name</button></p>
                             </form>
                         </div><br><br>
                     ";
         
                     if(isset($_POST['add'])){
                         echo "<script>window.open('h1.php?user_name=$user_name','_self')</script>";
                     }
                 }
             
            ?>
        </div>
        <div class="col-sm-8 right-sidebar">
            <div class="container1">
                <h1>You can upload images</h1>
                <form action="uploadimg.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="image">
                    <button class="btn btn-success" type="submit" name="submit">Upload</button><br>
                    <textarea name="text" cols="30" rows="4" placeholder="Say something about this..."></textarea>
                </form>
                
                <?php 
                   
                   $sql = "SELECT * FROM users WHERE user_email = '$user' LIMIT 1";
                   $result = mysqli_query($con, $sql);
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_assoc($result)){
                           $x = $row['user_id'];

                           $_SESSION['x']=$x;


                           $sqlimg = "SELECT * FROM status WHERE user_status_id ='$x'";
                           $resultimg = mysqli_query($con, $sqlimg);
                           while($rowimg = mysqli_fetch_assoc($resultimg)){
                               $y = $rowimg['imgs'];
                               echo "<div class='im'>";
                               echo "<button type='button' data-toggle='modal' data-target='#myModal'><img src='images/".$rowimg['imgs']."'></button>";
                               echo "<div id = 'myModal' class='modal fade' role='dialog'>
                               <div class='modal-dialog'>
                                   <div class='modal-content'>
                                       <div class='modal-header'>
                                           <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                       </div>
                                       <div class='modal-body'>
                                       
                                           <img src='images/".$y."'>
                                       
                                       </div>
                                       <div class='modal-footer'>
                                           <button type='button' classs='btn btn-default' data-dismiss='modal'>Close</button>
                                       </div>
                                   </div>
                               </div>
                           </div>";
                               echo "<p>".$rowimg['text']."</p>";
                               echo "<b>  </b>"." "."<b><p>".$rowimg['time']."</p></b>";
                               echo "<b> : </b>"." "."<a href=\"delete-img.php?oop=deletee&imgs={$rowimg['imgs']}&text={$rowimg['text']}\">delete</a>";
                           echo "</div>";
                           }
                       }
                   }
                                   
            
                ?>
                 <?php 
                        // Check if $y is set before trying to display the modal
                        if(isset($y)) {
                            echo "<div id = 'myModal' class='modal fade' role='dialog'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                    </div>
                                    <div class='modal-body' id='hi'>
                                    
                                        <img src='images/".$y."'>
                                    
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' classs='btn btn-default' data-dismiss='modal'>Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        }
                    ?>
                    

            </div>
        </div>
   </div><br><br>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.min.js" integrity="sha256-iMTCex8BQ+iVxpZO83MoRkKBaoh9Dz9h3tEVrM5Rxqo=" crossorigin="anonymous"></script>
<script>
    $('#scrolling_to_bottom').animate({
        scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight
    }, 1000);
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var height = $(window).height();
        $('.left-sidebar').css('height',(height - 92)+ 'px');
    });
</script>
   
</body>
</html>








