<style>
    td {
        border: 1px solid black;
    }
</style>

<?php
$text = preg_split('//', $_GET['text'], -1, PREG_SPLIT_NO_EMPTY);
$lineLength = $_GET['lineLength'];


$formattedText = formatText($text, $lineLength);
$formattedText = padRight($formattedText);
$formattedText = dropDown($formattedText);

printTable($formattedText);

function formatText($text, $lineLength)
{
    $formattedText = array();
    $line = -1;
    for ($i = 0; $i < count($text); $i++) {
        if ($i % $lineLength == 0) {
            $line++;
            $formattedText[$line] = array();
        }
        $formattedText[$line][] = $text[$i];
    }
    return $formattedText;
}

function padRight($formattedText)
{
    global $lineLength;
    for ($i = 0; $i < $lineLength; $i++) {
        if (empty($formattedText[count($formattedText) - 1][$i])) {
            $formattedText[count($formattedText) - 1][$i] = ' ';
        }
    }
    return $formattedText;
}

function dropDown($formattedText)
{
    for ($i = 0; $i < count($formattedText); $i++) {
        for ($line = 0; $line < count($formattedText) - 1; $line++) {
            for ($char = 0; $char < count($formattedText[$line]); $char++) {
                if ($formattedText[$line + 1][$char] == ' ') {
                    $formattedText[$line + 1][$char] = $formattedText[$line][$char];
                    $formattedText[$line][$char] = ' ';
                }
            }
        }
    }
    return $formattedText;
}

function printTable($arr)
{
    echo "<table>";
    foreach ($arr as $key => $value) {
        echo "<tr>";
        foreach ($value as $char) {
            echo "<td>" . htmlspecialchars($char) . "</td>";
        }
        echo "</tr>";
    }
    echo "<table>";
}

?>
