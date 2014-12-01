<?php
date_default_timezone_set('UTC');
function getSundays($year, $month) {
    $dayToGet = 'sunday';
    return new DatePeriod(
        new DateTime("first $dayToGet of $year-$month"),
        DateInterval::createFromDateString("next $dayToGet"),
        new DateTime("last day of $year-$month")
    );
}

$sundays = getSundays(2014, 11);

foreach ($sundays as $sunday) {
    echo $sunday->format("l, Y-m-d\n");
}

?>
 