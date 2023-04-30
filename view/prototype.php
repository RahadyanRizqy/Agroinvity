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
			<span class="material-icons-outlined">notifications</span>
			<span class="material-icons-outlined">email</span>
			<span class="material-icons-outlined">account_circle</span>
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
			  <a href="#" target="_blank">
				<span class="material-icons-outlined">dashboard</span> Pendataan
			  </a>
			</li>
			<li class="sidebar-list-item">
			  <a href="#" target="_blank">
				<span class="material-icons-outlined">inventory_2</span> Detail
			  </a>
			</li>
		  </ul>
		</aside>
		<!-- End Sidebar -->
  
		<!-- Main -->
		<main class="main-container">
		  <div class="main-title">
			<h2>Pendataan</h2>
		  </div>
          <div class="add-button mt-3">
            <button class="btn btn-success">Tambah</button>
          </div>
          <div class="form-add">
            
          </div>
          <div class="crud-table">
          <table class="table table-bordered mt-3">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">ID Bahan Baku</th>
                <th scope="col">Nama</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga</th>
                <th scope="col">Tanggal Input</th>
                <th scope="col">Ubah</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>2</td>
                <td>Pupuk Bagus</td>
                <td>3</td>
                <td>2023-04-20 15:34:30</td>
                </tr>
            </tbody>
            </table>
          </div>
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