<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Fonts Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- My Style -->
    <link rel="stylesheet" href="style.css">

    <!-- Logo Title -->
    <link rel="icon" href="../Assets/img/Logo2.png">

    <title>Argoinvity</title>
    <style>
        :root{
            --pr-color : #057455;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            font-family: 'Poppins', sans-serif;
            background-color: #F3FFF4;
        }

        /*Navbar Style*/
        .navbar{
            z-index: 3;
        }

        *{
            z-index: 2;
        }

        .accsent-img{
            z-index: 1;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 20px;
        }

        .nav-link {
            font-size: 16px;
        }

        .nav-link.active {
            font-weight: 700;
        }

        .button-secondary {
            width: 133px;
            height: 40px;
            background-color: #fff;
            color: var(--pr-color);
            border: none;
            font-size: 16px;
            font-weight: 700;
        }

        .button-primary {
            width: 133px;
            height: 40px;
            background-color: transparent;
            color: #fff;
            border: none;
            font-size: 16px;
            font-weight: 400;
        }

        /*Hero Section*/

        #hero{
            background: linear-gradient(160deg, var(--pr-color), #000);
            height: 100vh;
            width: 100%;
        }

        .img-hero{
            z-index: 1;
            height: 95%;
        }

        .hero-tagline h1 {
            color: #fff;
            font-weight: 700;
            font-size: 50px;
            line-height: 72px;
        }

        .hero-tagline p {
            color: #fff;
            font-size: 16px;
            margin-bottom: 60px;
            margin-top: 20px;
            line-height: 30px;
            width: 50%;
        }

        .button-lg-primary{
            width: 237px;
            height: 70px;
            background-color: #fff;
            color: var(--pr-color);
            border: none;
            font-size: 20px;
            font-weight: 700;
        }
    </style>
  </head>


  <body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent position-fixed w-100">
        <div class="container">
          <a class="navbar-brand" href="#">
                <img src="../Assets/img/Logo2.png" alt="" width="30" class="d-inline-block align-text-top me-3">
            Argoinvity</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item mx-2">
                <a class="nav-link active" aria-current="page" href="#">BERANDA</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="./service.php">LAYANAN</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="./feature.php">FITUR</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="https://wa.me/6288804897436">KONTAK</a>
              </li>
            </ul>
        
            <div>
                <button class="button-primary" id="register-btn">Daftar</button>
                <script>
                var btn = document.getElementById('register-btn');
                btn.addEventListener('click', function() {
                document.location.href = './register.php';
                });
                </script>

                <button class="button-secondary" id="login-btn">Masuk</button>
                <script>
                var btn = document.getElementById('login-btn');
                btn.addEventListener('click', function() {
                document.location.href = './login.php';
                });
                </script>
            </div>

          </div>
        </div>
      </nav>

      <!-- Hero Section -->
      <section id="hero">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-md-9 hero-tagline my-auto">
                    <h1>Membantu Mengerjakan Laporan  
                    Administrasi & Pendataan</h1>
                    <p> Kini <span class="fw-bold">Argoinvity</span> hadir untuk membantu anda dalam mengerjakan pelaporan keuangan & pendataan terbaik untukmu dengan sumber  terpercaya.</p>

                    <button class="button-lg-primary">Temukan Solusinya</button>
                    <a href="#">
                      <img src="../Assets/img/arrow.png" alt="">
                    </a>
                </div>
            </div>
   
            <img src="../Assets/img/Hero.png" alt="" class="position-absolute end-0 bottom-0 img-hero">
            <img src="../Assets/img/Layer.png" alt="" class="accsent-img h-100 position-absolute top-0 start-0">
            
      
            

        </div> 
      </section>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>