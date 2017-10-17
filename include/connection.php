<?php

session_start();
// TIMEZONE SETUP - Goddady timezone is not GMT
date_default_timezone_set('UTC');
//Starting session for all pages

function conn(){
	return mysqli_connect("localhost","root","jony","perez_cells_db");

}

$conn = conn();
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error($conn);
  }


	
?>