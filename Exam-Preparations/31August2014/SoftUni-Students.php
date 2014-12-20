<?php
$students = preg_split('/\r?\n/', $_GET['students'], -1, PREG_SPLIT_NO_EMPTY);
$criteria = $_GET['column'];
$order = $_GET['order'];

$result = array();
for ($i = 0; $i < count($students); $i++) {
    $student = preg_split('/\s*,\s*/', $students[$i], -1, PREG_SPLIT_NO_EMPTY);
    $id = $i + 1;
    $result[] = array('id' => $id, 'username' => $student[0], 'email' => $student[1], 'type' => $student[2], 'result' => $student[3]);
}
switch ($criteria) {
    case 'id':
        usort($result, 'sortById');
        break;
    case 'username':
        usort($result, 'sortByUsername');
        break;
    case 'result':
        usort($result, 'sortByResult');
        break;
}

if ($order == 'descending') {
    $result = array_reverse($result);
}

printStudents($result);

function sortById($a1, $a2)
{
    return $a1['id'] < $a2['id'] ? -1 : 1;
}

function sortByUsername($a1, $a2)
{
    $result = strcmp($a1['username'], $a2['username']);
    if ($result == 0) {
        $result = sortById($a1, $a2);
    }
    return $result;
}

function sortByResult($a1, $a2)
{
    if ($a1['result'] == $a2['result']) {
        $result = sortById($a1, $a2);
    } else {
        $result = $a1['result'] < $a2['result'] ? -1 : 1;
    }
    return $result;
}

function printStudents($arr)
{
    echo "<table><thead><tr><th>Id</th><th>Username</th><th>Email</th><th>Type</th><th>Result</th></tr></thead>";
    for ($i = 0; $i < count($arr); $i++) {
        $id = htmlspecialchars($arr[$i]['id']);
        $name = htmlspecialchars($arr[$i]['username']);
        $email = htmlspecialchars($arr[$i]['email']);
        $type = htmlspecialchars($arr[$i]['type']);
        $result = htmlspecialchars($arr[$i]['result']);
        echo "<tr><td>$id</td><td>$name</td><td>$email</td><td>$type</td><td>$result</td></tr>";
    }
    echo "</table>";
}

?>
