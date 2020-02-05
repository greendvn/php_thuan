<?php
    function findMin($array){
        $min  = $array[0];
        $index = 0;
        for( $i = 1; $i < count($array);$i++){
            if($min > $array[$i]){
                $min = $array[$i];
                $index = $i;
            }
        }
        echo "phan tu nho nhat mang la: ".$min." o vi tri " .$index;
    }

    $arrray = [3,2,6,4,8,3];



?>

