<?php
$text = $_GET['text'];

preg_match_all('/\b([A-Z]+\d?[A-Z]*\d?[A-Z]*)\b/', $text, $result);
$result = $result[0];
$result = array_unique($result);
sort($result);
var_dump($result);
for ($i = 0; $i < count($result); $i++) {
    $reversed = strrev($result[$i]);
    if ($result[$i] == $reversed) {
        $reversed = doubleLetters($reversed);
    }
    $pattern = '/\b' . $result[$i] . '\b/';
    $text = preg_replace($pattern, $reversed, $text);
}

echo '<p>' . htmlspecialchars($text) . '</p>';

function doubleLetters($str)
{
    $newStr = '';
    for ($i = 0; $i < strlen($str); $i++) {
        if (ctype_alpha($str[$i])) {
            $newStr .= $str[$i] . $str[$i];
        } else {
            $newStr .= $str[$i];
        }
    }
    return $newStr;
}

?>
