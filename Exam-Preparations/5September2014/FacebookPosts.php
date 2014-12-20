<?php
date_default_timezone_set('Europe/Sofia');
$text = $_GET['text'];
$posts = preg_split('/\r?\n/', $text, -1, PREG_SPLIT_NO_EMPTY);
$result = array();
for ($i = 0; $i < count($posts); $i++) {
    $post = preg_split('/;/', $posts[$i], -1, PREG_SPLIT_NO_EMPTY);
    $post = array_map('trim', $post);
    $author = htmlspecialchars($post[0]);
    $date = date_format(date_create($post[1]), 'j F Y');
    $postText = htmlspecialchars($post[2]);
    $likes = intval($post[3]);
    $comments = '';
    $output = '';

    if (!empty($post[4])) {
        $comments = preg_split('/\//', htmlspecialchars($post[4]), -1, PREG_SPLIT_NO_EMPTY);
        $comments = array_map('trim', $comments);
        $output = "<div class=\"comments\">";
        foreach ($comments as $comment) {
            $output .= "<p>$comment</p>";
        }

        $output .= "</div>";
    }

    $output1 = "<article><header><span>$author</span><time>$date</time></header><main><p>$postText</p></main><footer><div class=\"likes\">$likes people like this</div>" . $output . "</footer></article>";
    $result[$date] = $output1;
}

uksort($result, 'sortByDate');

foreach ($result as $key => $value) {
    echo $value;
}

function sortByDate($a, $b)
{
    $a = date_create($a);
    $b = date_create($b);
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? 1 : -1;
}

?>
