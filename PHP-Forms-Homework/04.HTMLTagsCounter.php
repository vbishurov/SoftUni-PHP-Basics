<?php
$pageTitle = 'HTML Tags Counter';
include 'includes/header.php';
// Start session
session_start();
?>
<form action="04.HTMLTagsCounter.php" method="post">
    <label for="tag">Enter HTML tags:</label><br/><br/>
    <input type="text" name="tag" id="tag" autofocus/>
    <input type="submit"/>
</form>
<?php
$tags = ['doctype', 'a', 'abbr', 'acronym', 'address', 'applet', 'area', 'article', 'aside', 'audio', 'b',
    'base', 'basefont', 'bdi', 'bdo', 'big', 'blockquote', 'body', 'br', 'button', 'canvas', 'caption',
    'center', 'cite', 'code', 'col', 'colgroup', 'datalist', 'dd', 'del', 'details', 'dfn', 'dialog', 'dir',
    'div', 'dl', 'dt', 'em', 'embed', 'fieldset', 'figcaption', 'figure', 'font', 'footer', 'form', 'frame',
    'frameset', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'head', 'header', 'hgroup', 'hr', 'html', 'i', 'iframe', 'img'
    , 'input', 'ins', 'kbd', 'keygen', 'label', 'legend', 'li', 'link', 'main', 'map', 'mark', 'menu', 'menuitem',
    'meta', 'meter', 'nav', 'noframes', 'noscript', 'object', 'ol', 'optgroup', 'option', 'putput', 'p', 'param',
    'pre', 'progress', 'q', 'rp', 'rt', 'ruby', 's', 'samp', 'script', 'section', 'select', 'small', 'source', 'span',
    'strike', 'strong', 'style', 'sub', 'sup', 'table', 'tbody', 'td', 'textarea', 'tfoot', 'th', 'thead', 'time',
    'title', 'tr', 'track', 'tt', 'u', 'ul', 'var', 'video', 'wbr'];

$_SESSION["score"];

if (isset($_POST['tag'])) {
    if (in_array(htmlentities($_POST['tag']), $tags)) {
        $_SESSION["score"]++;
        echo "<h1>Valid HTML Tag!</h1>";
        echo "<h1>Score: " . intval($_SESSION["score"]);
    } else {
        echo "<h1>Invalid HTML Tag!</h1>";
        echo "<h1>Score: " . intval($_SESSION["score"]);
        $_SESSION["score"] = 0;
    }
}
?>
<?php
include 'includes/footer.php';
?>
 