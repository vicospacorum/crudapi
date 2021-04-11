<?php
    $nodes = array();
    $metodo = 'processMynaReport';
    $query1 = 'internalMeetingID=';
    $query2 = '&reportCallbackUrl=https%3A%2F%2Fhellatech.com.br%2F123%2Fcallback.php';
    $salt = 'FpuoiloGsMtpeqDiGrOw';
    require_once 'connectDB.php';
    
    $sql = "SELECT IdInterno FROM tutorias WHERE Atualizado = 0;";
    
    try
    {
        $resultado = $conecta->query($sql);
        
        if($resultado != null) 
        {
            $i = 0;
            foreach($resultado as $linha) 
            {
                $meetingID = $linha['IdInterno'];
                echo "ID: " . $meetingID;
                echo "<br>";
                $checksum= sha1($metodo . $query1 . $meetingID . $query2 . $salt);
                // echo "Checksum: " . $checksum;
                // echo "<br>";
                $url = "https://api.mynaparrot.com/bigbluebutton/hellatech/api/";
                $url .= $metodo . "?"; 
                $url .= $query1 . $meetingID . $query2 . "&checksum=" . $checksum;
                $nodes[$i] = $url;
                $i++;
                echo $url;

                echo "<br>";
                echo "<br>";
                echo "calling...";
                //$get_data = callAPI('GET', $url, false);
                //$xml = simplexml_load_string($get_data);
                echo "<br>";
                //print_r($xml);

                echo "<hr>";
            }
        }
    }
    catch(PDOException $e)
    {
        echo 'ERRO!';
        echo $e;
    }

    echo "<hr>";
    echo "<hr>";
    print_r($nodes);
    $node_count = count($nodes);

    $curl_arr = array();
    $master = curl_multi_init();
    
    for($i = 0; $i < $node_count; $i++)
    {
        $url = $nodes[$i];
        $curl_arr[$i] = curl_init($url);
        curl_setopt($curl_arr[$i], CURLOPT_RETURNTRANSFER, true);
        curl_multi_add_handle($master, $curl_arr[$i]);
    }
    
    do 
    {
        curl_multi_exec($master,$running);
    } while($running > 0);

    echo "results: ";
    for($i = 0; $i < $node_count; $i++)
    {
        $results = curl_multi_getcontent  ( $curl_arr[$i]  );
        $xml = simplexml_load_string($results);
        echo "<br>";
        echo "<br>";
        print_r($xml);
        echo( $i . "\n" . $nodes[$i] . $results . "\n");
        echo "<hr>";
    }
    echo 'done';
?>