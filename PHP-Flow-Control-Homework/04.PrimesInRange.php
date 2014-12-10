<?php
$pageTitle = 'Prime Numbers in Range';
$styles = 'styles/01.styles.css';
include 'includes/header.php';
?>
    <form action="04.PrimesInRange.php" method="post">
        <label for="start">Starting Index:</label>
        <input type="text" name="start"/>
        <label for="end">End:</label>
        <input type="text" name="end"/>
        <input type="submit" name="submit"/>
    </form>
<?php
if (isset($_POST['submit'])) {
    $start = $_POST['start'];
    $end = $_POST['end'];
    if ($start > $end) {
        $start = $start + $end;
        $end = $start - $end;
        $start = $start - $end;
    }
    if (checkPrime($start)) {
        echo "<strong>$start</strong>";
    } else {
        echo "$start";
    }
    for ($i = $start + 1; $i <= $end; $i++) {
        if (checkPrime($i)) {
            echo ", <strong>$i</strong>";
        } else {
            echo ", $i";
        }
    }
}

function checkPrime($num)
{
    $isPrime = true;
    for ($i = 2; $i < sqrt($num); $i++) {
        if ($num % $i == 0) {
            $isPrime = false;
        }
    }
    return $isPrime;
}

include 'includes/footer.php';
?>