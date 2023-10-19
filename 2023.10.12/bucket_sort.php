<?php

function bucketSort(&$array)
{
  if (count($array) == 0) {
    return;
  }

  $minValue = min($array);
  $maxValue = max($array);

  $bucket = array_fill($minValue, $maxValue - $minValue + 1, 0);

  foreach ($array as $value) {
    $bucket[$value]++;
  }

  $j = 0;
  for ($i = $minValue; $i <= $maxValue; $i++) {
    while ($bucket[$i] > 0) {
      $array[$j] = $i;
      $j++;
      $bucket[$i]--;
    }
  }
}

$array = array(8, 15, 3, 9, 7, 11, 5, 18, 2, 6, 1, 4, 10, 14, 12, 13, 16, 19, 20, 6, 1, 10, 47, 12);

bucketSort($array);
print_r($array);
