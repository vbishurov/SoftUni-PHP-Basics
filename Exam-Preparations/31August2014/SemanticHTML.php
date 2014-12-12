<?php
$text = $_GET['html'];
$openingPattern = '/<div([\w\s=:"]*)(id\s*=\s*"\s*(\w+)\s*"|class\s*=\s*"\s*(\w+)\s*")([\w\s=":]*)>/m';
$closingPattern = '/<\/div>\s*<!--\s*(\w+)\s*-->/';
$output = preg_replace($openingPattern,'<'.trim('\3').trim('\4').trim('\1').trim('\5').'>',$text);
$output = preg_replace($closingPattern,'</\1>',$output);
$output = preg_replace('/[ ]+/',' ',$output);
$output = preg_replace('/[ ]+>/','>',$output);
echo $output;
?>
 