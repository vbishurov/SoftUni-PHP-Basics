<?php
$pageTitle = 'Annual Expenses';
$styles = 'styles/01.styles.css';
include 'includes/header.php';
?>
<form action="03.AnnualExpenses.php" method="post">
    <label for="numOfYears">Enter number of years:</label>
    <input type="text" name="numOfYears"/>
    <input type="submit" name="submit"/>
</form>
<?php
if (isset($_POST['submit'])) {
    $numOfYears = $_POST['numOfYears'];
    $currentYear = 2014;
    echo "<table><thead><tr><th>Year</th><th>January</th><th>February</th><th>March</th>
        <th>April</th><th>May</th><th>June</th><th>July</th><th>August</th><th>September</th>
        <th>October</th><th>November</th><th>December</th><th>Total:</th></tr></thead><tbody>";
    for ($i = 0; $i < $numOfYears; $i++) {
        echo "<tr><td>$currentYear</td>";
        $currentSum=0;
        for ($j = 0; $j < 12; $j++) {
            $expense = rand(0,999);
            echo "<td>$expense</td>";
            $currentSum+=$expense;
        }
        echo "<td>$currentSum</td></tr>";
        $currentYear--;
    }
    echo "</tbody></table>";
}
include 'includes/footer.php';
?>
 