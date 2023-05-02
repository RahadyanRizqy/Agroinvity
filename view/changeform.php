<?php
    include '../model/database.php';
    session_start();
    ob_start();
    // $emailRelated = $_SESSION['emailRelated'];
    $changeId = $_SESSION['changeId'];
    // $query = mysqli_query($db_conn, "SELECT * FROM tb_akun");
    // $result = mysqli_fetch_row($query);
    // $namaBarang = $result[0];
    // $jumlahBarang = $result[1];
    // $hargaBarang = $result[2];
    
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
            flex-direction: column;
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
                <form action="./changeform.php" method="post">
                    <div class="form-group">
                        <label for="stuffId" class="form-label">ID Bahan</label>
                        <input type="number" class="form-control" name="stuffId" value="<?php echo "TEST"?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="stuffNameInput" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="stuffNameInput" value="<?php echo "TEST"?>" required>
                    </div>
                    <div class="form-group">
                        <label for="mailInput" class="form-label">Jumlah Barang</label>
                        <input type="email" class="form-control" name="mailInput" aria-describedby="emailHelp" placeholder="cth: arcueidbrune@stud.com" required>
                    </div>
                    <div class="form-group">
                        <label for="passwordInput" class="form-label">Harga</label>
                        <input type="password" class="form-control" name="passwordInput" placeholder="cth: arc2512" required>
                    </div>
                    <button type="submit" class="btn form-button btn-success" name="change-btn">Ubah dan Simpan</button>
                </form>
            </div>
            <div class="edit-form col-4 mt-2">
                <form action="./changeform.php" method="post">
                        <button type="submit" class="btn form-button btn-danger" name="cancel-btn">Batal</button>
                </form
            </div>
        </div>
    </div>
</body>
</html>
<?php
    if(isset($_POST['cancel-btn'])) {
        header("Location: ./dashboard.php?table=1");
    }
?>