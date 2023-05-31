<!DOCTYPE html>
<html lang="en">
<head>
<title>Data Siswa SMKN 2 KUNINGAN</title>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
</head>
<body>
<?php
include('class/Database.php');
include('class/Siswa.php');
include('class/Jurusan.php');
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand"#">APLIKASI DATA SISWA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?file=siswa&aksi=tampil">Data Siswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?file=jurusan&aksi=tampil">Data Jurusan</a>
        </li>
      </ul>
      <form class="d-flex">
      </form>
    </div>
  </div>
</nav>  
<?php
if(isset($_GET['file'])){
include($_GET['file'].'.php');
} else {
echo '<h1 align="center">Selamat Datang</h1>';
}
?>
</body>
</html>