<?php
    //https://api.mynaparrot.com/bigbluebutton/XXXX/api/
    //downloadMP4
    //recordID=8b46e929c9e20d89f75df5d30bfdcc0b8b-1594097437792
    //checksum=b76be2cf5242bca922879ad2a976148f4e6c7b87


    $nodes = array();
    $metodo = 'downloadMP4';
    $query = 'recordID=';
    $salt = 'FpuoiloGsMtpeqDiGrOw';
    require_once 'connectDB.php';
    
    $sql = "SELECT Id FROM Videos;";
    
    try
    {
        $resultado = $conecta->query($sql);
        
        if($resultado != null) 
        {
            $i = 0;
            foreach($resultado as $linha) 
            {
                $recordID = $linha['Id'];
                echo "ID: " . $recordID;
                echo "<br>";
                $checksum= sha1($metodo . $query . $recordID . $salt);
                echo "Checksum: " . $checksum;
                echo "<br>";
                $url = "https://api.mynaparrot.com/bigbluebutton/hellatech/api/";
                $url .= $metodo . "?"; 
                $url .= $query . $recordID . "&checksum=" . $checksum;
                $nodes[$i] = $url;
                $i++;
                echo $url;

                echo "<br>";
                echo "<br>";
                //echo "calling...";
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

    /*
        <response>
            <returncode>SUCCESS</returncode>
            <messageKey>gotURL</messageKey>
            <mp4url>http%3A%2F%2Fr2.mynaparrot.es%2F5c1e0bcafdc34371b447d952f41b189497298f1f-1617072241310.mp4%3Fkey%3Df2rf_GDQ2GK2om7M9ZTKzQ%26expires%3D1617324878</mp4url>
        </response>
    */

    /*
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
    */
?>