<?php
$input = json_decode($_GET['jsonTable']);

$words = $input[0];
$k = $input[1][0];
$s = $input[1][1];

for ($i = 0; $i < count($words); $i++) {
    $newStr = '';
    for ($char = 0; $char < strlen($words[$i]); $char++) {
        $word = strtoupper($words[$i]);
        if (ctype_alpha($word[$char])) {
            $x = ord($word[$char]) - ord('A');
            $newChar = (($k * $x + $s) % 26) + ord('A');
            $newStr .= strtoupper(chr($newChar));
        } else {
            $newStr .= strtoupper($word[$char]);
        }
    }
    $words[$i] = $newStr;
}

$maxLength = 0;
foreach ($words as $word) {
    if (strlen($word) > $maxLength) {
        $maxLength = strlen($word);
    }
}


echo "<table border='1' cellpadding='5'>";
if (count($words) == 1 && $words[0] == '') {
    echo "<tr><td></td></tr></table>";
    die;
}
for ($i = 0; $i < count($words); $i++) {
    $word = $words[$i];
    echo "<tr>";
    for ($char = 0; $char < $maxLength; $char++) {
        $chr = '';
        if (!empty($word[$char])) {
            $chr = htmlspecialchars($word[$char]);
            echo "<td style='background:#CCC'>$chr</td>";
        } else {
            echo "<td></td>";
        }
    }
    echo "</tr>";
}

echo "</table>";
?>