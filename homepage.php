
<html>
<head>
    <meta charset="UTF-8">
    <title>Personal Scheduler</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<section>
<form action='add.php' method='post'>
	<span class='input_names'>Event</span><input type='text' name='event'>
	<span class='input_names'>Date</span><input type='date' name='event_date' min='01-04-2016'>
	<span class='input_names'>Time</span><input type='time' name='event_time'>
	<input type='submit' value='ADD' style='margin-left:6em'><br><br><br><br>
</form>

<?php
	//-------------session_start();
	//check the active session
	//include "include/verify_login.php";
	//connect to the database
	require 'include/connect_database.php';
	require 'include/table_heading_variables.php';
	//retrieve the user id from the server
	//----------------$id=$_SESSION['id'];
	//get the variable for the order of display in the  table
	if(isset($_GET['order_by']) and in_array($_GET['order_by'], $table_heading_variables))
	{
		$order_by=$_GET['order_by'];
	}
	else 
		$order_by='timestamp';
	//MySql query string
	//-----------$query="SELECT * FROM schedule where id='$id' ORDER BY '$order_by'";
	$query="SELECT * FROM main ORDER BY $order_by";//remove this later
	//sending the query
	$fetch_string=$conn->query($query);
	//print the table headings as a link (print to the heading in uppercase but note that the name in array
	// and the database is in the lower case letters)
	echo '<div  class="tbl-header">';
	echo '<table cellpadding="0" cellspacing="0" border="0"><tr>';
	foreach($table_heading_variables as $heading)
	{
		if ($heading=='timestamp')
			continue;
		echo '<th><a href="homepage.php?order_by='.$heading.'">'.strtoupper($heading).'</a></th><br>';
	}
	echo '<th>&nbspEDIT</th></tr></div></table>';
	//print all the fetched data to the table
	echo '<div  class="tbl-content">';
	echo '<table cellpadding="0" cellspacing="0" border="0">';
	while($r=$fetch_string->fetch())
	{
		echo '<tr>';
		foreach($table_heading_variables as $heading)
		{
			if ($heading=='timestamp')
				continue;
			echo '<td>'.$r[$heading].'</td>';
		}
		echo '<td><a href="delete.php?ts='.$r['timestamp'].'&order_by='.$order_by.'">DEL</td>';
		echo '</tr>';
	}
	echo '</div>';
	echo '</table>';
	

?>
</section>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
</body>
</html>