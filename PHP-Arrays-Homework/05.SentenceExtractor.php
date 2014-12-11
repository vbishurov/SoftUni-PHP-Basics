<?php
$pageTitle = 'Sentence Extractor';
$style = "styles/01.styles.css";
include 'includes/header.php';
?>

    <form action="05.SentenceExtractor.php" method="post">
        <label for="text">Text:</label>
        <textarea name="text" id="text" cols="30" rows="1"></textarea><br/>
        <label for="word">Word:</label>
        <input type="text" name="word" id="word"/><br/>
        <input type="submit" name="submit"/>
    </form>

<?php
if (isset($_POST['submit'])) {
    $text = $_POST['text'];
    $word = $_POST['word'];
    $pattern = '/[\w\s]+\b' . $word . '\b[\w\s]+[.!?]/';
    preg_match_all($pattern, $text, $output);
    foreach ($output[0] as $sentence) {
        echo $sentence . "<br />";
    }
}
include 'includes/footer.php';
?>