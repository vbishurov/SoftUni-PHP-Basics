<?php
$pageTitle = 'Calculate Interest';
include 'includes/header.php';
?>
    <div id="result"></div>
<?php
$interestPerMonth = (intval($_POST['compound']) / 12 + 100) / 100;
$period = htmlentities($_POST['period']);
$sum = floatval($_POST['amount']);
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
?>

    <form action="03.CalculateInterest.php" method="post">
        <label for="amount">Enter Amount</label>
        <input type="text" id="amount" name="amount"/><br/>
        <input type="radio" name="currency" id="usd" value="usd"/>
        <label for="usd">USD</label>
        <input type="radio" name="currency" id="euro" value="euro"/>
        <label for="euro">EUR</label>
        <input type="radio" name="currency" id="bgn" value="bgn" checked/>
        <label for="bgn">BGN</label><br/>
        <label for="compound">Compound Interest Amount</label>
        <input type="text" name="compound" id="compound"/><br/>
        <select name="period" id="period">
            <option value="6months">6 Months</option>
            <option value="1year">1 Year</option>
            <option value="2years">2 Years</option>
            <option value="5years">5 Years</option>
        </select>
        <input type="submit" value="Calculate"/>
    </form>
<?php
include 'includes/footer.php';
?>