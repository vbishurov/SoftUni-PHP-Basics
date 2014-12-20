<?php
$text = $_GET['text'];
$red = str_pad(dechex($_GET['red']), 2, "0", STR_PAD_LEFT);
$green = str_pad(dechex($_GET['green']), 2, "0", STR_PAD_LEFT);
$blue = str_pad(dechex($_GET['blue']), 2, "0", STR_PAD_LEFT);
$frequency = $_GET['nth'];

$color = '#' . $red . $green . $blue;
echo "<p>";
for ($i = 1; $i <= strlen($text); $i++) {
    $style = " style=\"color: $color\"";
    if ($i % $frequency == 0) {
        echo "<span" . $style . ">" . htmlspecialchars($text[$i - 1]) . "</span>";
    } else {
        echo htmlspecialchars($text[$i - 1]);
    }

}
echo "</p>";
?>
