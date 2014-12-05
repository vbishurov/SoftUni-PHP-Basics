<?php
date_default_timezone_set("Europe/Sofia");
$firstDate = strtotime($_GET['dateOne']);
$secondDate = strtotime($_GET['dateTwo']);
$hd = preg_split('/\s+/', $_GET['holidays'], NULL, PREG_SPLIT_NO_EMPTY);
$holidays = [];
foreach ($hd as $holiday) {
    $holidays[] = strtotime($holiday);
}
$workDays = [];
while ($firstDate <= $secondDate) {
    if (isWorkday($firstDate,$holidays)) {
        $workDays[] = $firstDate;
    }
    $firstDate = strtotime("+1 day",$firstDate);
}

if (count($workDays) > 0) {
    echo "<ol>";
    foreach ($workDays as $workDay) {
        $workDayDate = date("d-m-Y", $workDay);
        echo "<li>$workDayDate</li>";
    }
    echo "</ol>";
} else {
    echo "<h2>No workdays</h2>";
}

function isWorkday($date, $holidays) {
    $dayOfWeek = date('N', $date);
    if (in_array($date, $holidays) || $dayOfWeek > 5) {
        return false;
    } else {
        return true;
    }

}
?>