<?php

/*phrase contenant toutes les lettres de l'alphabet
et occurence = 1*/
function isPangram2($str) {
    $alphabet = "abcdefghijklmnopqrstuvwxyz";
    $str = strtolower($str);
    $letters = count_chars($str, 1);
    foreach ($letters as $letter => $count) {
        if ($count > 1) {
            return false;
        }
    }
    for ($i = 0; $i < strlen($alphabet); $i++) {
        if (strpos($str, $alphabet[$i]) === false) {
            return false;
        }
    }
    return true;
}


function isPangram($str) {
    $alphabet = "abcdefghijklmnopqrstuvwxyz";
    $str = strtolower($str);
    for ($i = 0; $i < strlen($alphabet); $i++) {
        if (strpos($str, $alphabet[$i]) === false) {
            return false;
        }
    }
    return true;
}