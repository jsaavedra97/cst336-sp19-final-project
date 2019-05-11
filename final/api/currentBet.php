<?php
  session_start();
  $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);
  switch($httpMethod) {
    case "OPTIONS":
      // Allows anyone to hit your API, not just this c9 domain
      header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
      header("Access-Control-Allow-Methods: POST, GET");
      header("Access-Control-Max-Age: 3600");
      exit();
    case "GET":
      // TODO: Access-Control-Allow-Origin
      $host = "127.0.0.1";
      $dbname = "final";
      $username = "straderz";
      // $username= "joshaavedra";
      $password = "";
  
      // Get Data from DB
      $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
      $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
      $email = $_SESSION['email_address'];
      $sql = "SELECT * FROM current_bet WHERE email_address =" . $email;
      
      
      $_SESSION["email_address"] = ":email_address";
      
      $stmt = $dbConn->prepare($sql);
      $stmt->execute(array (":email_address" => $_POST['email_address']));
      
      $record = $stmt->fetchAll();
      
      // Allow any client to access
      header("Access-Control-Allow-Origin: *");
      // Let the client know the format of the data being returned
      header("Content-Type: application/json");
      // Sending back down as JSON
      echo json_encode($record);
      break;
    case 'POST':
      // Get the body json that was sent
      //var_dump($rawJsonString);
      // Make it a associative array (true, second param)
      $jsonData = json_decode($rawJsonString, true);
      // TODO: do stuff to get the $results which is an associative array
      
      break;
    case 'PUT':
      // TODO: Access-Control-Allow-Origin
      http_response_code(401);
      echo "Not Supported";
      break;
    case 'DELETE':
      // TODO: Access-Control-Allow-Origin
      http_response_code(401);
      break;
  }
?>