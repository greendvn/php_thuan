<?php
function sum_diagonal_arr($array)
{
    $sum = 0;
    for ($i = 0; $i < count($array); $i++)
        $sum += $array[$i][$i];
    echo $sum;
}

$matrix = [];
$side = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $side = $_POST["side"];
    $xa = $side."".$side;
    if (!empty($_POST["00"])) {
        for ($i = 0; $i < $side; $i++) {
            $matrix[$i]=[];
            for ($j = 0; $j < $side; $j++)
                $matrix[$i][$j] = $_POST[$i . '' . $j];
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
    <title>Tinh tong cac so o duong chep ma tran vuong</title>

</head>
<body>
<form method="post">
    Nhap kich thuoc matrix : <input type="number" name="side" value="<?php echo $_POST["side"] ?>">
    <button type="submit" name="submit">Submit</button>
    <br/>
    <table border="0">
        <?php if (!empty($side)): ?>

                <caption>insert elements into matrix</caption>

        <?php endif; ?>
        <?php for ($i = 0; $i < $side; $i++): ?>
            <tr>
                <?php for ($j = 0; $j < $side; $j++): ?>
                    <td><input type="number" name="<?php echo $i."".$j; ?>" value = "<?php echo $_POST[$i."".$j] ?>" ></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
    <?php
    if (!empty($side)){
    echo "tong hang cheo ma tran la ";
    sum_diagonal_arr($matrix);
    }
    ?>


</form>


</body>
</html>
