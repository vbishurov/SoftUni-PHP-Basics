<?php
$pageTitle = 'Modify String';
$styles = 'styles/01.styles.css';
include 'includes/header.php';
?>
<form action="06.StringModifier.php" method="post">
    <input type="text" name="input"/>
    <input type="radio" name="operation" id="palindrome" value="palindrome" checked/>
    <label for="palindrome">Check Palindrome</label>
    <input type="radio" name="operation" id="reverse" value="reverse"/>
    <label for="reverse">Reverse String</label>
    <input type="radio" name="operation" id="split" value="split"/>
    <label for="split">Split</label>
    <input type="radio" name="operation" id="hash" value="hash"/>
    <label for="hash">Hash String</label>
    <input type="radio" name="operation" id="shuffle" value="shuffle"/>
    <label for="shuffle">Shuffle String</label>
    <input type="submit" name="submit"/>
</form>
<?php
if (isset($_POST['submit'])) {
    $operation = $_POST['operation'];
    $input = &$_POST['input'];
    switch ($operation) {
        case 'palindrome' : checkPalindrome($input); break;
        case 'reverse' : echo strrev($input); break;
        case 'split' : echo implode(' ',preg_split('/\W*/',$input)); break;
        case 'hash' : echo password_hash(crypt($input, 'this is a very nasty key for encrypting very important stuff') , PASSWORD_DEFAULT); break;
        case 'shuffle' : echo str_shuffle($input); break;
    }
}

function checkPalindrome($str) {
    if (strrev($str) == $str) {
        echo "$str is a palindrome!";
    } else {
        echo "$str is not a palindrome!";
    }
}
include 'includes/footer.php';
?>
 