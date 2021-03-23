<?php
    $servername = "localhost";
    $username = "hellatechcom_admin";
    $password = "morniëtári";
    $dbname = "hellatechcom_controle";
    $conexao = new mysqli($servername, $username, $password, $dbname);

    if ($conexao->connect_error) 
    {
        die("Connection failed: " . $conexao->connect_error);
    }
?>