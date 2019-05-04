<?php
    
    include 'dbConnection.php';
    $conn = getDatabaseConnection("final");
    
    $sql = "SELECT email_address FROM user WHERE email_address = :email_address";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute(); // We NEED to include $namedParameters here
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($records);
    

?>