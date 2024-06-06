<?php
$connect = mysqli_connect("localhost" , "root" , "sakshi@123" , "vote") or die("connection failed");
if($connect)
{
	echo "Connected";
}
else
{
	echo "Not Connected";
}
?>