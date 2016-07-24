
<?php
//start session
session_start();

//check if the session is active, if not, redirect to the index.php 
if(!isset($_SESSION['username']))
{
	header('Location:index.php');
	die();
}
?>