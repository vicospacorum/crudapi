<?php
    $url="https://api.mynaparrot.com/bigbluebutton/hellatech/api/getMeetings?checksum=916fdcc09f4bf874086516b49e3a67ccf88731bc";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);    // get the url contents

    $data = curl_exec($ch); // execute curl request
    curl_close($ch);
    
    $xml = simplexml_load_string($data);
    print_r($xml);

    echo "<hr>";
    foreach($xml->meetings->meeting as $sala)
    {
        //$xml->meetings->meeting->meetingID;
        $Id = (string) $sala->meetingID;
        $IdInterno = (string) $sala->internalMeetingID;

        if (!empty($IdInterno))
        {
            require_once 'connectDB.php';

            $sql = "INSERT IGNORE INTO tutorias (IdInterno, Id) VALUES ('" . $IdInterno . "', 'hellatech_" . $Id . "');";
            
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
        }
        else
        {
            echo "Nenhuma Sessão em Andamento";
        }
    }
?>