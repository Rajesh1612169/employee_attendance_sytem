<?php
function findDuplicates($a) {
    $n = count($a);
    $frequency = array();

    for ($i = 0; $i < $n; $i++) {
        $element = $a[$i];

        if (isset($frequency[$element])) {
            $frequency[$element]++;
        } else {
            $frequency[$element] = 1;
        }
    }

    $duplicates = array();
    foreach ($frequency as $element => $count) {
        if ($count > 1) {
            $duplicates[] = $element;
        }
    }

    return $duplicates;
}

$N = 5;
$a = array(2, 3, 1, 2, 3);
$duplicates = findDuplicates($a);

echo "Duplicates: " . implode(' ', $duplicates);
