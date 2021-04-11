<?php
    $servername = "localhost";
    $username = "user";
    $password = "pass";
    $dbname = "database";
    
    try{
        $conecta = new PDO("mysql:dbname=$dbname; host=$servername; port=3306; charset=utf8", $username, $password);
        
        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "falha ao conectar: ". $e->getMessage();
    }
?>
