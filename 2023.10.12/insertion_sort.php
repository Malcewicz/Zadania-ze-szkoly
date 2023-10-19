<?php

function insertionSort(&$array, $n)
{
  if ($n <= 1) {
    return;
  }

  insertionSort($array, $n - 1);

  $last = $array[$n - 1];
  $i = $n - 2;

  while ($i >= 0 && $array[$i] > $last) {
    $array[$i + 1] = $array[$i];
    $i--;
  }

  $array[$i + 1] = $last;
}

$array = array(8, 12, 3, 9, 17, 10, 5);
$n = count($array);

insertionSort($array, $n);
print_r($array);
