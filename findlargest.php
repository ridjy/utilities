<?php /* PHP 7 code below */?>
<?php
function findLargest(array $numbers) {
    // Your code goes here
    $max=$numbers[0];
    // Parcours du tableau pour trouver le plus grand élément
    for($i = 1; $i < count($numbers); $i++) {
        if($numbers[$i] > $max) {
        $max = $numbers[$i];
        }
    }
    return $max;
}

