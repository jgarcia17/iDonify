<?php
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
 ?>



<?php
    function getDatabaseConnection($dbname = 'db_idonify'){
        $host = "localhost";
        $username = "root";
        $password = "";
		
		//b8699c37b7c87b:0014e75f@us-cdbr-iron-east-02.cleardb.net/heroku_1b1cce36d90c711
    
        //when connecting from Heroku
        if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
            $host = "us-cdbr-iron-east-02.cleardb.net";
            $username = "b8699c37b7c87b";
            $password = "0014e75f";
    
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $host = $url["host"];
            $dbname = substr($url["path"], 1);
            $username = $url["user"];
            $password = $url["pass"];
        } 
    
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        return $dbConn;
    }
?>
