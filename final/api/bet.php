<?php
session_start();
require_once 'dbConnection.php';
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
      echo "Not Supported Get";
      break;
    case 'POST':
      // Allow any client to access
      header("Access-Control-Allow-Origin: *");
      // Let the client know the format of the data being returned
      header("Content-Type: application/json");
      // Get the body json that was sent
      $rawJsonString = file_get_contents("php://input");
      //var_dump($rawJsonString);
      // Make it a associative array (true, second param)
      $jsonData = json_decode($rawJsonString, true);
      
      //$email = $_SESSION["email_address"];
      $pick = $_POST["pick"];
      $match_bet = $_POST["match_bet"];
      $amount = $_POST["amount"];
      $game = "CSGO";
        
        $dbConn = getDatabaseConnection();
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  
        $sql = "INSERT INTO current_bet (email_address, pick, game, amount, match_bet) " .
               "VALUES (:email_address, :pick, :game, :amount, :match_bet) ";
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute(array (":email_address" => $email,
                              ":pick" => $pick,
                              ":game" => $game,
                              ":amount" => $amount,
                              ":match_bet" => $match_bet));
        $_SESSION["email_address"] = $record["email_address"];
        
        $_SESSION["isAdmin"] = false;
  
        // Sending back down as JSON
        echo json_encode(array("success" => true));
  
        
      break;
    case 'PUT':
      // TODO: Access-Control-Allow-Origin
      http_response_code(401);
      echo "Not Supported PUT";
      break;
    case 'DELETE':
      // TODO: Access-Control-Allow-Origin
      http_response_code(401);
      break;
  }
?>