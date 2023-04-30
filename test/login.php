<?php
    session_start();
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
    <?php
        echo $_SESSION['name'];
    ?>
    <form action="./login.php" method="post">
        username:<br>
        <input type="text" name="name">
        <input type="submit" value="login" name="login">
    </form>
</body>
</html>
<?php
    if(isset($_POST['login'])) {
        $_SESSION['name'] = $_POST['name'];
        header("Location: ./home.php");
    }
?>