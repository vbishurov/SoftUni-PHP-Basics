<?php
$text = $_GET['text'];
$blacklist = preg_split('/\r?\n/',$_GET['blacklist'], NULL, PREG_SPLIT_NO_EMPTY);
for ($i = 0; $i < count($blacklist); $i++) {
    if (substr($blacklist[$i],0,2) == '*.') {
        $blacklist[$i] = preg_replace('/\*./','/[\w\+-]+@[\w-]+\.',$blacklist[$i]);
        $blacklist[$i].='\b/';
    } else {
        $blacklist[$i] = '/'.$blacklist[$i].'/';
    }
}
foreach ($blacklist as $patten) {
    preg_match($patten,$text,$outputArr);
    $asterisks = str_repeat('*',strlen($outputArr[0]));
    $text = preg_replace($patten,$asterisks,$text);
}

preg_match_all('/[\w\+-]+@[\w-]+\.[\w\.-]+/',$text,$outputArr);
foreach ($outputArr as $key => $value) {
    for ($i = 0; $i < count($value); $i++) {
        $emailPattern = '/' . $value[$i] . '/';
        $text = preg_replace($emailPattern,'<a href="mailto:'.$value[$i].'">'.$value[$i].'</a>',$text);
    }
}

echo '<p>' . $text . '</p>';
?>
 