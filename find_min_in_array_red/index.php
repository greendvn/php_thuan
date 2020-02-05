<?php
function findMin($array)
{
    $min = $array[0];
    $index = 0;
    for ($i = 1; $i < count($array); $i++) {
        if ($min > $array[$i]) {
            $min = $array[$i];
            $index = $i;
        }
    }
    echo "phan tu nho nhat mang la: " . $min . " o vi tri " . $index;
}

include "arrayMannager.php";
$pathFile = "data.json";

if($_SERVER["REQUEST_METHOD"]==="POST"){
    if($_POST["number"] == "")
        echo "xin nhap phan tu cuar mang vao o";
    else {
        $number = $_POST["number"];
        $arrNumber = new arrayMannager($pathFile);
        $arrNumber->add($number);
    }
}

$getNumbers = new arrayMannager($pathFile);
echo "Mang la: ";
foreach ($getNumbers->getArray() as $value)
    echo $value." ";
echo "<br/>";
findMin($getNumbers->getArray());



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Nhap mang va tim gia tri nho nhat trong mang</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-5">
            <form method="post">
                <fieldset>
                    <legend>Nhập phần tử của mảng</legend>
                    <input type="number" name="number">
                    <button type="submit" name="submit">Nhập</button>
                </fieldset>
            </form>
        </div>
    </div>

</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
