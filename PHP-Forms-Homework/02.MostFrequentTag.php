<?php
echo '<form action="02.MostFrequentTag.php" method="post">';
echo '<input type="text" name="input">';
echo '<input type="submit">';
$input = preg_split('/,\s+/', $_POST['input'], NULL, PREG_SPLIT_NO_EMPTY);
$result = [];
$mostFrequent='';
$count = 0;
for ($i = 0; $i < count($input); $i++) {
    if (!$result[$input[$i]]) {
        $result[$input[$i]] = 1;
    } else {
        $result[$input[$i]]++;

    }
}
arsort($result);
foreach ($result as $tag => $value) {
    if ($count==0) {
        echo "<br>{$tag}: $value<br>";
        $mostFrequent = $tag;
        $value++;
    } else {
        echo "{$tag}: $value<br>";
    }
}


if (count($result)>0) {
    echo "<br>Most Frequent Tag is: $mostFrequent";
}
?>