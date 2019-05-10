<?php
function getDatabaseConnection($dbname = 'final'){
   $host = 'localhost';
   $username = 'root';
   $password = '';
   //checking whether the URL contains "herokuapp" (using Heroku)
   if(strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
       $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
       $host = $url["host"];
       $dbname = substr($url["path"], 1);
       $user = $url["user"];
       $pass = $url["pass"];
   }
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}
?>