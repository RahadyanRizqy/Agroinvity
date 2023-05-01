<?php
    session_start();
    ob_start();
    $emailRelated = $_SESSION['emailRelated'];
    $query = "SELECT * "
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            background-color: #057455;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .form-label {
            color: white;
        }

        .form-container {
            background-color: #263043;
            width: 900px;
            height: 75vh;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
            box-shadow: 5px 5px 5px 5px #263043;
        }

        form > div > .ask {
            color: white;
        }
        
        .form-group {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        p {
            color: white;
        }

    </style>
</head>
<body>
    <div class="content">
        <div class="form-container">
            <div class="edit-form col-3">
                <form action="./accountview.php" method="POST">
                <table>
                    <tbody>
                        <tr>
                            <label for="fullNameInput" class="form-label" value="Your name">Nama Lengkap</label>
                            <p><?php
                                echo $emailRelated
                            ?></p>
                        </tr>
                        <tr>
                            <label for="phoneNumberInput" class="form-label">Nomor Handphone</label>
                            <p>Thing</p>
                        </tr>
                        <tr>
                            <label for="mailInput" class="form-label">Alamat email</label>
                            <p>Thing</p>
                        </tr>
                        <tr>
                            <label for="passwordInput" class="form-label">Password</label>
                            <p>Thing</p>
                        </tr>
                        <tr>
                            <label for="addressInput" class="form-label">Alamat</label>
                            <p>Thing</p>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn form-button btn-success" name="change-btn">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    if (isset($_POST['change-btn'])) {
        $_SESSION['emailRelated'] = $emailRelated;
        header("Location: ./accountedit.php");
    }
?>