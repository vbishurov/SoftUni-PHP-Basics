<?php
$list = preg_split('/\r?\n/', htmlspecialchars($_GET['list']), -1, PREG_SPLIT_NO_EMPTY);
$minPrice = number_format(htmlspecialchars($_GET['minPrice']), 2, '.', '');
$maxPrice = number_format(htmlspecialchars($_GET['maxPrice']), 2, '.', '');
$filter = htmlspecialchars($_GET['filter']);
$order = htmlspecialchars($_GET['order']);

if ($filter == 'all') {
    $filter = '/desktop|laptop/';
} else {
    $filter = "/$filter/";
}

$result = array();
for ($i = 0; $i < count($list); $i++) {
    $item = preg_split('/\|/', $list[$i], -1, PREG_SPLIT_NO_EMPTY);
    $item = array_map('trim', $item);
    $price = number_format($item[3], 2, '.', '');
    if ($price >= $minPrice && $price <= $maxPrice && preg_match($filter, $item[1])) {
        $itemName = $item[0];
        $components = '';
        $componentsList = preg_split('/, /', $item[2], -1, PREG_SPLIT_NO_EMPTY);
        foreach ($componentsList as $component) {
            $components .= "<li class=\"component\">$component</li>";
        }


        $product = "<div class=\"product\" id=\"product" . ($i + 1) . "\"><h2>$itemName</h2><ul>$components</ul><span class=\"price\">$price</span></div>";
        $result[] = array($item[3], $i + 1, $product);
    }
}
if ($order == 'ascending') {
    uasort($result, 'sortAscending');
} else {
    uasort($result, 'sortDescending');
}

foreach ($result as $computer) {
    echo $computer[2];
}


function sortAscending($a, $b)
{
    if ($a[0] == $b[0]) {
        return ($a[1] < $b[1]) ? -1 : 1;
    }
    return ($a[0] < $b[0]) ? -1 : 1;
}

function sortDescending($a, $b)
{
    if ($a[0] == $b[0]) {
        return ($a[1] < $b[1]) ? -1 : 1;
    }
    return ($a[0] < $b[0]) ? 1 : -1;
}

?>
