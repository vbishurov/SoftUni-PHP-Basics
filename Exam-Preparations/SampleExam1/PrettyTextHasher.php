<?php
//$text = preg_split('//',$_GET['text']);
//$hashValue = $_GET['hashValue'];
//$fontSize = $_GET['fontSize'];
//$style = $_GET['style'];
$text = preg_split('//','Warning: Our encryption is unbreakable and you will not be able to decrypt your information!', NULL, PREG_SPLIT_NO_EMPTY);
$hashValue = '1';
$fontSize = '30';
$style = 'bold';

for ($i = 0; $i < count($text); $i++) {
    $currentChar = ord($text[$i]);
    if ($i % 2 == 0) {
        $nextChar = $currentChar + intval($hashValue);
    } else {
        $nextChar = $currentChar - intval($hashValue);
    }
    echo chr($nextChar);
}
?>
 