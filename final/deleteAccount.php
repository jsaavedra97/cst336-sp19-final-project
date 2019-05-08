<?php
    include 'dbConnection.php';
    session_start();
    
    //remove PHPSESSID from browser
    if ( isset( $_COOKIE[session_name()] ) )
    setcookie( session_name(), “”, time()-3600, “/” );
    
    //clear session from globals
    $_SESSION = array();
    
    //clear session from disk
    session_destroy();
    
    $conn = getDatabaseConnection("ottermart");
    $productId = $_GET['productId'];
    
    $sql = "DELETE FROM om_product WHERE productId = :pId";
    
    $np = array();
    $np[':pId'] = $productId;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np); // We NEED to include $namedParameters here
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($records);
    
    
    header("Location: index.php");
?>
