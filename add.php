<?php
//check the active session
//connect to the database
	require 'include/connect_database.php';
	require 'include/table_heading_variables.php';
//take the values from the post array and store into an array
	$event=NULL;
	$date=NULL;
	$time=NULL;
	if(isset($_POST['event']))
		$event=$_POST['event'];
	if (isset($_POST['event_date']))
		$date=$_POST['event_date'];
	if(isset($_POST['event_time']))
		$time=$_POST['event_time'];
//store the value of the timestamp to a variable
	$timestamp=time();

//write the store query
	$query="INSERT INTO main(date, event, timestamp, time) VALUES ('$date', '$event', '$timestamp', '$time')";
//run query
	if(!($conn->query($query)))
		{
			die("failed to store");
		}
//redirect to homepage
	header("Location:homepage.php");
?>