<?php
date_default_timezone_set('Europe/Sofia');
$firstDate = date_create($_GET['dateOne']);
$lastDate = date_create($_GET['dateTwo']);

if($firstDate > $lastDate) {
    $switchTemp = $firstDate;
    $firstDate = $lastDate;
    $lastDate = $switchTemp;
}

$output = [];
while ($firstDate <= $lastDate) {
    if (isThursday($firstDate)) {
        $output[] = date_format($firstDate,'d-m-Y');
    }
    date_add($firstDate, date_interval_create_from_date_string("1 day"));
}

if (count($output) > 0) {
    echo "<ol>";
    foreach ($output as $date) {
        echo "<li>$date</li>";
    }
    echo "</ol>";
} else {
    echo '<h2>No Thursdays</h2>';
}

function isThursday($date)
{
    return (date_format($date, 'N') == 4);
}
?>
 