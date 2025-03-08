


<?php 


include("include/connection.php");
session_start();
	if($_GET['x']=="y"){
		$del_profile_img = $_GET['image'];
		

		$query = "update users set user_profile='images/download.jpg' WHERE user_profile='$del_profile_img'";
		$result = mysqli_query($con, $query);
		if($result){
			echo "<script type='text/javascript'>
					alert('Your post is deleted');
				</script>";
			echo "<script>window.open('upload.php', '_self')</script>";
		}else{
			echo "<script type='text/javascript'>
					alert('Your post is not deleted');
				</script>";
			echo "<script>window.open('upload.php', '_self')</script>";
		}
	}else{
        echo "sampath";
	}

?>
<?php 
    mysqli_close($con);
?>
