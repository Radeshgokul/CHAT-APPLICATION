<?php 
    session_start();
    include("include/connection.php");

    
	if($_GET['op']=="delete"){
		$msg = $_GET['msg'];
		$username  = $_GET['user_name'];
		$query = "DELETE FROM users_chats WHERE msg_content='$msg'";
		$result = mysqli_query($con, $query);
		if($result){
			echo "<script type='text/javascript'>
					alert('delete this message');
					window.location = 'h1.php?&user_name=$username';
					
				</script>";
			//	echo "<script>window.open('home.php', '_self')</script>";
				
			
			
			
		}else{
			echo "<script type='text/javascript'>
					alert('Your pomessagest is not deleted');
				</script>";
			echo "<script>window.open('h1.php', '_self')</script>";
		}
	}else{

	}

?>
