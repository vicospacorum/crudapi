?php
    $servername = "localhost";
    $username = "user";
    $password = "pass";
    $dbname = "database";
    $conexao = new mysqli($servername, $username, $password, $dbname);

    if ($conexao->connect_error) 
    {
        die("Connection failed: " . $conexao->connect_error);
    }
?>
