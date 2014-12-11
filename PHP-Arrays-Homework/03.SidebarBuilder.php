<?php
$pageTitle = 'Sidebar Builder';
$style = "styles/01.styles.css";
include 'includes/header.php';
?>

    <form action="03.SidebarBuilder.php" method="post">
        <label for="categories">Categories:</label>
        <input type="text" name="categories" id="categories"/><br/><br/>
        <label for="tags">Tags:</label>
        <input type="text" name="tags" id="tags"/><br/><br/>
        <label for="months">Months:</label>
        <input type="text" name="months" id="months"/><br/><br/>
        <input type="submit" name="submit" value="Generate"/>
    </form>

<?php
if (isset($_POST['submit'])) {
    $categories = preg_split('/,\s+/', $_POST['categories']);
    $tags = preg_split('/,\s+/', $_POST['tags']);
    $months = preg_split('/,\s+/', $_POST['months']);
    asideGenerator('Categories',$categories);
    asideGenerator('Tags',$tags);
    asideGenerator('Months',$months);

}


function asideGenerator($title, $arr)
{
    echo "<aside><h2>$title</h2><ul>";
    foreach ($arr as $element) {
        echo "<li>$element</li>";
    }
    echo "</ul></aside>";
}
include 'includes/footer.php';
?>