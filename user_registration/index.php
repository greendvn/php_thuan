<?php
function loadRegistrations($fileName){
    $jsondata = file_get_contents($fileName);
    $arrData = json_decode($jsondata,true);
    return $arrData;
}
function saveDataJSON($filename, $name, $email, $phoneNumber){
    try{
        $contact = [
          "name" => $name,
          "email" => $email,
          "phoneNumber" => $phoneNumber
        ];
        $arrData = loadRegistrations($filename);
        array_push($arrData,$contact);
        $jsondata = json_encode($arrData,JSON_PRETTY_PRINT);
        file_put_contents($filename,$jsondata);
        echo "luu du lieu thanh cong";
    } catch (Exception $e){
        echo 'Lỗi: ', $e->getMessage(), "\n";
    }
}

$name = NULL;
$email = NULL;
$phoneNumber = NULL;
$nameErr = NUll;
$emailErr = NULL;
$phoneNumberErr = NULL;
$has_error = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phone"];
    if(empty($name)){
        $nameErr  = "Ten khong duoc de trong";
        $has_error = true;
    }
    if(empty($phoneNumber)){
        $phoneNumberErr = "SDT khong duoc de trong";
        $has_error = true;
    }
    if(empty($email)) {
        $emailErr = " Email  khong duoc de trong";
        $has_error = true;
    }
    else if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $emailErr = "$email hop le";
    } else {
        $emailErr = "$email khong hop le (xxx@xxx.xxx.xxx)!";
        $has_error = true;
    }

    if($has_error===false){
        saveDataJSON("users.json",$name,$email,$phoneNumber);
        $name = NULL;
        $email = NULL;
        $phoneNumber = NULL;
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
    <title>User Registration</title>
    <style>
        form{
            width: 500px;
        }
        table, td, th {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            width: 200px;
        }
    </style>
</head>
<body>
<h2>Registration Form</h2>
    <form method="post">
        <fieldset>
            <legend>Detail</legend>
            Name : <input type="text" name="name">
            <span class="error">
                <?php
                echo $nameErr;
                ?>
            </span>

            <br/><br/>
            Email : <input type="text" name="email">
            <span class="error">
                <?php
                echo $emailErr;
                ?>
            </span>
            <br/><br/>
            Phone : <input type="number" name="phone">
            <span class="error">
                <?php
                echo $phoneNumberErr;
                ?>
            </span>
            <br/><br/>
            <button type="submit" id="submit">Register</button>
            <br/><br/>
            <p><span class="error">* required field.</span></p>

        </fieldset>
    </form>
    <?php
    $registrations = loadRegistrations('users.json');
    ?>
    <h2>Registration list</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th></th>
        </tr>
        <form method="post">
        <?php foreach ($registrations as $registration): ?>
            <tr>
                <td><?php echo $registration['name']; ?></td>
                <td><?php echo $registration['email']; ?></td>
                <td><?php echo $registration['phoneNumber']; ?></td>
                <td>
                    <button type="button" value="delete" >Delete</button>
                </td>
            </tr>
        </form>
        <?php endforeach; ?>
    </table>

</body>
</html>