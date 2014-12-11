<?php
$pageTitle = 'Text Filter';
$style = "styles/01.styles.css";
include 'includes/header.php';
?>

    <form action="04.TextFilter.php" method="post">
        <label for="text">Text:</label>
        <textarea name="text" id="text" cols="30" rows="1"></textarea><br/>
        <label for="bannList">Bann List:</label>
        <input type="text" name="bannList" id="bannList"/><br/>
        <input type="submit" name="submit"/>
    </form>

<?php
if (isset($_POST['submit'])) {
    $text = $_POST['text'];
    $bannList = preg_split('/,\s+/', $_POST['bannList']);
    foreach ($bannList as $bannWord) {
        $asterisksLength = strlen($bannWord);
        $asterisks = str_repeat('*', $asterisksLength);
        $pattern = "/$bannWord/i";
        $text = preg_replace($pattern,$asterisks,$text);
    }
    echo $text;
}
include 'includes/footer.php';
?>