<?php
$errorLog = $_GET['errorLog'];

$pattern = '/Exception in thread ".*" java\.(.*\.)*(.*):.*\d*\s*at.*\.(.*)\((.*):(\d*)\)/m';
preg_match_all($pattern, $errorLog, $output);

echo "<ul>";
for ($i = 0; $i < count($output[0]); $i++) {
    $line = htmlspecialchars($output[5][$i]);
    $exception = htmlspecialchars($output[2][$i]);
    $file = htmlspecialchars($output[4][$i]);
    $method = htmlspecialchars($output[3][$i]);
    echo "<li>line <strong>$line</strong> - <strong>$exception</strong> in <em>$file:$method</em></li>";
}
echo "</ul>";
?>
