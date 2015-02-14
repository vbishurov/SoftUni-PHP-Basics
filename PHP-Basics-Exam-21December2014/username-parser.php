<?php
$users = preg_split('/\r?\n/', $_GET['list'], -1, PREG_SPLIT_NO_EMPTY);
$length = $_GET['length'];
$show = $_GET['show']; //on|null

$users = array_map('trim', $users);
$style = ' style="color: red;"';
echo "<ul>";
if ($show == 'on') {
    for ($i = 0; $i < count($users); $i++) {
        if (strlen($users[$i]) < $length) {
            echo "<li$style>" . htmlspecialchars($users[$i]) . "</li>";
        } else {
            echo "<li>" . htmlspecialchars($users[$i]) . "</li>";
        }
    }
} else {
    for ($i = 0; $i < count($users); $i++) {
        if (strlen($users[$i]) < $length) {
            continue;
        } else {
            echo "<li>" . htmlspecialchars($users[$i]) . "</li>";
        }
    }
}
echo "</ul>";
?>
