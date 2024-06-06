<?php
	session_start();
	if(!isset($_SESSION['userdata']))
	{
		header("location:index.html");
	}

	$userdata = $_SESSION['userdata'];
	$grpdata  = $_SESSION['grpdata'];

	if($_SESSION['userdata']['status'] == 0)
	{
		$status = '<b style="color:red"> Not voted </b>';
	}
	else
	{
		$status = '<b style="color:green"> Voted </b>';
	}
?>



<html>
	<head>
		<title>Online Voting System</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>

		<style>
			
			body
			{
				background-size: cover;
				background-repeat: no-repeat;
				background-image:linear-gradient(45deg,orange ,white ,green);
			}

			#logoutbtn 
			{
				float: right;
 				background-color: #00BFA6;
 				padding: 8px 8px;
 				color: #fff;
 				text-transform: uppercase;
 				letter-spacing: 2px;
 				cursor: pointer;
 				border-radius: 10px;
 				border: 2px dashed #00BFA6;
 				box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
 				transition: .4s;
			}

			#logoutbtn span:last-child 
			{
 				display: none;
			}

			#logoutbtn:hover 
			{
 				transition: .4s;
 				border: 2px dashed #00BFA6;
 				background-color: #fff;
 				color: #00BFA6;
			}

			#logoutbtn:active 
			{
 				background-color: #87dbd0;
			}

			#profile
			{
				background-color: white;
				width: 30%;
				padding: 20px;
				float: left;
			}

			#Group
			{
				background-color: white;
				width: 60%;
				padding: 20px;
				float: right;
			}

			#votebtn
			{
				padding: 5px;
				border-radius: 5px;
				font-size: 15px;
				background-color: blue;
				color:white;
			}

			#mainpanel
			{
				padding: 10px;
			}

			#aftervoted
			{
				padding: 5px;
				border-radius: 5px;
				font-size: 15px;
				background-color: green;
				color:white;
			}

			#userimg
			{
				border-radius: 50%;
				height: 150px;
				width: 150px;
			}

			#grpimg
			{
				border-radius: 50%;
				height: 100px;
				width: 100px;
			}

		</style>

		<div id="mainsection">
			<center>
			<div id="headersection">
				<a href="logout.php"><button id="logoutbtn">Logout</button></a>
			<h1> Online Voting System </h1>
		</div>
		</center>
		<hr>


		<div id="mainpanel">
		<div id="profile">
			<center><img id="userimg" src="uploads/<?php echo $userdata['photo'] ?>" height="100" width="100" ></center><br><br>
			<b>Name: <?php echo $userdata['name']?></b><br><br>
			<b>Mobile:<?php echo $userdata['mobile']?></b><br><br>
			<b>Address:<?php echo $userdata['address']?></b><br><br>
			<b>Status:<?php echo $status ?></b>

		</div>



		<div id="Group">
			<?php
				if($_SESSION['grpdata'])
				{
					for($i=0 ; $i<count($grpdata) ; $i++)
					{
						?>

						<div>
							<img id="grpimg" style="float:right" src="uploads/<?php  echo $grpdata[$i]['photo'];?> " height="100" width ="100">
							<b> Group Name : </b><?php echo $grpdata[$i]['name'] ;?> <br><br>
							<b> Votes :</b><?php echo $grpdata[$i]['votes'] ;?><br><br>

							<form action="vote.php" method="POST">
								<input type="hidden" name="gvotes" value="<?php echo $grpdata[$i]['votes']?>">
								<input type="hidden" name="gid" value="<?php echo $grpdata[$i]['id']?>">

								<?php
									if($_SESSION['userdata']['status'] == 0)
									{
										?>
										<input type="submit"  name="votebtn" value="Vote" id="votebtn">
										<?php
									}
									else
									{
										?>
										<button disabled type="button"  name="votebtn" value="Vote" id="aftervoted"> Voted </button>
										<?php
									}
								?>
								
							</form>
						</div>
						<hr>

						<?php
					}
				}
				else
				{

				}
			?>

		</div>
		</div>

		</div>


		
	</body>
</html>
