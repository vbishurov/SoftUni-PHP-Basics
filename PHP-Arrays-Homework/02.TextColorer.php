<?php
$pageTitle = 'Text Colorer';
$style = "styles/01.styles.css";
include 'includes/header.php';
?>

    <form action="02.TextColorer.php" method="post">

        <textarea name="input" id="input" cols="30" rows="10"></textarea>
        <input type="submit" name="submit"/>
    </form>

<?php
if (isset($_POST['submit'])) {
    $text = preg_split('/\s+/',$_POST['input']);
    $text = preg_split('//',implode('',$text));
    foreach ($text as $char) {
        if (ord($char) % 2 == 0) {
            echo '<span style="color: red"> '.$char.'</span>';
        } else {
            echo '<span style="color: blue"> '.$char.'</span>';
        }
    }

}
include 'includes/footer.php';
?>