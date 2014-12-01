<?php
function solve($number)
{
    $counter = 0;
    if ($number > 999) {
        $number = 999;
    }
    for ($i = 100; $i <= $number; $i++) {
        $digitChecker = $i % 10 != $i / 10 % 10 && $i / 10 % 10 != $i / 100 % 10;
        if ($digitChecker) {
            $counter++;
            if ($counter % 30 == 0) {
                echo $i . "\n";
            } else {
                echo $i . ', ';
            }
        }
    }
    if ($counter == 0) {
        echo 'no';
    }
}
echo "\n\n";
solve(15);
echo "\n\n\n";
solve(145);
echo "\n\n\n";
solve(247);
echo "\n\n\n";
solve(1234);
?>
