<?php
    $str = "fsgsdgdshfldhasgjfshjkbvncmxbneoriuwopi";
    echo $str;
    echo "<br/>";
    $count = 0;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(!empty($_POST["character"])){
            $character = $_POST["character"];
            for ($i = 0;$i <strlen($str);$i++)
                if($str[$i]==$character)
                    $count++;
                echo $character." xuat hien ".$count." lan";
        }else
            echo "xin nhap ky tu can kiem tra";

    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dem so lan xuat hien cua ky tu trong chuoi</title>
</head>
<body>
    <form method="post">
        <input type="text" name="character">
        <button type="submit" name="submit">Dem</button>
    </form>

</body>
</html>
