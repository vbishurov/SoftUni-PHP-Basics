<?php
date_default_timezone_set('Europe/Sofia');
$names = preg_split('/\s+/', $_GET['name']);
$gender = $_GET['gender'];
$pin = $_GET['pin'];
$copyPin = modifyPin($pin);

$isValid = true;
if (!strlen($pin) == 10 || !checkGender($pin, $gender) || !checkName($names) ||
    !checkChecksum($pin) || !isCorrectDate($copyPin, getYearPrefix($pin))) {
    $isValid = false;
}

if ($isValid) {
    $output =[];
    $output['name'] = implode(' ',$names);
    $output['gender'] = $gender;
    $output['pin'] = $pin;
    echo json_encode($output);
} else {
    echo '<h2>Incorrect data</h2>';
}

//Functions
function checkGender($pin, $gender)
{
    if (substr($pin, 8, 1) % 2 == 0) {
        if ($gender == 'female') {
            return false;
        }
    } else {
        if ($gender == 'male') {
            return false;
        }
    }
    return true;
}

function isCorrectDate($pin, $yearPrefix)
{
    $date = checkdate(substr($pin, 2, 2), substr($pin, 4, 2), $yearPrefix . substr($pin, 0, 2));
    if (!$date) {
        return false;
    }
    return true;
}

function getYearPrefix($pin)
{
    $yearPrefix = 19;
    if (intval(substr($pin, 2, 2)) > 12 && intval(substr($pin, 2, 2)) <= 32) {
        $yearPrefix--;
    }
    if (intval(substr($pin, 2, 2)) > 32 && intval(substr($pin, 2, 2)) <= 52) {
        $yearPrefix++;
    }
    return $yearPrefix;
}

function modifyPin($pin)
{
    if (intval(substr($pin, 2, 2)) > 12 && intval(substr($pin, 2, 2)) <= 32) {
        $replacement = intval(substr($pin, 2, 2))-20;
        if($replacement < 10) {
            $replacement='0'.$replacement;
        }
        $pin = str_replace(substr($pin, 2, 2),$replacement,$pin);
    }
    if (intval(substr($pin, 2, 2)) > 32 && intval(substr($pin, 2, 2)) <= 52) {
        $replacement = intval(substr($pin, 2, 2))-40;
        if($replacement < 10) {
            $replacement='0'.$replacement;
        }
        $pin = str_replace(substr($pin, 2, 2),$replacement,$pin);
    }
    return $pin;
}

function checkName($names)
{
    if (count($names) != 2) {
        return false;
    } else if (!ctype_upper($names[0][0]) || !ctype_upper($names[1][0])) {
        return false;
    }
    return true;
}

function checkChecksum($pin)
{
    $checksum = 0;
    for ($i = 0; $i < 10; $i++) {
        if ($i != 9) {
            $currentDigit = substr($pin, $i, 1);
            $checksum += intval($currentDigit) * getDigitWeight(($i));
        } else {
            $checksum = $checksum % 11;
            if ($checksum == 10) {
                $checksum = 0;
            }
            if ($checksum != substr($pin, 9, 1)) {
                return false;
            }
        }
    }
    return true;
}

function getDigitWeight($i)
{
    switch ($i) {
        case 0: return 2 ;break;
        case 1: return 4 ;break;
        case 2: return 8 ;break;
        case 3: return 5 ;break;
        case 4: return 10 ;break;
        case 5: return 9 ;break;
        case 6: return 7 ;break;
        case 7: return 3 ;break;
        case 8: return 6 ;break;
        default: break;
    }
}
?>