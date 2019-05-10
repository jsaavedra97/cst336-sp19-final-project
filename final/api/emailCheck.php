<?php
    session_start();
	$email = $_SESSION['email_address'];
    echo $email;
?>