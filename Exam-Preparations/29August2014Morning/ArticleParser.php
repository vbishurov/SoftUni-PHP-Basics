<?php
date_default_timezone_set('Europe/Sofia');
$text = $_GET['text'];
//$text = 'The dangers of smoking%         Dr. Elliot Hawking;13-06-2014-Recent research has proven that about 80% of all smokers, who smoke on a regular daily basis, are developing.';
$pattern = '/^\s*(.+)%\s*(.+);\s*\d+-(\d+)-\d+-\s*(.{0,100})\s*/m';
preg_match_all($pattern,$text,$matches);
$articles = [];
for ($i = 0; $i < count($matches[0]); $i++) {
    $topic = htmlspecialchars(trim($matches[1][$i]));
    $author = htmlspecialchars(trim($matches[2][$i]));
    $date = date('F', mktime(0, 0, 0, trim($matches[3][$i]), 12));
    $details = htmlspecialchars(trim($matches[4][$i]));
    $articles[] = "<div>\n" .
        "<b>Topic:</b> <span>$topic</span>\n" .
        "<b>Author:</b> <span>$author</span>\n" .
        "<b>When:</b> <span>$date</span>\n" .
        "<b>Summary:</b> <span>$details" . "...</span>\n" .
        "</div>";
}
echo implode("\n", $articles);
?>
 