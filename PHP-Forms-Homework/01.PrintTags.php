<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>01.PrintRags</title>
</head>
<body>
<?php
echo '<form action="01.PrintTags.php" method="post">';
echo '<input type="text" name="input">';
echo '<input type="submit">';
$input = preg_split('/,\s+/', $_POST['input'], NULL, PREG_SPLIT_NO_EMPTY);
for ($i = 0; $i < count($input); $i++) {
    if ($i == 0) {
        echo "<br>{$i}: {$input[$i]}<br>";
    } else {
        echo "{$i}: {$input[$i]}<br>";
    }
}
?>
</body>
</html>
 