<?php
    include '../model/database.php';
    session_start();
    ob_start();
    $accountExist = False;
    $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
    if($pageWasRefreshed==1) {
        $accountExist = False;
        session_destroy();
    }

    if (isset($_POST['fullNameInput']) && isset($_POST['phoneNumberInput']) && isset($_POST['mailInput']) && isset($_POST['passwordInput']) && isset($_POST['addressInput'])) {
        $fullName = $_POST['fullNameInput'];
        $phoneNumber = $_POST['phoneNumberInput'];
        $email = $_POST['mailInput'];
        $password = $_POST['passwordInput'];
        $address = $_POST['addressInput'];
        $acctype = 2;
        $status = 1;
        if (isset($_POST['regist-btn'])) {
            $check = "SELECT email FROM `tb_akun` WHERE email LIKE '%$email%'";
            $countercheck = mysqli_query($db_conn, $check);
            if ($countercheck->num_rows > 0) {
                // echo "<script>alert('Data sudah ada! Silahkan login!')</script>";
                $accountExist = True;
            }
            else {
                $sql = "INSERT INTO `tb_akun`(`nama_lengkap`, `no_hp`, `email`, `password`, `alamat`, `fk_id_tipe_akun`, `status`) VALUES ('$fullName','$phoneNumber','$email','$password','$address','$acctype','$status')";
                $result = mysqli_query($db_conn, $sql);
                if ($result) {
                    $sql = "SELECT * FROM tb_akun WHERE email='$email' AND password='$password'";
                    $result = mysqli_query($db_conn, $sql);
                    if ($result->num_rows > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['newIdRelated'] = $row['id_akun'];
                        $_SESSION['newEmailRelated'] = $row['email'];
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
                        $_SESSION['newAccType'] = $row['fk_id_tipe_akun'];
                        $_SESSION['loggedin'] = true;
                        
                } 
                else {
                    echo "<script>alert('$sql')</script>";
                }
            }
        }
        header("Location: login.php");
        echo "<script>alert('Akun terdaftar silahkan login!')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/user_validation.css">
</head>
<body>
    <section class="register">
        <div class="row g-0">
            <div class="col-md-6 g-0">
                <div class="form-right-side d-flex justify-content-center align-items-center">
                    <form action="./register.php" method="POST">
                        <div class="form-group">
                            <label for="fullNameInput" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="fullNameInput" placeholder="cth: Arcueid Brunestud" required>
                        </div>
                        <div class="form-group">
                            <label for="phoneNumberInput" class="form-label">Nomor Handphone</label>
                            <input type="number" class="form-control" name="phoneNumberInput" placeholder="cth: 62xxxxxxxxxxx" required>
                        </div>
                        <div class="form-group">
                            <label for="mailInput" class="form-label">Alamat email</label>
                            <input type="email" class="form-control" name="mailInput" aria-describedby="emailHelp" placeholder="cth: arcueidbrune@stud.com" required>
                        </div>
                        <div class="form-group">
                            <label for="passwordInput" class="form-label">Password</label>
                            <input type="password" class="form-control" name="passwordInput" placeholder="cth: arc2512" required>
                        </div>
                        <!-- <div class="form-group">
                            <label for="confirmPasswordInput" class="form-label">Konfirmasi password</label>
                            <input type="password" class="form-control" name="confirmPasswordInput" placeholder="cth: arc2512">
                        </div> -->
                        <div class="form-group">
                            <label for="addressInput" class="form-label">Alamat</label>
                            <input type="search" class="form-control" name="addressInput" placeholder="cth: Jl. Crimson Moon No. 25 Blok 12" required>
                        </div>
                            <button type="submit" class="btn form-button btn-success" name="regist-btn">Daftar</button>
                        <div>
                            <span class="ask">Sudah punya akun? <a href="./login.php">Masuk</a> sekarang juga!</span>
                        </div>
                        <div class="mt-2">
                            <?php
                                // $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

                                // if($pageWasRefreshed) {
                                //     $accountExist = False;
                                // } 
                                // else {
                                    if ($accountExist == True) {
                                        echo "<span class=\"warning\" style=\"color: white;\">Akun sudah ada, Silahkan login!</span>";
                                    } else if ($accountExist == False) {
                                        echo "<span class=\"warning\" style=\"color: white;\"></span>";
                                    }
                                // }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 g-0">
                <div class="form-left-side d-flex justify-content-center align-items-center">
                    <div class="col-md-6 h-50">
                        <div class="mb-lg-3">
                            <h2>Selamat Datang di Agroinvity</h2>
                        </div>
                        <div>
                            <p>
                                Silahkan mendaftarkan diri anda sesuai form yang telah disediakan dengan keterangan yang valid untuk memulai menggunakan Agroinvity!
                            </p> 
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>