<?php
$pageTitle = 'Car Randomizer';
$styles = 'styles/01.styles.css';
include 'includes/header.php';
?>
    <form action="02.CarRandomizer.php" method="post">
        <label for="cars">Enter cars</label>
        <input type="text" name="cars"/>
        <input type="submit" name="submit" value="Show Result"/>
    </form>
<?php
$colors = ['black', 'yellow', 'red', 'green', 'blue', 'purple', 'orange'];
if (isset($_POST['submit'])) {
    $cars = preg_split('/,\s+/', $_POST['cars']);
    echo "<table><thead><tr><th>Car</th><th>Color</th><th>Count</th></tr></thead><tbody>";
    for ($i = 0; $i < count($cars); $i++) {
        $color = $colors[array_rand($colors,1)];
        $amount = rand(1,5);
        echo "<tr><td>$cars[$i]</td><td>$color</td><td>$amount</td></tr>";
    }
    echo "</tbody></table>";
}
include 'includes/footer.php';
?>