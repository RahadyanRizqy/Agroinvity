<?php
    include '../model/database.php';
    session_start();
    ob_start();
    $changeId = $_SESSION['changeId'];
    $result = mysqli_query($db_conn, "SELECT * FROM tb_artikel WHERE id_artikel = $changeId");
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color:  #057455;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #263043;
            width: 900px;
            height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 0.5rem;
            box-shadow: 5px 5px 5px 5px #263043;
            flex-direction: column;
        }

        .form-group {
            width: 800px;
            margin: 10px 10px;
        }

        label {
            color: white;
        }
        
    </style>
</head>
<body>
    <section class="main-container">
        <div class="form-container">
            <form action="./editarticle.php" method="POST">
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control" name="title" id="title" value="<?php echo $row['judul_artikel']?>" required>
                </div>
                <div class="form-group">
                    <label for="article-content">Isi artikel</label>
                    <textarea class="form-control" name="article-content" id="article-content" rows="15" required><?php echo $row['isi_artikel']?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="save-btn">Tambahkan</button>
                </div>
            </form>
            <div class="form-group mt-0">
                <form action="./editarticle.php" method="POST">
                    <button type="submit" class="btn btn-danger" name="cancel-btn">Batal</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
<?php
    if (isset($_POST['save-btn'])) {
        $content = $_POST['article-content'];
        $title = $_POST['title'];
        $sql = "UPDATE `tb_artikel` SET `judul_artikel`='$title',`isi_artikel`='$content' WHERE id_artikel = $changeId";
        mysqli_query($db_conn, $sql);
        header("Location: ./dashboard.php?table=4");
    }
    if (isset($_POST['cancel-btn'])) {
        header("Location: ./dashboard.php?table=4");
    }
?>