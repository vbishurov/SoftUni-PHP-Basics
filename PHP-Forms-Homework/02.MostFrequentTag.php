<?php
$pageTitle = 'Most Frequent Tags';
include 'includes/header.php';
?>
<form action="02.MostFrequentTag.php" method="post">
<input type="text" name="input">
<input type="submit">
<?php
$input = preg_split('/,\s+/', htmlentities($_POST['input']), NULL, PREG_SPLIT_NO_EMPTY);
$result = [];
$appearances = 0;
for ($i = 0; $i < count($input); $i++) {
    if (!$result[$input[$i]]) {
        $result[$input[$i]] = 1;
    } else {
        $result[$input[$i]]++;
    }
}
arsort($result);
$mostFrequent = key($result);
echo "<br>";
foreach ($result as $tag => $value) {
    echo "{$tag}: $value<br>";
}

if (count($result) > 0) {
    echo "<br>Most Frequent Tag is: $mostFrequent";
}
include 'includes/footer.php';
?>