<?php
    function includeArray($arr1,$arr2){
        $arr3=[];
        foreach ($arr1 as$value1)
            array_push($arr3,$value1);
        foreach ($arr2 as $value2)
            array_push($arr3,$value2);
        return $arr3;
    }
?>

