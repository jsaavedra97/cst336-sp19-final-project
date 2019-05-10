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
      http_response_code(401);
      echo "Not Supported";
      break;
    case 'POST':
      // Get the body json that was sent
      $rawJsonString = file_get_contents("php://input");

      //var_dump($rawJsonString);

      // Make it a associative array (true, second param)
      $jsonData = json_decode($rawJsonString, true);

      // TODO: do stuff to get the $results which is an associative array
      $host = "127.0.0.1";
      $dbname = "final";
      $username = "straderz";
      $password = "";
  
      // Get Data from DB
      $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
      $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

      $sql = "SELECT * FROM user " .
             "WHERE email_address = :email_address ";
      
      $_SESSION["email_address"] = ":email_address";
      
      $enteredPassword = $_POST["password"];
      //console.log($enteredPassword);
      
      $options = [
          'cost' => 11,
      ];
      $hashedPassword = password_hash($enteredPassword, PASSWORD_BCRYPT, $options);
      
      $stmt = $dbConn->prepare($sql);
      $stmt->execute(array (":email_address" => $_POST['email_address']));
      
      $record = $stmt->fetch();
      
      $isAuthenticated = password_verify($hashedPassword, $record["password"]);
        
      if ($isAuthenticated) {
        $_SESSION["email_address"] = $record["email_address"];
        //$_SESSION["isAdmin"] = $record["isAdmin"];
      }
      
      // Allow any client to access
      header("Access-Control-Allow-Origin: *");
      // Let the client know the format of the data being returned
      header("Content-Type: application/json");

      // Sending back down as JSON
      echo json_encode(array("isAuthenticated" => $isAuthenticated));

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