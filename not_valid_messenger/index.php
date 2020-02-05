

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
    <style>
        fieldset{
            width: 350px;
        }
        table th{
            text-align: left;
        }
    </style>
</head>
<body>
<h1>Simple Calculator</h1>
<form method="post">
    <fieldset>
        <legend>calculator</legend>
        <table>
            <tr>
                <th>First Operand:</th>
                <td><input type="number" name="number1"></td>
            </tr>
            <tr>
                <th>Operator :</th>
                <td><select name="operator">
                        <option value="addition">Addition</option>                                               <option value="addition">Addition</option>
                        <option value="subtraction">Subtraction</option>
                        <option value="multipication">Multiplication</option>
                        <option value="division">Division</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Second Operand: </th>
                <td><input type="number" name="number2"></td>
            </tr>
            <tr>
                <th></th>
                <td><button type="submit" id="submit">calculate</button></td>
            </tr>
        </table>
    </fieldset>
</form>
<br/>
<br/>
<h1>RESULT: </h1>
</body>
</html>
<?php
class DivideByZeroException1 extends Exception {};
class DivideByZeroException2 extends Exception {};


if($_SERVER["REQUEST_METHOD"]=="POST"){
    try {
        $num1 = $_POST["number1"];
        $num2 = $_POST["number2"];
        $operator = $_POST["operator"];


        switch ($operator){
            case "addition":
                $num3 = $num1+$num2;
                echo $num1." + " .$num2." = ".$num3;
                break;
            case "subtraction":
                $num3 = $num1-$num2;
                echo $num1 ." - " .$num2." = " .$num3;
                break;
            case "multipication":

                $num3 = $num1*$num2;
                echo $num1 ." * " .$num2." = " .$num3;
                break;
            case "division":
                if ($num1 ==0&&$num2==0){
                    throw new DivideByZeroException2();
                }
                if ($num2 ==0){
                    throw new DivideByZeroException1();
                }
                $num3 = $num1/$num2;
                echo $num1 ."/" .$num2." = " .$num3;
                break;
        }
    } catch (DivideByZeroException1 $ex){
        echo "Divided by zero!";
    }catch (DivideByZeroException2 $ex){
        echo "Divisor and divided by zero!";
    }

}
?>