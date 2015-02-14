<?php
preg_match_all('/^([a-zA-Z_]+)(?=\d).*\d(?<=\d)([a-zA-Z_]+)$/', $_GET['keys'], $keys);
$text = htmlspecialchars($_GET['text']);

if (!empty($keys[1][0]) && !empty($keys[2][0])) {
    $startKey = $keys[1][0];
    $endKey = $keys[2][0];

    $pattern = '/' . $startKey . '([\d,.]+?)' . $endKey . '/';
    preg_match_all($pattern, $text, $result);
    $sum = 0;
    for ($i = 0; $i < count($result[1]); $i++) {
        $sum += $result[1][$i];
    }
    if ($sum != 0) {
        echo "<p>The total value is: <em>$sum</em></p>";
    } else {
        echo "<p>The total value is: <em>nothing</em></p>";
    }
} else {
    echo "<p>A key is missing</p>";
}
?>
