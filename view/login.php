<?php
    include '../model/database.php';
    session_start();
    ob_start();
    //tidak bisa ke dashaboard 
    $accountExist = True;
    $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
    if($pageWasRefreshed==1) {
        $accountExist = True;
    }
    // $query = mysqli_query($db_conn, 'SELECT COUNT(*) FROM `tb_akun` WHERE email = "arcueid@gmail.com" and password = "brunestud";');
    
    // while ($result = mysqli_fetch_assoc($query)) {
    //     echo "$result" . "<br>";
    // };
    // if (isset($_POST['submit']) ) {
    //     $email = $_POST["mailInput"];
    //     $pass = $_POST["passwordInput"];
    //     $query = mysqli_query($db_conn, "SELECT COUNT(*) FROM `tb_akun` WHERE email = \"$email\" and password = \"$pass\";");
    //     $result = mysqli_fetch_assoc($query);
        
    //     if ($result[0] == 1) {
    //         "<div><small>Not Found</small></div>";
    //         header('Location : ./dashboard.php');    
    //     }
    //     else {
    //         "<div><small>Not Found</small></div>";
    //         header('Location : ./register.php');   
    //     }
    // }
    if (isset($_POST['mailInput']) && isset($_POST['passwordInput'])) {
        $email = $_POST['mailInput'];
        $password = $_POST['passwordInput'];
        if (isset($_POST['login-btn'])) {         
            $sql = "SELECT * FROM tb_akun WHERE email='$email' AND password='$password'";
            $result = mysqli_query($db_conn, $sql);
            // $_SESSION['loggedin'] = true;
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                
                $emailRelated = $row['email'];
                $idAccRelated = $row['id_akun'];
                
                $accType = $row['fk_id_tipe_akun'];
                // $superadminDetected = false;
                // $workerDetected = false;
                // $partnerDetected = false;
                
                // if ($accType == 2) { # Partner
                //     $workerDetected = true;
                // }
                // else if ($accType == 3) { # Worker
                //     $partnerDetected = true;
                // }

                // $_SESSION['workerRelated'] = $accType;
                $_SESSION['emailRelated'] = $emailRelated;
                $_SESSION['idAccRelated'] = $idAccRelated;
                $_SESSION['accType'] = $accType;
                // echo "<script>alert('$emailResult')</script>";
                if ($accType == 1) {
                    header("Location: dashboard.php?table=4");
                } else {
                    header("Location: dashboard.php?table=1");
                }
            } 
            else {
                // echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
                $accountExist = False;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/user_validation.css">
</head>
<body>
    <section class="login">
        <div class="row g-0">
            <div class="col-md-6 g-0">
                <div class="form-left-side d-flex justify-content-center align-items-center">
                    <div class="col-md-6">
                        <h2>Selamat Datang di Agroinvity</h2>
                        <p>
                            Silahkan masuk dengan akun anda untuk memulai menggunakan Agroinvity!
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 g-0">
                <div class="form-right-side d-flex justify-content-center align-items-center">
                    <form action="./login.php" method="POST">
                        <div class="form-group">
                            <label for="mailInput" class="form-label">Alamat email</label>
                            <input type="email" class="form-control" name="mailInput" aria-describedby="emailHelp" placeholder="Masukkan email anda" required>
                        </div>
                        <div class="form-group">
                            <label for="passwordInput" class="form-label">Password</label>
                            <input type="password" class="form-control" name="passwordInput" placeholder="Masukkan password anda" required>
                        </div>
                            <button type="submit" class="btn form-button btn-success" name="login-btn">Masuk</button>
                        <div>
                            <span class="ask">Belum punya akun? <a href="./register.php">Daftar</a> sekarang juga!</span>
                        </div>
                        <div class="mt-2">
                            <?php
                                // $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

                                // if($pageWasRefreshed) {
                                //     $accountExist = False;
                                // } 
                                // else {
                                    if ($accountExist == False) {
                                        echo "<span style=\"color: white;\">Akun tidak ditemukan / atau salah password!</span>" . "<br>";
                                        echo "<span style=\"color: white;\">Silahkan daftar / hubungi kontak di homepage!</span>" . "<br>";
                                    } else if ($accountExist == True) {
                                        echo "<span class=\"warning\" style=\"color: white;\"></span>";
                                    }
                                // }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
