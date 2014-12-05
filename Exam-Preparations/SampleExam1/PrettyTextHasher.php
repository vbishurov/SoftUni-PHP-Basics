<?php
$text = preg_split('//', $_GET['text'], NULL, PREG_SPLIT_NO_EMPTY);
$hashValue = $_GET['hashValue'];
$fontSize = $_GET['fontSize'];
$style = $_GET['fontStyle'];
if ($style == 'bold') {
    $style = 'font-weight:bold;';
} else {
    $style = "font-style:$style;";
}
for ($i = 0; $i < count($text); $i++) {
    $currentChar = ord($text[$i]);
    if ($i % 2 == 0) {
        $nextChar = $currentChar + intval($hashValue);
    } else {
        $nextChar = $currentChar - intval($hashValue);
    }
    $text[$i] = chr($nextChar);
}
$text = implode('', $text);
echo '<p style="font-size:' . $fontSize . ';' . $style . '">' . $text . '</p>';
?>
 