<?php
//check if the session is active
//connect to database
require 'include/connect_database.php';
//check if the timestamp is set
if(isset($_GET['ts']))
{
	$timestamp=$_GET['ts'];
}
else
{
	header('Location:homepage.php');
	die();
}
//write query
$query="DELETE FROM main WHERE timestamp='$timestamp'";
//call query
if (!$conn->query($query))
{
	die('failed to delete');
}
//redirect to homepage
header('Location:homepage.php?order_by='.$_GET['order_by']);
	die();
?>