<?php 
    // membaca semua data yang ada di file people.json
    // dalam bentuk string
    $getfile = file_get_contents('dosen.json');
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
  <title>Latihan Web Service 5 : CRUD PHP data JSON Tanpa Databsae</title>
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
      <h3>Latihan Web Service - Pertemuan 5</h3>
      <p>Create, Read, Update, and Delete Data From JSON</p>
    </div>
  </div>
  <div class="container">
    <div class="btn-toolbar">
      <a href="tambah_dsn.php" class="btn btn-primary"><i class="icon-plus"></i>Tambah Data</a>
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
            <th>NIDN</th>
            <th>Nama Dosen</th>
            <th>Tanggal lahir</th>
            <th>Jenis Kelamin</th>
            <th>Home Base</th>
            <th>Pendidikan Terakhir</th>
            <th>Action</th>
          </tr>
          <?php 
            $no = 0;
            foreach ($jsonfile->dosen as $index => $obj) : $no++;
              $tgl=date("d/m/Y",strtotime($obj->tgl_lahir));

              $j_kelamin = ($obj->j_kelamin);
              if ($j_kelamin==1) {
                $j_kelamin="Pria";
              } else {
                $j_kelamin="Wanita";
              }

              $homebase = ($obj->home_base);
              if ($homebase==1) {
                $homebase="Teknik Informatika / S-1";
              } elseif ($homebase==2) {
                $homebase="Rekayasa Perangkat Lunak / S-1";
              } elseif ($homebase==3) {
                $homebase="Sistem Informasi / S-1";
              } elseif ($homebase==4) {
                $homebase="Manajemen Informatika / D-4";
              } else {
                $homebase="Komputerisasi Akuntansi / D-4";
              }

              $pendidikan = ($obj->pend_akhir);
              if ($pendidikan==1) {
                $pendidikan="Sarjana / S-1";
              } elseif ($pendidikan==2) {
                $pendidikan="Pasca Sarjana / S-2";
              } else {
                $pendidikan="Doktor / S-3";
              }
          ?>
          <tr>
            <td><?= $no; ?></td>
            <td><?= $obj->nidn; ?></td>
            <td><?= $obj->nm_dosen; ?></td>
            <td><?= $tgl; ?></td>
            <td><?= $j_kelamin; ?></td>
            <td><?= $homebase; ?></td>
            <td><?= $pendidikan; ?></td>
            <td>
              <a class="btn btn-xs btn-primary" href="update_dsn.php?id=<?= $index; ?>">Edit</a>
              <a class="btn btn-xs btn-danger" href="delete_dsn.php?id=<?= $index; ?>">Delete</a>
            </td>
          </tr>
            <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</body>
</html>