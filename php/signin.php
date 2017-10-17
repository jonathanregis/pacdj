<?php
require('../include/engine.php');

// If form submitted, insert values into the database.
if (isset($_POST['submit'])){
        // removes backslashes
	$username = stripslashes($_POST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($conn,$username);
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($conn,$password);
	$user = new User;
	$login = $user->login($username,$password);
	if($login){
	    header("Location: ../home.php");
         }

    else{
    	echo "Login failed!";
	/*$notification = "<div class='form'>
	<h3>Username/password is incorrect.</h3>
	<br/>Click here to <a href='login.php'>Login</a></div>";*/
		}
    }
?>