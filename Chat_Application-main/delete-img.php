<?php 
    session_start();
    
    include("include/connection.php");
?>

<?php 
	if($_GET['oop']=="deletee"){
		$del_img = $_GET['imgs'];
		$del_txt = $_GET['text'];
		$query = "DELETE FROM status WHERE imgs='$del_img' AND text='$del_txt'";
		$result = mysqli_query($con, $query);
		if($result){
			echo "<script type='text/javascript'>
					alert('Your post is deleted');
					window.location.href=\"status.php?deleted\";
				</script>";
			unlink('./images/'.$del_img);
		}else{
			echo "<script type='text/javascript'>
					alert('Your post is not deleted');
					window.location.href=\"status.php?error\";
				</script>";
		}
	}else{

	}

?>
<?php 
    mysqli_close($con);
?>
