<?php 
    // membaca semua data yang ada di file people.json
    // dalam bentuk string
    $getfile = file_get_contents('mahasiswa.json');
    // menerjemahkan stirng json dengan kata lain,
    // mengubah string json menjadi varibel PHP
    $jsonfile = json_decode($getfile);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Fahmi Sulaiman">
  <title>Latihan Web Service 4 : CRUD PHP data JSON Tanpa Databsae</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/latwebservice3.css">
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="tampil.php" class="navbar-brand">STMIK IKMI CIREBON</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <li class="clr1 active"><a href="tampil.php">HOME</a></li>
          <li class="clr2"><a href="tampil_mhs.php">MAHASISWA</a></li>
          <li class="clr3"><a href="tampil_dsn.php">DOSEN</a></li>
          <li class="clr3"><a href="tampil_mk.php">MATA KULIAH</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <br><br><br><br>
  <div class="container">
    <div class="jumbotron">
      <h3>Latihan Web Service - Pertemuan 4</h3>
      <p>Create, Read, Update, and Delete Data From JSON</p>
    </div>
  </div>
  <div class="container">
    <div class="btn-toolbar">
      <a href="tambah_mhs.php" class="btn btn-primary"><i class="icon-plus"></i>Tambah Data</a>
      <div class="btn-group">
      
      </div>
    </div>
  </div>
  <br>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <table class="table table-striped table-bordered table-hover">
          <tr>
            <th>No.</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Tanggal lahir</th>
            <th>Jenis Kelamin</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Action</th>
          </tr>
          <?php 
            $no = 0;
            foreach ($jsonfile->mahasiswa as $index => $obj) : $no++;
              $Tgl=date("d/m/Y",strtotime($obj->tgl_lahir));
          ?>
          <tr>
            <td><?= $no; ?></td>
            <td><?= $obj->nim; ?></td>
            <td><?= $obj->nama; ?></td>
            <td><?= $Tgl; ?></td>
            <td><?= $obj->jkelamin; ?></td>
            <td><?= $obj->jurusan; ?></td>
            <td><?= $obj->alamat; ?></td>
            <td>
              <a class="btn btn-xs btn-primary" href="update_mhs.php?id=<?= $index; ?>">Edit</a>
              <a class="btn btn-xs btn-danger" href="delete_mhs.php?id=<?= $index; ?>">Delete</a>
            </td>
          </tr>
            <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</body>
</html>