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
    echo "xml->returncode";
    echo '<br>';
    echo $xml->returncode;

    echo "<hr>";
    echo "xml->meetings->meeting->meetingID";
    echo '<br>';
    echo $xml->meetings->meeting->meetingID;
    //->meeting->meetingID);
    //meetingID
    //returncodes

    /*
    SimpleXMLElement Object ( 
        [returncode] => SUCCESS 
        [meetings] => SimpleXMLElement Object ( 
            [meeting] => SimpleXMLElement Object ( 
                [meetingName] => Sala de Aula 
                [meetingID] => 2aac419b0a458f0d3f9808be7eaaf1af1468fefc-25-16 
                [internalMeetingID] => 5c1e0bcafdc34371b447d952f41b189497298f1f-1616679632641
    */
    /*
    SimpleXMLElement Object ( 
        [returncode] => SUCCESS 
        [messageKey] => noMeetings 
        [message] => no meetings were found on any servers 
    ) 
    echo $xml->messageKey;
    */
?>
