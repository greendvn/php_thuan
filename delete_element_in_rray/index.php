<?php
$array = [10,4,6,7,8,6,0,2,1,7];
echo "mang la: ";
foreach ($array as $value)
    echo $value." ";
echo"<br>";
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $number = $_POST["number"];
    for($i = 0; $i < count($array); $i++)
        if($array[$i] == $number) {
            echo 'a';
            array_splice($array, $i, 1);
        }
    echo "mang sau khi xoa la: ";
    foreach ($array as $value)
        echo $value." ";
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xoa phan tu cua mang</title>
</head>
<body>
    <form method="post">
        <fieldset>
            <legend>Nhap phan tu muon xoa</legend>
            <input type="number" name="number">
            <button type="submit" name="submit">Xoa</button>
        </fieldset>
    </form>

</body>
</html>
