<?php
	session_start();
 	include("connect.php");

 	$votes = $_POST['gvotes'];
 	$total_votes = $votes+1;
 	$gid = $_POST['gid'];
 	$uid = $_SESSION['userdata']['id'];

 	$update_votes = mysqli_query($connect , "UPDATE user SET votes='$total_votes' WHERE id='$gid'");
 	$update_status = mysqli_query($connect , "UPDATE user SET status=1 WHERE id='$uid'");

 	if($update_votes and $update_status)
 	{
 		$groups = mysqli_query($connect , "SELECT id , name , votes ,photo from user where role=2");
 		$grpdata = mysqli_fetch_all($groups , MYSQLI_ASSOC);
 		$_SESSION['userdata']['status'] = 1;
		$_SESSION['grpdata'] = $grpdata;
		echo'
		<script>
		 	alert("Voting Successful!!!");
			window.location = "dashboard.php";
		</script>
		';

 	}
 	else
 	{
 		echo'
		<script>
		 	alert("Some error occured!!!");
			window.location = "dashboard.php";
		</script>
		';
 	}
?>