<?php
$text = $_GET['text'];
$key = preg_split('//', $_GET['key'], NULL, PREG_SPLIT_NO_EMPTY);
$pattern = '';
for ($i = 0; $i < count($key); $i++) {
    if ($i == 0) {
        if (!ctype_digit($key[$i]) && !ctype_alpha($key[$i])) {
            $pattern .='\\'.$key[$i];
        } else {
            $pattern .=$key[$i];
        }
    } else if ($i == count($key) - 1) {
        if (!ctype_digit($key[$i]) && !ctype_alpha($key[$i])) {
            $pattern .='\\'."$key[$i]";
        } else {
            $pattern .="$key[$i]";
        }

    } else {
        if (ctype_digit($key[$i])) {
            $pattern .= '\d*';
        } else if (ctype_upper($key[$i])) {
            $pattern .= '[A-Z]*';
        } else if (ctype_lower($key[$i])) {
            $pattern .= '[a-z]*';
        } else {
            $pattern.="\\".$key[$i];
        }
    }
}
$pattern='/'.$pattern. '(.{2,6})' . $pattern .'/';
preg_match_all($pattern,$text,$output);
    echo implode('',$output[1]);

?>
 