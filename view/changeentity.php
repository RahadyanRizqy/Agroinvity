<?php
    include '../model/database.php';
    session_start();
    ob_start();
    // $emailRelated = $_SESSION['emailRelated'];
    $changeId = $_SESSION['changeId'];
    // $tableId = $_SESSION['formType'];
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

    </style>
</head>
<body>
    <div class="content">
        <div class="form-container">
            <div class="edit-form col-4">
                <?php
                    $formId = $_GET['form'];
                    if(isset($formId)) {
                        if($formId == 1) {
                            $query = mysqli_query($db_conn, "SELECT id_pengeluaran, nama, jumlah, harga FROM tb_pengeluaran WHERE id_pengeluaran = $changeId;");
                            $result = mysqli_fetch_row($query);
                            ?>
                    <form action="./changeentity.php?form=1" method="post">
                    <div class="form-group">
                        <label for="stuffId" class="form-label">ID Bahan</label>
                        <input type="number" class="form-control" name="stuffId" value="<?php echo $changeId?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="stuffNameInput" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="stuffNameInput" value="<?php echo $result[1]?>" required>
                    </div>
                    <div class="form-group">
                        <label for="stuffQty" class="form-label">Jumlah Barang</label>
                        <input type="number" class="form-control" name="stuffQty" aria-describedby="emailHelp" value="<?php echo "$result[2]"?>" required>
                    </div>
                    <div class="form-group">
                        <label for="stuffPrice" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="stuffPrice" value="<?php echo $result[3]?>" required>
                    </div>
                    <button type="submit" class="btn form-button btn-success" name="change-btn">Ubah dan Simpan</button>
                    </form>
                <?php
                        }

                    else if($formId == 2) {
                        $query = mysqli_query($db_conn, "SELECT id_pengeluaran, nama, jumlah, harga FROM tb_pengeluaran WHERE id_pengeluaran = $changeId;");
                        $result = mysqli_fetch_row($query);
                ?>
                    <form action="./changeentity.php?form=2" method="post">
                    <div class="form-group">
                        <label for="stuffId" class="form-label">ID Bahan</label>
                        <input type="number" class="form-control" name="stuffId" value="<?php echo $changeId?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="stuffNameInput" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="stuffNameInput" value="<?php echo $result[1]?>" required>
                    </div>
                    <div class="form-group">
                        <label for="stuffQty" class="form-label">Jumlah Barang</label>
                        <input type="number" class="form-control" name="stuffQty" aria-describedby="emailHelp" value="<?php echo "$result[2]"?>" required>
                    </div>
                    <div class="form-group">
                        <label for="stuffPrice" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="stuffPrice" value="<?php echo $result[3]?>" required>
                    </div>
                    <button type="submit" class="btn form-button btn-success" name="change-btn">Ubah dan Simpan</button>
                    </form>
                <?php
                    }
                        else if ($formId == 3) {
                            $query = mysqli_query($db_conn, "SELECT id_produksi, nama_produksi, jumlah, produk_terjual, produk_tak_terjual, harga_jual FROM tb_produksi WHERE id_produksi = $changeId;");
                            $result = mysqli_fetch_row($query);
                ?>
                    <form action="./changeentity.php?form=3" method="post">
                    <div class="form-group">
                        <label for="stuffId" class="form-label">ID Bahan</label>
                        <input type="number" class="form-control" name="stuffId" value="<?php echo $changeId?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="stuffNameInput" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="stuffNameInput" value="<?php echo $result[1]?>" required>
                    </div>
                    <div class="form-group">
                        <label for="stuffQty" class="form-label">Jumlah Barang</label>
                        <input type="number" class="form-control" name="stuffQty" value="<?php echo "$result[2]"?>" required>
                    </div>
                    <div class="form-group">
                        <label for="stuffSold" class="form-label">Produk Terjual</label>
                        <input type="number" class="form-control" name="stuffSold" value="<?php echo $result[3]?>" required>
                    </div>
                    <div class="form-group">
                        <label for="stuffUnsold" class="form-label">Produk Tak Terjual</label>
                        <input type="number" class="form-control" name="stuffUnsold" value="<?php echo $result[4]?>" required>
                    </div>
                    <div class="form-group">
                        <label for="stuffPrice" class="form-label">Harga Jual</label>
                        <input type="number" class="form-control" name="stuffPrice" value="<?php echo $result[5]?>" required>
                    </div>
                    <button type="submit" class="btn form-button btn-success" name="change-btn">Ubah dan Simpan</button>
                    </form>
                            <?php
                        } 
                    } 
                ?>
            </div>
            <?php
            ?>
            <div class="edit-form col-4 mt-2">
                <form action="./changeentity.php" method="post">
                        <button type="submit" class="btn form-button btn-danger" name="cancel-btn">Batal</button>
                </form
            </div>
        </div>
    </div>
</body>
</html>

<?php
    $formId = $_GET['form'];
    if(isset($_POST['change-btn'])) {
        if ($formId == 1) {
            $stuffNameInput = $_POST['stuffNameInput'];
            $stuffQty = $_POST['stuffQty'];
            $stuffPrice = $_POST['stuffPrice'];
            mysqli_query($db_conn, "UPDATE `tb_pengeluaran` SET `nama`='$stuffNameInput',`jumlah`='$stuffQty',`harga`='$stuffPrice' WHERE id_pengeluaran = $changeId;");
            header("Location: ../view/dashboard.php?table=1");
        }
        else if ($formId == 2) {
            $stuffNameInput = $_POST['stuffNameInput'];
            $stuffQty = $_POST['stuffQty'];
            $stuffPrice = $_POST['stuffPrice'];
            mysqli_query($db_conn, "UPDATE `tb_pengeluaran` SET `nama`='$stuffNameInput',`jumlah`='$stuffQty',`harga`='$stuffPrice' WHERE id_pengeluaran = $changeId;");
            header("Location: ../view/dashboard.php?table=2");
        }
        else if ($formId == 3) {
            $stuffNameInput = $_POST['stuffNameInput'];
            $stuffQty = $_POST['stuffQty'];
            $stuffPrice = $_POST['stuffPrice'];
            $stuffSold = $_POST['stuffSold'];
            $stuffUnsold = $_POST['stuffUnsold'];
            mysqli_query($db_conn, "UPDATE `tb_produksi` SET `nama_produksi`='$stuffNameInput',`jumlah`=$stuffQty, `produk_terjual`=$stuffSold,`produk_tak_terjual`=$stuffUnsold,`harga_jual`=$stuffPrice WHERE id_produksi = $changeId");
            header("Location: ../view/dashboard.php?table=3");
        }
    }
    if(isset($_POST['cancel-btn'])) {
        header("Location: ../view/dashboard.php?table=1");
    }
?>