<?php
function dump($variable)
{
    if (gettype($variable) == 'integer' || gettype($variable) == 'double') {
        var_dump($variable);
    } else {
        echo gettype($variable)."\n";
    }
}

dump("hello");
dump(15);
dump(1.234);
dump(array(1, 2, 3));
dump((object)[2, 34]);
?>
 