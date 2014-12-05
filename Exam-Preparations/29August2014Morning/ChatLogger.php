<?php
//$currentTime = $_GET['currentTime'];
//$chat = preg_split('/ \/ /',$_GET['messages']);
date_default_timezone_set('UTC');
$currentTime = date_create('12-08-2014 10:14:23');
$chat = preg_split('/ \/ /', 'Thanks :) / 11-08-2014 22:54:52
Hey John, happy birthday! / 10-08-2014 00:00:00
');
$messages = [];
for ($i = 0; $i < count($chat)-1; $i++) {
    $messages[$chat[$i]] = date_create($chat[$i+1]);
}
asort($messages);
foreach ($messages as $key => $value) {
    echo $key->format("Y-m-d H:i:s");
}

?>