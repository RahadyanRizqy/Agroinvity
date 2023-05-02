<?php
    include '../model/database.php';
    session_start();
    ob_start();
    $emailRelated = $_SESSION['emailRelated'];
    $idAccRelated = $_SESSION['idAccRelated'];
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
            height: 80vh;
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

        /* .edit-form {
            display: none;
        } */


    </style>
</head>
<body>
    <div class="content">
        <div class="form-container">
            <?php
                $formId = $_GET['form'];
                if (isset($formId)) {
                    if ($formId == 1) {
            ?>
            <div class="edit-form col-4">
                <form action="./addform.php?form=1" method="post">
                    <div class="form-group">
                        <label for="stuffInput" class="form-label"><?php echo "Nama Barang Bahan Baku"?>: </label>
                        <input type="text" class="form-control" name="stuffInput" placeholder="cth: Pestisida X" required>
                    </div>
                    <div class="form-group">
                        <label for="qtyInput" class="form-label">Jumlah: </label>
                        <input type="number" class="form-control" name="qtyInput" placeholder="cth: 2" required>
                    </div>
                    <div class="form-group">
                        <label for="priceInput" class="form-label">Harga: </label>
                        <input type="number" class="form-control" name="priceInput" placeholder="cth: 55000" name="priceInput" required>
                    </div>
                    <button type="submit" class="btn form-button btn-success" name="save-btn">Tambahkan</button>
                </form>
            </div>
            <div class="edit-form col-4 mt-2">
                <form action="./addform.php" method="post">
                        <button type="submit" class="btn form-button btn-danger" name="cancel-btn">Batal</button>
                </form>
            </div>
            <?php
                    }
                    else if ($formId == 2) {
            ?>
            <div class="edit-form col-4">
                <form action="./addform.php?form=2" method="post">
                    <div class="form-group">
                        <label for="stuffInput" class="form-label"><?php echo "Nama Barang Operasional"?>: </label>
                        <input type="text" class="form-control" name="stuffInput" placeholder="cth: Gas LPG" required>
                    </div>
                    <div class="form-group">
                        <label for="qtyInput" class="form-label">Jumlah: </label>
                        <input type="number" class="form-control" name="qtyInput" placeholder="cth: 2" required>
                    </div>
                    <div class="form-group">
                        <label for="priceInput" class="form-label">Harga: </label>
                        <input type="number" class="form-control" name="priceInput" aria-describedby="emailHelp" placeholder="cth: 55000" name="priceInput" required>
                    </div>
                    <button type="submit" class="btn form-button btn-success" name="save-btn">Tambahkan</button>
                </form>
            </div>
            <div class="edit-form col-4 mt-2">
                <form action="./addform.php" method="post">
                        <button type="submit" class="btn form-button btn-danger" name="cancel-btn">Batal</button>
                </form>
            </div>
            <?php
                    }
                    else {
            ?>
            <div class="edit-form col-4">
                <form action="./addform.php?form=3" method="post">
                    <div class="form-group">
                        <label for="stuffInput" class="form-label">Nama Produk: </label>
                        <input type="text" class="form-control" name="stuffInput" placeholder="cth: Daun Teh 1kg" required>
                    </div>
                    <div class="form-group">
                        <label for="qtyInput" class="form-label">Jumlah: </label>
                        <input type="number" class="form-control" name="qtyInput" placeholder="cth: 2" required>
                    </div>
                    <div class="form-group">
                        <label for="stuffSold" class="form-label">Produk Terjual: </label>
                        <input type="number" class="form-control" name="stuffSold" placeholder="cth: 20" name="priceInput" required>
                    </div>
                    <div class="form-group">
                        <label for="stuffUnsold" class="form-label">Produk Tak Terjual: </label>
                        <input type="number" class="form-control" name="stuffUnsold" placeholder="cth: 5" name="priceInput" required>
                    </div>
                    <div class="form-group">
                        <label for="priceInput" class="form-label">Harga: </label>
                        <input type="number" class="form-control" name="priceInput" placeholder="cth: 50000" name="priceInput" required>
                    </div>
                    <button type="submit" class="btn form-button btn-success" name="save-btn">Tambahkan</button>
                </form>
            </div>
            <div class="edit-form col-4 mt-2">
                <form action="./addform.php" method="post">
                        <button type="submit" class="btn form-button btn-danger" name="cancel-btn">Batal</button>
                </form>
            </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>
<?php
    if(isset($_POST['cancel-btn'])) {
        header("Location: ./dashboard.php?table=1");
    }
    if(isset($_POST['save-btn'])) {
        $query = null;
        $formId = $_GET['form'];
        $stuffInput = $_POST['stuffInput'];
        $qtyInput = $_POST['qtyInput'];
        $priceInput = $_POST['priceInput'];
        if ($formId == 1) {
            $query = mysqli_query($db_conn, "INSERT INTO `tb_pengeluaran`(`nama`, `jumlah`, `harga`, `fk_user`, `fk_pengeluaran`) VALUES ('$stuffInput', $qtyInput, $priceInput,$idAccRelated,1)");
            header("Location: ./dashboard.php?table=1");
        } else if ($formId == 2) {
            $query = mysqli_query($db_conn, "INSERT INTO `tb_pengeluaran`(`nama`, `jumlah`, `harga`, `fk_user`, `fk_pengeluaran`) VALUES ('$stuffInput', $qtyInput, $priceInput,$idAccRelated,2)");
            header("Location: ./dashboard.php?table=2");
        } 
        else {
            $stuffSold = $_POST['stuffSold'];
            $stuffUnsold = $_POST['stuffUnsold'];
            $query = mysqli_query($db_conn, "INSERT INTO `tb_produksi`(`nama_produksi`, `jumlah`, `produk_terjual`, `produk_tak_terjual`, `harga_jual`, `fk_user`) VALUES ('$stuffInput', $qtyInput, $stuffSold, $stuffUnsold, $priceInput,$idAccRelated)");
            header("Location: ./dashboard.php?table=3");
        }
        if ($query) {
            echo "<script>alert(\"Data berhasil ditambahkan\");</script>";
        }
    }
?>