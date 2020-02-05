<?php
include "include_array.php";
$arr1 = [1, 3, 5, 4, 8];
$arr2 = [4, 2, 3, 6, 9, 0, 1, 2, 4];
$arr3 = includeArray($arr1, $arr2);
foreach ($arr3 as $value)
    echo $value." ";

?>


