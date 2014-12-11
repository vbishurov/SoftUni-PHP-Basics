<?php
$pageTitle = 'Sentence Extractor';
$style = "styles/01.styles.css";
include 'includes/header.php';
?>

    <form action="06.URLReplacer.php" method="post">
        <label for="text">Text:</label>
        <textarea name="text" id="text" cols="30" rows="1"></textarea><br/>
        <input type="submit" name="submit"/>
    </form>

<?php
if (isset($_POST['submit'])) {
    $text = $_POST['text'];
    $pattern = "/<a href=\"([\w\.\:\/]+)\">([\w\s]+)<\/a>/";
    preg_match_all($pattern,$text,$output);
    for ($i = 0; $i < count($output[0]); $i++) {
        $replacement = '[URL='.$output[1][$i].']'.$output[2][$i].'[/URL]';
        $text = str_replace($output[0][$i],$replacement,$text);
    }
    echo htmlspecialchars($text);
}
include 'includes/footer.php';
?>