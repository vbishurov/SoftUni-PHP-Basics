<?php
$keyWord = json_decode('{"row4":"operator"}', true);
$suggestions = json_decode('["generally","objects","system","like","need"]');
preg_match_all('/row.*(\d)\b/', key($keyWord), $output);
$row = $output[1][0];
$keyWord = $keyWord[key($keyWord)];
$maxLengthWord = '';
$columnMatch = 0;
for ($i = 0; $i < count($suggestions); $i++) {
    if (strlen($suggestions[$i]) <= strlen($keyWord)) {
        for ($j = 0; $j < strlen($keyWord); $j++) {
            if ($suggestions[$i][$row - 1] == $keyWord[$j] && strlen($suggestions[$i]) > strlen($maxLengthWord)) {
                $maxLengthWord = $suggestions[$i];
                $columnMatch = $j;
            }
        }
    }
}
//echo "<table>";
//for ($currentRow = 0; $currentRow < strlen($keyWord); $currentRow++) {
//    echo "<tr>";
//    for ($column = 0; $column < strlen($keyWord); $column++) {
//        if($currentRow == strlen($keyWord) - $row -1) {
//            echo "<td>$keyWord[$column]</td>";
//        } else if($column == strlen($maxLengthWord) - $row -1 && $currentRow < strlen($maxLengthWord)-1) {
//            echo "<td>$maxLengthWord[$currentRow]</td>";
//        } else {
//            echo "<td></td>";
//        }
//    }
//    echo "</tr>";
//}
//echo "</table>";

foreach ($suggestions as $suggestion) {
    $sum = 0;
    for ($i = 0; $i < strlen($suggestion); $i++) {
        $sum += ord($suggestions[0][$i]);
    }
    echo $sum."\n";
}

?>
 