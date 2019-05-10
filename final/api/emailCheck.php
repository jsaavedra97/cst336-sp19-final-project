<?php
    session_start();
	$email = $_SESSION['email_address'];
	
	// SELECT * FROM `history` NATURAL JOIN `user` WHERE history.email_address=user.email_address;
	// This statement loads what we need for bet history but idk how to get it 
	
    echo $email;
?>