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
    <form action="./home.php" method="post">
        <input type="submit" value="logout" name="logout">
    </form>
    <?php
        if(isset($_POST['logout'])) {
            session_destroy();
            header('Location: ./login.php');
        }
    ?>
</body>
</html>