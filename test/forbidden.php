<?php
    session_start();
    ob_start();
    error_reporting(0);
    var_dump($_SESSION['loggedin']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    SILAHKAN MASUK / DAFTAR TERLEBIH DAHULU
</body>
</html>