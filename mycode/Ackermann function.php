<?php
global $count;
$count = 0;
function ackermann(int $m, int $n): int
{

    echo '$m ' . $m;
    echo "\n";
    echo '$n ' . $n;
    echo "\n";
    if ($m == 0) {
        return $n + 1;
    } elseif ($n == 0) {
        return ackermann($m - 1, 1);
    } else {
        return ackermann($m - 1, ackermann($m, $n - 1));
    }
}

// Example Usage
echo ackermann(3, 3); // Output: 61
// echo $count;