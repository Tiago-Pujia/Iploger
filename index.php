<?php
$url_redirect = 'https://www.youtube.com/watch?v=dQw4w9WgXcQ';

function get_client_ip() {
    $ipaddress = '';

    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');

    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');

    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');

    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');

    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');

    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');

    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}

function write_ip(){
    $notebook_txt = fopen('visitors.txt','a');

    $text = "\n". get_client_ip() . ' | ' . date('Y/m/d - H:i:s a');

    fwrite($notebook_txt,$text);
    fclose($notebook_txt);    
}

write_ip();
header("Location: $url_redirect");
?>