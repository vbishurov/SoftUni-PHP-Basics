<?php
$recipient = htmlspecialchars($_GET['recipient']);
$subject = htmlspecialchars($_GET['subject']);
$body = htmlspecialchars($_GET['body']);
$key = $_GET['key'];

$message = "<p class='recipient'>$recipient</p><p class='subject'>$subject</p><p class='message'>$body</p>";

$result = array();
$msgLen = strlen($message);
$keyLen = strlen($key);
$result = '|';
for ($i = 0; $i < $msgLen; $i++) {
    $keyLetterValue = ord($key[$i % $keyLen]);
    $messageLetterValue = ord($message[$i]);
    $encryptedChar = $keyLetterValue * $messageLetterValue;
    $hex = dechex($encryptedChar);
    $result .= $hex. '|';
}

echo $result;
?>
