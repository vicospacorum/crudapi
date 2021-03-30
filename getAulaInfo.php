<?php
    $metodo = 'processMynaReport';
    $query1 = 'internalMeetingID=';
    $query2 = '&reportCallbackUrl=https%3A%2F%2FXXXX.com.br%2Fcallback.php';
    $salt = '';

    require_once 'connectDB.php';

    $sql = "SELECT IdInterno  FROM tutorias WHERE Atualizado = 0;";
    
    try
    {
        $resultado = $conecta->query($sql);
        
        if($resultado != null) 
        {
            foreach($resultado as $linha) 
            {
                $meetingID = $linha['IdInterno'];

                $checksum= sha1($metodo . $query1 . $meetingID . $query2 . $salt);
                
                $url = "https://api.mynaparrot.com/bigbluebutton/XXXX/api/";
                $url .= $metodo . "?"; 
                $url .= $query1 . $meetingID . $query2 . "&checksum=" . $checksum;
            }
        }
    }
    catch(PDOException $e)
    {
        echo 'ERRO!';
        echo $e;
    }
?>