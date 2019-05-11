<?php
  // Not done, getting some type of access error
  include "api/dbConnection.php";
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
      // echo "cheese";
      $rawJsonString = file_get_contents("php://input");

      // Make it a associative array (true, second param)
      $jsonData = json_decode($rawJsonString, true);

      // TODO: do stuff to get the $results which is an associative array
      $host = "127.0.0.1";
      $dbname = "final";
      // Comment and uncomment appropriate local database name
      $username = "straderz";
      // $username = "joshsaavedra";
      $password = "";
  
      $db = getDatabaseConnection();
      try{
        $query  = "INSERT INTO `users` (email_address, password, id) VALUES (jsaavedra@csumb.edu, cheese, 21)";
        $statement = $db->prepare($query);
        $statement->execute(array(
          ":email_address" => $_POST['email'],
          ":password" => $_POST['password'],
          ":id" => $_POST[21]
          ));
        
        $_SESSION["email_address"] = $_POST['email'];

        echo json_encode($records);
      }
      
      catch (PDOException $ex) {
        switch ($ex->getCode()) {
          case "23000":
            echo json_encode(array(
              "details" => $ex->getMessage()));
            break;
          default:
            echo json_encode(array(
              "details" => $ex->getMessage()));
            break;
        }
        exit;
      }
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