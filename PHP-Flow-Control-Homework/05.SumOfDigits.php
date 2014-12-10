<?php
$pageTitle = 'Sum of Digits';
$styles = 'styles/01.styles.css';
include 'includes/header.php';
?>
<form action="05.SumOfDigits.php" method="post">
    <label for="input">Input string:</label>
    <input type="text" name="input"/>
    <input type="submit" name="submit"/>
</form>
<?php
if (isset($_POST['submit'])) {
    $input = preg_split('/,\s*/',$_POST['input']);
    echo "<table><tbody>";
    for ($i = 0; $i < count($input); $i++) {
        echo "<tr><td>$input[$i]</td><td>";
        if (intval($input[$i]) > 0) {
            $sumOfDigits = sumDigits($input[$i]);
            echo $sumOfDigits;
        } else {
            echo "I cannot sum that";
        }
        echo "</td></tr>";
    }
}

function sumDigits($num) {
    $sum =0;
    for ($i = 0; $i < strlen($num); $i++) {
        $sum+=$num[$i];
    }
    return $sum;
}
include 'includes/footer.php';
?>
 