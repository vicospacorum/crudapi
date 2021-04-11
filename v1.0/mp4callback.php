<?php
    require_once 'connectDB.php';

    $sql = "INSERT INTO Videos (Id, videoURL) VALUES ('" . $_POST['recordId']  . "', '" . $_POST['mp4Link']  . "');";
    
    try
    {
        $resultado = $conecta->query($sql);
        
        echo 'Id inserido com sucesso!';
    }
    catch(PDOException $e)
    {
        echo 'ERRO!';
        echo $e;
    }
?>