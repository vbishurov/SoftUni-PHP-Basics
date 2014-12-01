<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>03.CalculateInterest</title>
</head>
<body>
<div id="result"></div>
<?php
//Calc
$interestPerMonth = ($_POST['compound'] / 12 + 100) / 100;
$period = $_POST['period'];
$sum = &$_POST['amount'];
switch ($period) {
    case '6months':
        $period = 6;
        break;
    case '1year':
        $period = 12;
        break;
    case '2years':
        $period = 24;
        break;
    case '5years':
        $period = 60;
        break;
}

for ($i = 0; $i < $period; $i++) {
    $sum *= $interestPerMonth;
}

$sum = round($sum, 2);

switch ($_POST['currency']) {
    case 'usd':
        $sum = '$ ' . $sum;
        break;
    case 'euro':
        $sum = json_decode('"' . '\u20AC' . ' "') . $sum;
        break;
    case 'bgn':
        $sum = 'Lv ' . $sum;
        break;
}

if ($sum) {
    echo "$sum <br><br>";
}

//Form
echo '<form action="03.CalculateInterest.php" method="post">';
echo '<label for="amount">Enter Amount</label>';
echo '<input type="text" id="amount" name="amount"/><br/>';
echo '<input type="radio" name="currency" id="usd" value="usd"/>';
echo '<label for="usd">USD</label>';
echo '<input type="radio" name="currency" id="euro" value="euro"/>';
echo '<label for="euro">EUR</label>';
echo '<input type="radio" name="currency" id="bgn"  value="bgn" checked/>';
echo '<label for="bgn">BGN</label><br/>';
echo '<label for="compound">Compound Interest Amount</label>';
echo '<input type="text" name="compound" id="compound"/><br/>';
echo '<select name="period" id="period">';
echo '<option value="6months">6 Months</option>';
echo '<option value="1year">1 Year</option>';
echo '<option value="2years">2 Years</option>';
echo '<option value="5years">5 Years</option>';
echo '</select>';
echo '<input type="submit" value="Calculate"/>';
echo '</form>';
?>
</body>
</html>