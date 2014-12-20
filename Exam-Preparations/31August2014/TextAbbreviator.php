<?php
$list = preg_split('/\r?\n/', $_GET['list'], -1, PREG_SPLIT_NO_EMPTY);
$maxSize = $_GET['maxSize'];

$list = array_map('trim', $list);
echo '<ul>';
foreach ($list as $str) {
    echo '<li>';
    if (strlen($str) > $maxSize) {
        $newStr = substr($str, 0, $maxSize) . '...';
        echo htmlspecialchars($newStr);
    } else {
        echo htmlspecialchars($str);
    }
    echo '</li>';
}
echo '</ul>';
?>
