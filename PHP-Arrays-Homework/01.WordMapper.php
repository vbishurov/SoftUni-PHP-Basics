<?php
$pageTitle = 'Word Mapper';
$style = "styles/01.styles.css";
include 'includes/header.php';
?>
<form action="01.WordMapper.php" method="post">

    <textarea name="input" id="input" cols="30" rows="10"></textarea>
    <input type="submit" name="submit"/>

</form>

<?php
if (isset($_POST['submit'])) {
    $text = strtolower($_POST['input']);
    $text = preg_split('/\W+/', $text, NULL, PREG_SPLIT_NO_EMPTY);
    $text = array_count_values($text);

    echo "<table>";
    foreach ($text as $key => $value) {
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }
    echo "</table>";
}
include 'includes/footer.php';
?>
 