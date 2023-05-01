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
                <form action="./accountedit.php" method="post">
                    <div class="form-group">
                        <label for="fullNameInput" class="form-label" value="Your name">Nama Lengkap</label>
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
                    <div class="form-group">
                        <label for="addressInput" class="form-label">Alamat</label>
                        <input type="search" class="form-control" name="addressInput" placeholder="cth: Jl. Crimson Moon No. 25 Blok 12" required>
                    </div>
                    <button type="submit" class="btn form-button btn-success" name="change-btn">Ubah dan Simpan</button>
                    <button type="submit" class="btn form-button btn-danger" name="cancel-btn">Batal</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>