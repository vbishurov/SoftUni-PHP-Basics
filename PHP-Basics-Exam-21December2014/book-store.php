<?php
date_default_timezone_set('Europe/Sofia');
$list = preg_split('/\r?\n/', $_GET['text'], -1, PREG_SPLIT_NO_EMPTY);
$minPrice = $_GET['min-price'];
$maxPrice = $_GET['max-price'];
$criteria = $_GET['sort'];
$order = $_GET['order'];

$result = array();
for ($i = 0; $i < count($list); $i++) {
    $book = preg_split('/\s*\/\s*/', $list[$i], -1, PREG_SPLIT_NO_EMPTY);
    if ($book[3] <= $maxPrice && $book[3] >= $minPrice) {
        $result[] = array('author' => $book[0], 'name' => $book[1], 'genre' => $book[2],
            'price' => $book[3], 'date' => date_create($book[4]), 'info' => $book[5]);
    }
}
switch ($criteria) {
    case 'genre':
        uasort($result, 'sortByGenre');
        break;
    case 'author':
        uasort($result, 'sortByAuthor');
        break;
    case 'publish-date':
        uasort($result, 'sortByDate');
        break;
}

if ($order == 'descending') {
    $result = array_reverse($result);
}

foreach ($result as $key => $value) {
    $name = htmlspecialchars($value['name']);
    $author = htmlspecialchars($value['author']);
    $genre = htmlspecialchars($value['genre']);
    $price = $value['price'];
    $date = date_format($value['date'], 'Y-m-d');
    $info = htmlspecialchars($value['info']);
    echo "<div><p>$name</p><ul><li>$author</li><li>$genre</li><li>$price</li><li>$date</li><li>$info</li></ul></div>";
}


function sortByDate($a1, $a2)
{
    return $a1['date'] < $a2['date'] ? -1 : 1;
}

function sortByDateDescending($a1, $a2)
{
    return $a1['date'] < $a2['date'] ? 1 : -1;
}

function sortByGenre($a1, $a2)
{
    global $order;
    $result = strcmp($a1['genre'], $a2['genre']);
    if ($result == 0) {
        if ($order == 'ascending') {
            $result = sortByDate($a1, $a2);
        } else {
            $result = sortByDateDescending($a1, $a2);
        }
    }
    return $result;
}

function sortByAuthor($a1, $a2)
{
    global $order;
    $result = strcmp($a1['author'], $a2['author']);
    if ($result == 0) {
        if ($order == 'ascending') {
            $result = sortByDate($a1, $a2);
        } else {
            $result = sortByDateDescending($a1, $a2);
        }
    }
    return $result;
}

?>