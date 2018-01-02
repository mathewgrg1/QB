<?php
function encrypt($str) {
    $len=strlen($str);
    $encText="";
    $walker = 0;
    while($walker < $len) {
        $encText.= chr((ord(substr($str,$walker,1))+25)%256);
        $walker++;
    }
    return $encText;
}
?>