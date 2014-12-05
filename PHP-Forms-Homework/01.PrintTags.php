<?php
$pageTitle = 'Print Tags';
include 'includes/header.php';
?>
<form action="01.PrintTags.php" method="post">
<input type="text" name="input">
<input type="submit"><br>
<?php
$input = preg_split('/,\s+/', htmlentities($_POST['input']), NULL, PREG_SPLIT_NO_EMPTY);
for ($i = 0; $i < count($input); $i++) {
        echo "{$i}: {$input[$i]}<br>";
}
?>
</form>
<?php
include 'includes/footer.php';
?>
 