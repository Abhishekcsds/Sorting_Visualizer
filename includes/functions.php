<?php
function generateRandomArray($size, $min, $max) {
    $array = [];
    for ($i = 0; $i < $size; $i++) {
        $array[] = rand($min, $max);
    }
    return $array;
}

function isSorted($array) {
    for ($i = 0; $i < count($array) - 1; $i++) {
        if ($array[$i] > $array[$i + 1]) {
            return false;
        }
    }
    return true;
}
?>