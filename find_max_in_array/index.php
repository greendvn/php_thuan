<?php
function findMax($array){
    $max = $array[0][0];
    $indexRow = NULL;
    $indexCol = NULL;
    for ($i = 0;$i < count($array);$i++){
        for($j=0;$j < count($array[$i]);$j++)
            if($max < $array[$i][$j]){
                $max =$array[$i][$j];
                $indexRow = $i;
                $indexCol = $j;
            }
    }
    echo "phan tu lon nhat mang la: ".$max. " o hang ".$indexRow." cot ".$indexCol;
}
    $array = [];

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $row  = $_POST["row"];
        $col = $_POST["col"];
        $xa = "$row$col";
        if(!empty($_POST["00"])) {
            for ($i = 0; $i < $row; $i++) {
                $array[$i] = [];
                for ($j = 0; $j < $col; $j++) {
                    $array[$i][$j] = $_POST[$i.''.$j];
                }
            }
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tim phan tu lon nhat mang 2 chieu</title>
</head>
<body>
    <form method="post">
        <fieldset>
            <legend>nhap kich thuoc cua ma tran 2 chieu</legend>
            Nhap so hang : <input type="number" name="row" value="<?php echo $_POST["row"]; ?>"> <br/>
            Nhap so cot  : <input type="number" name="col" value="<?php echo $_POST["col"]; ?>"> <br/>
            <input type="submit" name="submit" value="submit"> <br>
        </fieldset>
        <table border="0">
            <?php if (!empty($row) && !empty($col)): ?>
                <caption><h2>Matrix</h2></caption>
                <tr>
                    <td class="message">No elemental in matrix</td>
                </tr>
            <?php endif; ?>
            <?php for ($indexRow = 0;$indexRow < $row;$indexRow++): ?>
            <tr>
                <?php for ($indexCol = 0; $indexCol < $col; $indexCol++): ?>
                    <td><input type="number" name="<?php echo $indexRow.''.$indexCol; ?>"></td>
                <?php endfor; ?>
            </tr>
            <?php endfor; ?>
        </table>
        <h2>Max in matrix: </h2>
        <?php findMax($array); ?>
    </form>

</body>
</html>
