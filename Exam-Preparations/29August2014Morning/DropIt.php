<?php
$input = preg_split('//',$_GET['text']);
$minFontSize = $_GET['minFontSize'];
$maxFontSize = $_GET['maxFontSize'];
$step = $_GET['step'];
$currentFontSize = $minFontSize;
$decoration = "";
$increasing = true;
for ($i = 1; $i < count($input) - 1; $i++) {
    $isEvenChar = ord($input[$i]) % 2 == 0;
    if ($isEvenChar) {
        $decoration = "text-decoration:line-through;";
    } else {
        $decoration = "";
    }
    echo "<span style='font-size:$currentFontSize;$decoration'>".htmlspecialchars($input[$i])."</span>";
    if ((ord($input[$i]) >= 65 && ord($input[$i]) <= 90) || (ord($input[$i]) >= 97 && ord($input[$i]) <= 122)) {
        if ($increasing) {
            $currentFontSize += $step;
        } else {
            $currentFontSize -= $step;
        }
        if (($currentFontSize >= $maxFontSize || $currentFontSize <= $minFontSize)) {
            $increasing = !$increasing;
        }
    }
}
?>
 