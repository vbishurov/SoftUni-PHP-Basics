<?php
$input = preg_split('/,\s+|\r\n/', 'Pesho, pesho.g@gmail.com, onsite, 400
Mariika, mariika@gmail.com, online, 350
Geri, geri@gmail.com, online, 50
Pesho, peshkata@gmail.com, onsite, 0
Gosho & Kiro, gosho@gmail.com, onsite, 400
Mincho, praznikov@vremeto.bg, online, 50
', NULL, PREG_SPLIT_NO_EMPTY);
$column = 'result';
$order = 'descending';
$usernames = [];
$emails = [];
$types = [];
$results = [];
$id = [];
$students = [];

$counter = 0;
for ($i = 0; $i < count($input); $i++) {
    switch ($i % 4) {
        case 0: {
            $usernames[] = $input[$i];
            $counter++;
            $id[] = $counter;
            break;
        }
        case 1:
            $emails[] = $input[$i];
            break;
        case 2:
            $types[] = $input[$i];
            break;
        case 3:
            $results[] = $input[$i];
            break;
    }
}

for ($i = 0; $i < count($usernames); $i++) {
    $students[$usernames[$i]] = ['username'=>$usernames[$i],'email' => $emails[$i],'type' => $types[$i],'result' => $results[$i]];
}
var_dump($students);


?>
 