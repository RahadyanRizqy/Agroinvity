<?php
    session_start();
    ob_start();
    $emailRelated = $_SESSION['emailRelated'];
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

    </style>
</head>
<body>
    <div class="content">
        <div class="form-container">
            <div class="edit-form col-4">
                <form action="./addform.php" method="post">
                    <div class="form-group">
                        <label for="stuffInput" class="form-label">Nama Barang: </label>
                        <input type="text" class="form-control" name="stuffInput" placeholder="cth: Pestisida X" required>
                    </div>
                    <div class="form-group">
                        <label for="qtyInput" class="form-label">Jumlah: </label>
                        <input type="number" class="form-control" name="qtyInput" placeholder="cth: 2" required>
                    </div>
                    <div class="form-group">
                        <label for="mailInput" class="form-label">Harga: </label>
                        <input type="number" class="form-control" name="mailInput" aria-describedby="emailHelp" placeholder="cth: 55000" name="priceInput" required>
                    </div>
                    <button type="submit" class="btn form-button btn-success" name="save-btn">Tambahkan</button>
                    <button type="submit" class="btn form-button btn-danger" name="cancel-btn">Batal</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    if(isset($_POST['cancel-btn'])) {
        header("Location: ./dashboard.php");
    }
    if(isset($_POST['save-btn'])) {
        header("Location: ./dashboard.php");
    }
?>