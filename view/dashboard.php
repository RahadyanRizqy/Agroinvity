<?php
  include '../model/database.php';
  session_start();
  ob_start();
  error_reporting(0);
  $emailRelated = "";
  $stuffName = "";
  $stuffQty = "";
  $stuffPrice = "";
  // if ($emailRelated == null) {
  //   header("Location: ./forbidden.php");
  // }
  // if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  //   // user is not logged in, redirect to login page
  //   header("location: ./forbidden.php");
  //   exit;
  // }

  // try {
  //   $emailRelated = $_SESSION['emailRelated'];
  //   echo $emailRelated;
  // } catch (Exception $e) {
  //     echo $e;
  //     header('Location: ./forbidden.php');
  // }
  // if (!(var_dump($emailRelated)) == NULL) {
  //   header("Location: ./forbidden.php");
  // } else {

  // }
  $accType = $_SESSION['accType'];
  // $pegawaiDetected = $_SESSION['workerelated'];
  // $accType = $_SESSION['acctype'];
  $query = "";
  $workerRelatedPartner = null;
  if ($accType == 1) { # SUPERADMIN
    $emailRelated = $_SESSION['emailRelated'];
    $idAccRelated = $_SESSION['idAccRelated'];
  } else if ($accType == 2) {
    $emailRelated = $_SESSION['emailRelated'];
    $idAccRelated = $_SESSION['idAccRelated'];
  } else if ($accType == 3) {
    $emailRelated = $_SESSION['emailRelated'];
    $idAccRelated = $_SESSION['idAccRelated'];
    $workerRelatedPartner = mysqli_query($db_conn, "SELECT b.email, a.email FROM tb_akun a, tb_akun b WHERE b.fk_id_rel_akun = a.id_akun AND b.email = '$emailRelated';");
  }       
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<style>
		body {
      margin: 0;
      padding: 0;
      /* background-color: #1d2634; */
      background-color: #263043;
      color: #9e9ea4;
      font-family: "Montserrat", sans-serif;
    }

    .material-icons-outlined {
      vertical-align: middle;
      line-height: 1px;
      font-size: 35px;
    }

    .grid-container {
      display: grid;
      grid-template-columns: 200px 1fr 1fr 1fr;
      grid-template-rows: 0.2fr 3fr;
      grid-template-areas:
        "sidebar header header header"
        "sidebar main main main";
      height: 100vh;
    }


    /* ---------- HEADER ---------- */
    .header {
      grid-area: header;
      height: 70px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 30px 0 30px;
      box-shadow: 0 6px 7px -3px rgba(0, 0, 0, 0.35);
    }

    .menu-icon {
      display: none;
    }


    /* ---------- SIDEBAR ---------- */

    .sidebar {
      grid-area: sidebar;
      height: 100%;
      background-color: #057455;
      overflow-y: auto;
      transition: all 0.5s;
      -webkit-transition: all 0.5s;
    }

    .sidebar-title {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 30px 30px 30px 30px;
      margin-bottom: 30px;
    }

    .sidebar-title > span {
      display: none;
    }

    .sidebar-brand {
      margin-top: 15px;
      font-size: 20px;
      font-weight: 700;
    }

    .sidebar-list {
      padding: 0;
      margin-top: 15px;
      list-style-type: none;
    }

    .sidebar-list-item {
      padding: 20px 20px 20px 20px;
      font-size: 18px;
    }

    .sidebar-list-item:hover {
      background-color: rgba(255, 255, 255, 0.2);
      cursor: pointer;
    }

    .sidebar-list-item > a {
      text-decoration: none;
      color: #9e9ea4;
    }

    /* ---------- MAIN ---------- */

    .main-container {
      grid-area: main;
      overflow-y: auto;
      padding: 20px 20px;
      /* color: rgba(255, 255, 255, 0.95); */
      background-color : white
    }

    .main-title {
      display: flex;
      justify-content: space-between;
      color: #263043;
    }
    
    /* ---------- MEDIA QUERIES ---------- */

    /* Medium <= 992px */

    @media screen and (max-width: 992px) {
      .grid-container {
        grid-template-columns: 1fr;
        grid-template-rows: 0.2fr 3fr;
        grid-template-areas:
          "header"
          "main";
      }

      .class {
        display: none;
      }

      .menu-icon {
        display: inline;
      }

      .sidebar-title > span {
        display: inline;
      }
    }


    /* Small <= 768px */

    @media screen and (max-width: 768px) {
      .charts {
        grid-template-columns: 1fr;
        margin-top: 30px;
      }
    }

    .crud-table {
        color: black;
    }

    /* Extra Small <= 576px */

    /* @media screen and (max-width: 576px) {
      .hedaer-left {
        display: none;
      }
    } */
    /* label {
      display: flex;
      flex-direction: row;
      justify-content: flex-end;
      text-align: right;
      width: 400px;
      line-height: 26px;
      margin-bottom: 10px;
    }

    input {
      flex: 0 0 200px;
      margin-left: 20px;
    } */
    /* form.modify-table {
      border-collapse: separate;
      border-spacing: 0 15px;
    }

    form.modify-table > tbody > tr ,
    form.modify-table > tbody > tr > td {
      width: 150px;
      border: 1px;
      padding: 5px;
    } */

    /* .form-group {
      display: flex;
      margin-bottom: 10px;
    } */
    .side-btn {
      display: block;
      color: white;
    }
	</style>
	<!-- Montserrat Font -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	<!-- Material Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
</head>
<body>
	<div class="grid-container">

		<!-- Header -->
		<header class="header">
		  <div class="menu-icon" onclick="openSidebar()">
			<span class="material-icons-outlined">menu</span>
		  </div>
		  <div class="header-right">
			<!-- <span class="material-icons-outlined">notifications</span>
			<span class="material-icons-outlined">email</span> -->
			<!-- <span class="acc-icon material-icons-outlined">account_circle</span> -->
		  </div>
		</header>
		<!-- End Header -->
  
		<!-- Sidebar -->
		<aside class="sidebar">
		  <div class="sidebar-title">
			<div class="sidebar-brand">
			  <span class="material-icons-outlined"> </span> Menu
			</div>
			<span class="material-icons-outlined" onclick="closeSidebar()">close</span>
		  </div>
  
		  <ul class="sidebar-list">
			<li class="sidebar-list-item">
        <a href=./dashboard.php"></a>
        <form action="./dashboard.php?table=1" method="post">
          <button class="btn side-btn">Bahan Baku</button>
        </form>
			</li>
			<li class="sidebar-list-item">
        <form action="./dashboard.php?table=2" method="post">
          <button class="btn side-btn">Operasional</button>
        </form>
			</li>
      <li class="sidebar-list-item">
        <form action="./dashboard.php?table=3" method="post">
          <button class="btn side-btn">Produksi</button>
        </form>
			</li>
		  </ul>
		</aside>
		<!-- End Sidebar -->
  
		<!-- Main -->
		<main class="main-container ">
		  <div class="main-title">
      <?php
        $tableId = $_GET['table'];
        // $_SESSION['formType'] = $tableId;
        if (isset($tableId)) {
          if ($tableId == 1) {
            echo "<h2>Pencatatan Bahan Baku</h2>";
          }
          else if ($tableId == 2) {
            echo "<h2>Pencatatan Operasional</h2>";
          }
          else if ($tableId == 3) {
            echo "<h2>Pencatatan Produksi</h2>";
          }

          // if ($tableId == 1 || $tableId == 2) {
            
          // }
        }
      ?>
		  </div>
          <div class="rel-email">
            <p><?php
              if ($accType == 3) {
                $result = mysqli_fetch_row($workerRelatedPartner);
                echo "Mitra: " . $result[1] . "<br>";
                echo "Pegawai: " . $result[0] . "<br>";
              } else if ($accType == 2) {
                echo "Mitra: " . $emailRelated . "<br>";
              } else {
                echo "Admin: " . $emailRelated . "<br>";
              }
            ?></p>
          </div>
          <?php
            if($tableId == 1) {
          ?>
            <div class="add-button mt-3">
            <form action="./addform.php?form=1" method="post">
              <button type="submit" class="btn btn-success" name="add-btn" id="add-btn">Tambah</button>
            </form>
            <!-- <div id="display"><script type="text/javascript">document.write(capnum);</script></div> -->
            </div>
          <?php
            }
            else if ($tableId == 2){
          ?>
            <div class="add-button mt-3">
            <form action="./addform.php?form=2" method="post">
              <button type="submit" class="btn btn-success" name="add-btn" id="add-btn">Tambah</button>
            </form>
            <!-- <div id="display"><script type="text/javascript">document.write(capnum);</script></div> -->
            </div>
          <?php
            } else {
          ?>
            <div class="add-button mt-3">
            <form action="./addform.php?form=3" method="post">
              <button type="submit" class="btn btn-success" name="add-btn" id="add-btn">Tambah</button>
            </form>
            <!-- <div id="display"><script type="text/javascript">document.write(capnum);</script></div> -->
            </div>
          <?php
            }
          ?>
          <?php
          if (isset($_POST['add-btn'])) {
              $_SESSION['emailRelated'] = $emailRelated;
              header("Location: ./addform.php");
            }
          ?>
          <!-- CRUD FORM (DISABLED) --> 
          <div class="form-add mt-3" style="display: none;" id="crud-form">
            <form action="" method="post">
              <table class="modify-table">
                  <tbody>
                    <tr>
                      <td><label for="stuffInput" class="label-control">Nama: </label></td>
                      <td><input type="text" class="form-control" name="idNonInput" id="idNonInput" value="<?php echo $rowId; ?>"disabled></td>
                    </tr>
                    <tr>
                      <td><label for="stuffInput" class="label-control">Nama: </label></td>
                      <td><input type="text" class="form-control" name="stuffInput" value="<?php echo $stuffName; ?>" required></td>
                    </tr>
                    <tr>
                      <td><label for="qtyInput" class="label-control">Jumlah: </label></td>
                      <td><input type="text" class="form-control" name="qtyInput" value="<?php echo $stuffQty; ?>" required></td>
                    </tr>
                    <tr>
                      <td><label for="priceInput" class="label-control">Harga Total: </label></td>
                      <td><input type="text" class="form-control" name="priceInput" value="<?php echo $stuffQty; ?>" required></td>
                    </tr>
                </tbody>
              </table>
            </form>
            <!-- <div class="add-button mt-3" id="cancel-save">
              <button type="submit" class="btn btn-danger cancel-btn" name="cancel-btn" id="cancel-btn" onclick="btnLogic()">Batal</button>
              <button type="submit" class="btn btn-primary save-btn" name="save-btn" id="save-btn" onclick="btnLogic()">Simpan</button>
            </div> -->
          </div>
          <script type="text/javascript">
            // document.getElementById("crud-table").style.display = "none";
            // var capnum = 0;
            // function btnLogic(){
            //     capnum++;
            //     // document.getElementById('display').innerHTML = capnum;
            //     if (capnum % 2 == 1) {
            //       document.getElementById("crud-form").style.display = "block";
            //       document.getElementById("add-btn").style.display = "none";
            //     } else {
            //       document.getElementById("crud-form").style.display = "none";
            //       document.getElementById("add-btn").style.display = "block";
            //     }
            // }
            // function sideBtnLogic(option = 0) {
            //   if (option == 1) {
            //     document.getElementById("crud-table-bahan-baku").style.display = 'block';
            //   }
            //   else if (option == 2) {
            //     document.getElementById("crud-table-bahan-baku").style.display = 'none';
            //   }
            //   else if (option == 3) {
            //     document.getElementById("crud-table").style.display = 'none';
            //   }
            // }
          </script>
          <!-- <?php
            if (isset($_POST['stuffInput']) && (isset($_POST['qtyInput']) && (isset($_POST['priceInput'])))) {
              $stuffName = $_POST['stuffInput'];
              $stuffQty = $_POST['qtyInput'];
              $stuffPrice = $_POST['priceInput'];
            }
            if (isset($_POST['save-btn'])) {
              // DRAFT
            }
          ?> -->
          <?php
          if (isset($_POST['change-btn'])) {
            $changeId = $_POST['data-id'];
            $_SESSION['changeId'] = $changeId;
            header("Location: ./changeform.php?form=1");
            // header("Location: ./dashboard.php?table=1");
            // echo "$formType";
          } else if (isset($_POST['change-btn2'])) {
            $changeId = $_POST['data-id2'];
            $_SESSION['changeId'] = $changeId;
            header("Location: ./changeform.php?form=2");
          }
          else if (isset($_POST['change-btn3'])) {
            $changeId = $_POST['data-id3'];
            $_SESSION['changeId'] = $changeId;
            header("Location: ./changeform.php?form=3");
              // echo "$formType";
          }
          if (isset($_POST['delete-btn'])) {
            $deleteId = $_POST['data-id'];
            $delete_query = mysqli_query($db_conn, "DELETE FROM `tb_pengeluaran` WHERE id_pengeluaran = $deleteId");
            if ($delete_query) {
              header("Location: ./dashboard.php?table=1");
            }
          } else if (isset($_POST['delete-btn2'])) {
            $deleteId = $_POST['data-id2'];
            $delete_query = mysqli_query($db_conn, "DELETE FROM `tb_pengeluaran` WHERE id_pengeluaran = $deleteId");
            if ($delete_query) {
              header("Location: ./dashboard.php?table=2");              
            }
          } else if (isset($_POST['delete-btn3'])) {
            $deleteId = $_POST['data-id3'];
            $delete_query = mysqli_query($db_conn, "DELETE FROM `tb_produksi` WHERE id_produksi = $deleteId");
            if ($delete_query) {
              header("Location: ./dashboard.php?table=3");            
            }
          }
          ?>
          <?php
            if ($tableId == 1) { # BAHAN BAKU
          ?>
            <div class="crud-table" id="crud-table-bahan-baku">
              <form action="./dashboard.php" method="POST">
                <table class="table table-bordered mt-3">
                  <thead>
                    <?php
                      if ($accType == 1) {
                    ?>
                      <tr>
                      <th scope="col">No</th>
                      <th scope="col">ID Bahan Baku</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Harga Total</th>
                      <th scope="col">Tanggal dan Waktu Input</th>
                      <th scope="col">Pemilik</th>
                      <th scope="col">Ubah</th>
                      <th scope="col">Hapus</th>
                      </tr>
                    <?php
                      } else if ($accType == 2){
                    ?>
                      <tr>
                      <th scope="col">No</th>
                      <th scope="col">ID Bahan Baku</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Tanggal dan Waktu Input</th>
                      <th scope="col">Ubah</th>
                      <th scope="col">Hapus</th>
                      </tr>
                    <?php
                      } else {
                    ?>
                      <tr>
                      <th scope="col">No</th>
                      <th scope="col">ID Bahan Baku</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Tanggal dan Waktu Input</th>
                      <th scope="col">Ubah</th>
                      <th scope="col">Hapus</th>
                      </tr>                
                    <?php
                      }
                    ?>
                  </thead>
                  <tbody>
                      <?php
                      if ($accType == 1) {
                          $query = mysqli_query($db_conn, "SELECT b.id_pengeluaran, b.nama, b.jumlah, b.harga, b.waktu_input, a.nama_lengkap FROM tb_pengeluaran b, tb_akun a, tb_tipe_pengeluaran j WHERE b.fk_user = a.id_akun AND b.fk_pengeluaran = j.id_tipe AND j.nama_tipe = 'bahan baku';");
                          $i = 0;
                          while ($result = mysqli_fetch_row($query)) {
                            $i++;
                      ?>
                        <tr>
                          <th scope="row"><?php echo $i ?></th>
                          <td><?php echo $result[0] ?></td>
                          <td><?php echo $result[1] ?></td>
                          <td><?php echo $result[2] ?></td>
                          <td><?php echo $result[3] ?></td>
                          <td><?php echo $result[4] ?></td>
                          <td><?php echo $result[5] ?></td>
                          <form action="./dashboard.php" method="post">
                            <input type="hidden" name="data-id" value="<?php echo $result[0]; ?>">
                            <td> <input type="submit" id="change-btn" name="change-btn" class="btn btn-warning" value="Ubah"></td>
                          </form>
                          <form action="./dashboard.php" method="post">
                            <input type="hidden" name="data-id" value="<?php echo $result[0]; ?>">
                            <td> <input type="submit" id="delete-btn" name="delete-btn" class="btn btn-danger" value="Hapus"></td>
                          </form>
                        <!-- <td><a href="dashboard.php?change=<?php echo $result[0]; ?>" type="button" class="btn btn-primary change-btn" name="change-btn">Ubah</a></td>
                        <td><a href="dashboard.php?delete=<?php echo $result[0]; ?>" type="button" class="btn btn-danger delete-btn" name="delete-btn">Hapus</a></td> -->
                        </tr>
                      <?php } 
                      } else if ($accType == 2) {
                        $query = mysqli_query($db_conn, "SELECT b.id_pengeluaran, b.nama, b.jumlah, b.harga, b.waktu_input FROM `tb_pengeluaran` b INNER JOIN `tb_akun` a ON b.fk_user = a.id_akun WHERE a.email = '$emailRelated' AND fk_pengeluaran = 1;");
                        $i = 0;
                        while ($result = mysqli_fetch_row($query)) {
                          $i++;
                      ?>
                        <tr>
                          <th scope="row"><?php echo $i ?></th>
                          <td><?php echo $result[0] ?></td>
                          <td><?php echo $result[1] ?></td>
                          <td><?php echo $result[2] ?></td>
                          <td><?php echo $result[3] ?></td>
                          <td><?php echo $result[4] ?></td>
                          <form action="./dashboard.php" method="post">
                            <input type="hidden" name="data-id" value="<?php echo $result[0]; ?>">
                            <td> <input type="submit" name="change-btn" class="btn btn-warning" value="Ubah"></td>
                          </form>
                          <form action="./dashboard.php" method="post">
                            <input type="hidden" name="data-id" value="<?php echo $result[0]; ?>">
                            <td> <input type="submit" name="delete-btn" class="btn btn-danger" value="Hapus"></td>
                          </form>
                        </tr>
                      <?php }
                      } else if ($accType == 3) {
                        $query = mysqli_query($db_conn, "SELECT b.id_pengeluaran, b.nama, b.jumlah, b.harga, b.waktu_input, a.nama_lengkap FROM tb_pengeluaran b, tb_akun a WHERE b.fk_user = a.id_akun AND a.id_akun = (SELECT a.id_akun FROM tb_akun a, tb_akun b WHERE b.fk_id_rel_akun = a.id_akun AND b.email = '$emailRelated') AND fk_pengeluaran = 1;");
                        $i = 0;
                        while ($result = mysqli_fetch_row($query)) {
                          $i++;
                        ?>
                        <tr>
                          <th scope="row"><?php echo $i ?></th>
                          <td><?php echo $result[0] ?></td>
                          <td><?php echo $result[1] ?></td>
                          <td><?php echo $result[2] ?></td>
                          <td><?php echo $result[3] ?></td>
                          <td><?php echo $result[4] ?></td>
                          <form action="./dashboard.php" method="post">
                              <input type="hidden" name="data-id" value="<?php echo $result[0]; ?>">
                              <td> <input type="submit" name="change-btn" class="btn btn-warning" value="Ubah"></td>
                          </form>
                          <form action="./dashboard.php" method="post">
                            <input type="hidden" name="data-id" value="<?php echo $result[0]; ?>">
                            <td> <input type="submit" name="delete-btn" class="btn btn-danger" value="Hapus"></td>
                          </form>
                        <!-- <td><a href="dashboard.php?change=<?php echo $result[0]; ?>" type="button" class="btn btn-primary change-btn" name="change-btn">Ubah</a></td> -->
                        </tr>
                      <?php
                          }
                        }
                      ?>
                  </tbody>
                </table>
              </form>
            </div>
          <?php
            } else if ($tableId == 2) {
          ?>
            <div class="crud-table" id="crud-table-operasional">
              <form action="./dashboard.php" method="POST">
                <table class="table table-bordered mt-3">
                  <thead>
                    <?php
                      if ($accType == 1) {
                    ?>
                      <tr>
                      <th scope="col">No</th>
                      <th scope="col">ID Entitas Operasional</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Harga Total</th>
                      <th scope="col">Tanggal dan Waktu Input</th>
                      <th scope="col">Pemilik</th>
                      <th scope="col">Ubah</th>
                      <th scope="col">Hapus</th>
                      </tr>
                    <?php
                      } else if ($accType == 2){
                    ?>
                      <tr>
                      <th scope="col">No</th>
                      <th scope="col">ID Entitas Operasional</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Tanggal dan Waktu Input</th>
                      <th scope="col">Ubah</th>
                      <th scope="col">Hapus</th>
                      </tr>
                    <?php
                      } else {
                    ?>
                      <tr>
                      <th scope="col">No</th>
                      <th scope="col">ID Entitas Operasional</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Tanggal dan Waktu Input</th>
                      <th scope="col">Ubah</th>
                      <th scope="col">Hapus</th>
                      </tr>                
                    <?php
                      }
                    ?>
                  </thead>
                  <tbody>
                      <?php
                      if ($accType == 1) {
                          $query = mysqli_query($db_conn, "SELECT b.id_pengeluaran, b.nama, b.jumlah, b.harga, b.waktu_input, a.nama_lengkap FROM tb_pengeluaran b, tb_akun a, tb_tipe_pengeluaran j WHERE b.fk_user = a.id_akun AND b.fk_pengeluaran = j.id_tipe AND j.nama_tipe = 'operasional';");
                          $i = 0;
                          while ($result = mysqli_fetch_row($query)) {
                            $i++;
                      ?>
                        <tr>
                          <th scope="row"><?php echo $i ?></th>
                          <td><?php echo $result[0] ?></td>
                          <td><?php echo $result[1] ?></td>
                          <td><?php echo $result[2] ?></td>
                          <td><?php echo $result[3] ?></td>
                          <td><?php echo $result[4] ?></td>
                          <td><?php echo $result[5] ?></td>
                          <form action="./dashboard.php" method="post">
                            <input type="hidden" name="data-id2" value="<?php echo $result[0]; ?>">
                            <td> <input type="submit" id="change-btn2" name="change-btn2" class="btn btn-warning" value="Ubah"></td>
                          </form>
                          <form action="./dashboard.php" method="post">
                            <input type="hidden" name="data-id2" value="<?php echo $result[0]; ?>">
                            <td> <input type="submit" id="delete-btn2" name="delete-btn2" class="btn btn-danger" value="Hapus"></td>
                          </form>
                        <!-- <td><a href="dashboard.php?change=<?php echo $result[0]; ?>" type="button" class="btn btn-primary change-btn" name="change-btn">Ubah</a></td>
                        <td><a href="dashboard.php?delete=<?php echo $result[0]; ?>" type="button" class="btn btn-danger delete-btn" name="delete-btn">Hapus</a></td> -->
                        </tr>
                      <?php } 
                      } else if ($accType == 2) {
                        $query = mysqli_query($db_conn, "SELECT b.id_pengeluaran, b.nama, b.jumlah, b.harga, b.waktu_input FROM `tb_pengeluaran` b INNER JOIN `tb_akun` a ON b.fk_user = a.id_akun WHERE a.email = '$emailRelated' AND fk_pengeluaran = 2;");
                        $i = 0;
                        while ($result = mysqli_fetch_row($query)) {
                          $i++;
                      ?>
                        <tr>
                          <th scope="row"><?php echo $i ?></th>
                          <td><?php echo $result[0] ?></td>
                          <td><?php echo $result[1] ?></td>
                          <td><?php echo $result[2] ?></td>
                          <td><?php echo $result[3] ?></td>
                          <td><?php echo $result[4] ?></td>
                          <form action="./dashboard.php" method="post">
                            <input type="hidden" name="data-id2" value="<?php echo $result[0]; ?>">
                            <td> <input type="submit" name="change-btn2" class="btn btn-warning" value="Ubah"></td>
                          </form>
                          <form action="./dashboard.php" method="post">
                            <input type="hidden" name="data-id2" value="<?php echo $result[0]; ?>">
                            <td> <input type="submit" name="delete-btn2" class="btn btn-danger" value="Hapus"></td>
                          </form>
                        </tr>
                      <?php }
                      } else if ($accType == 3) {
                        $query = mysqli_query($db_conn, "SELECT b.id_pengeluaran, b.nama, b.jumlah, b.harga, b.waktu_input, a.nama_lengkap FROM tb_pengeluaran b, tb_akun a WHERE b.fk_user = a.id_akun AND a.id_akun = (SELECT a.id_akun FROM tb_akun a, tb_akun b WHERE b.fk_id_rel_akun = a.id_akun AND b.email = '$emailRelated') AND fk_pengeluaran = 2;");
                        $i = 0;
                        while ($result = mysqli_fetch_row($query)) {
                          $i++;
                        ?>
                        <tr>
                          <th scope="row"><?php echo $i ?></th>
                          <td><?php echo $result[0] ?></td>
                          <td><?php echo $result[1] ?></td>
                          <td><?php echo $result[2] ?></td>
                          <td><?php echo $result[3] ?></td>
                          <td><?php echo $result[4] ?></td>
                          <form action="./dashboard.php" method="post">
                              <input type="hidden" name="data-id2" value="<?php echo $result[0]; ?>">
                              <td> <input type="submit" name="change-btn2" class="btn btn-warning" value="Ubah"></td>
                          </form>
                          <form action="./dashboard.php" method="post">
                            <input type="hidden" name="data-id2" value="<?php echo $result[0]; ?>">
                            <td> <input type="submit" name="delete-btn2" class="btn btn-danger" value="Hapus"></td>
                          </form>
                        <!-- <td><a href="dashboard.php?change=<?php echo $result[0]; ?>" type="button" class="btn btn-primary change-btn" name="change-btn">Ubah</a></td> -->
                        </tr>
                      <?php
                          }
                        }
                      ?>
                  </tbody>
                </table>
              </form>
            </div>
          <?php
            } else if ($tableId == 3) { # PRODUKSI
          ?>
            <div class="crud-table" id="crud-table-produksi">
              <form action="./dashboard.php" method="POST">
                <table class="table table-bordered mt-3">
                  <thead>
                    <?php
                      if ($accType == 1) {
                    ?>
                      <tr>
                      <th scope="col">No</th>
                      <th scope="col">ID Produksi</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Produk Terjual</th>
                      <th scope="col">Produk Tak Terjual</th>
                      <th scope="col">Harga Jual</th>
                      <th scope="col">Tanggal dan Waktu Input</th>
                      <th scope="col">Pemilik</th>
                      <th scope="col">Ubah</th>
                      <th scope="col">Hapus</th>
                      </tr>
                    <?php
                      } else if ($accType == 2){
                    ?>
                      <tr>
                      <th scope="col">No</th>
                      <th scope="col">ID Produksi</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Produk Terjual</th>
                      <th scope="col">Produk Tak Terjual</th>
                      <th scope="col">Harga Jual</th>
                      <th scope="col">Tanggal dan Waktu Input</th>
                      <th scope="col">Ubah</th>
                      <th scope="col">Hapus</th>
                      </tr>
                    <?php
                      } else {
                    ?>
                      <tr>
                      <th scope="col">No</th>
                      <th scope="col">ID Produksi</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Produk Terjual</th>
                      <th scope="col">Produk Tak Terjual</th>
                      <th scope="col">Harga Jual</th>
                      <th scope="col">Tanggal dan Waktu Input</th>
                      <th scope="col">Ubah</th>
                      <th scope="col">Hapus</th>
                      </tr>                
                    <?php
                      }
                    ?>
                  </thead>
                  <tbody>
                      <?php
                      if ($accType == 1) {
                          $i = 0;
                          $query = mysqli_query($db_conn, "SELECT p.id_produksi, p.nama_produksi, p.jumlah, p.produk_terjual, p.produk_tak_terjual, p.harga_jual, p.waktu, a.nama_lengkap FROM tb_produksi p, tb_akun a WHERE p.fk_user = a.id_akun;");
                          while ($result = mysqli_fetch_row($query)) {
                            $i++;
                      ?>
                        <tr>
                          <th scope="row"><?php echo $i ?></th>
                          <td><?php echo $result[0] ?></td>
                          <td><?php echo $result[1] ?></td>
                          <td><?php echo $result[2] ?></td>
                          <td><?php echo $result[3] ?></td>
                          <td><?php echo $result[4] ?></td>
                          <td><?php echo $result[5] ?></td>
                          <td><?php echo $result[6] ?></td>
                          <td><?php echo $result[7] ?></td>
                          <form action="./dashboard.php" method="post">
                            <input type="hidden" name="data-id3" value="<?php echo $result[0]; ?>">
                            <td> <input type="submit" id="change-btn3" name="change-btn3" class="btn btn-warning" value="Ubah"></td>
                          </form>
                          <form action="./dashboard.php" method="post">
                            <input type="hidden" name="data-id3" value="<?php echo $result[0]; ?>">
                            <td> <input type="submit" id="delete-btn3" name="delete-btn3" class="btn btn-danger" value="Hapus"></td>
                          </form>
                        <!-- <td><a href="dashboard.php?change=<?php echo $result[0]; ?>" type="button" class="btn btn-primary change-btn" name="change-btn">Ubah</a></td>
                        <td><a href="dashboard.php?delete=<?php echo $result[0]; ?>" type="button" class="btn btn-danger delete-btn" name="delete-btn">Hapus</a></td> -->
                        </tr>
                      <?php } 
                      } else if ($accType == 2) {
                        $query = mysqli_query($db_conn, "SELECT p.id_produksi, p.nama_produksi, p.jumlah, p.produk_terjual, p.produk_tak_terjual, p.harga_jual, p.waktu, a.nama_lengkap FROM tb_produksi p, tb_akun a WHERE p.fk_user = a.id_akun AND a.email = '$emailRelated';");
                        $i = 0;
                        while ($result = mysqli_fetch_row($query)) {
                          $i++;
                      ?>
                        <tr>
                          <th scope="row"><?php echo $i ?></th>
                          <td><?php echo $result[0] ?></td>
                          <td><?php echo $result[1] ?></td>
                          <td><?php echo $result[2] ?></td>
                          <td><?php echo $result[3] ?></td>
                          <td><?php echo $result[4] ?></td>
                          <td><?php echo $result[5] ?></td>
                          <td><?php echo $result[6] ?></td>
                          <form action="./dashboard.php" method="post">
                            <input type="hidden" name="data-id3" value="<?php echo $result[0]; ?>">
                            <td> <input type="submit" name="change-btn3" class="btn btn-warning" value="Ubah"></td>
                          </form>
                          <form action="./dashboard.php" method="post">
                            <input type="hidden" name="data-id3" value="<?php echo $result[0]; ?>">
                            <td> <input type="submit" name="delete-btn3" class="btn btn-danger" value="Hapus"></td>
                          </form>
                        </tr>
                      <?php }
                      } else if ($accType == 3) {
                        $query = mysqli_query($db_conn, "SELECT p.id_produksi, p.nama_produksi, p.jumlah, p.produk_terjual, p.produk_tak_terjual, p.harga_jual, p.waktu, a.nama_lengkap FROM tb_produksi p, tb_akun a WHERE p.fk_user = a.id_akun AND a.id_akun = (SELECT a.id_akun FROM tb_akun a, tb_akun b WHERE b.fk_id_rel_akun = a.id_akun AND b.email = '$emailRelated');");
                        $i = 0;
                        while ($result = mysqli_fetch_row($query)) {
                          $i++;
                        ?>
                        <tr>
                          <th scope="row"><?php echo $i ?></th>
                          <td><?php echo $result[0] ?></td>
                          <td><?php echo $result[1] ?></td>
                          <td><?php echo $result[2] ?></td>
                          <td><?php echo $result[3] ?></td>
                          <td><?php echo $result[4] ?></td>
                          <td><?php echo $result[5] ?></td>
                          <td><?php echo $result[6] ?></td>
                          <form action="./dashboard.php" method="post">
                              <input type="hidden" name="data-id3" value="<?php echo $result[0]; ?>">
                              <td> <input type="submit" name="change-btn3" class="btn btn-warning" value="Ubah"></td>
                          </form>
                          <form action="./dashboard.php" method="post">
                            <input type="hidden" name="data-id3" value="<?php echo $result[0]; ?>">
                            <td> <input type="submit" name="delete-btn3" class="btn btn-danger" value="Hapus"></td>
                          </form>
                        <!-- <td><a href="dashboard.php?change=<?php echo $result[0]; ?>" type="button" class="btn btn-primary change-btn" name="change-btn">Ubah</a></td> -->
                        </tr>
                      <?php
                          }
                        }
                      ?>
                  </tbody>
                </table>
              </form>
            </div>            
          <?php
            }
          ?>
          <form action="./dashboard.php" method="post">
          <div class="temproal-logout-btn">
            <button class="btn btn-dark" name="logout-btn">
              Keluar
            </button>
          </div>
          <!-- <div class="temproal-logout-btn mt-5">
            <button class="btn btn-primary" name="viewacc-btn">
              Edit Akun
            </button>
          </div> -->
          </form>
		</main>
		<!-- End Main -->
  
	  </div>
  
	  <!-- Scripts -->
	  <!-- ApexCharts -->
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
	  <!-- Custom JS -->
	  <script src="js/scripts.js"></script>
	</body>
</body>
</html>
<?php
  if(isset($_POST['logout-btn'])) {
    session_destroy();
    header("Location: ./login.php");
  }
  if(isset($_POST['viewacc-btn'])) {
    $_SESSION['emailRelated'] = $emailRelated;
    header("Location: ./accountview.php");
  }
?>