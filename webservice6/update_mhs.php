<?php 
  if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('mahasiswa.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["mahasiswa"];
    $jsonfile = $jsonfile[$id];

  }

  if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('mahasiswa.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["mahasiswa"];
    $jsonfile = $jsonfile[$id];

    $post["nim"] = isset($_POST["nim"]) ? $_POST["nim"] : "";
    $post["nama"] = isset($_POST["nama"]) ? $_POST["nama"] : "";
    $post["tgl_lahir"] = isset($_POST["tgl_lahir"]) ? $_POST["tgl_lahir"] : "";
    $post["jkelamin"] = isset($_POST["jkelamin"]) ? $_POST["jkelamin"] : "";
    $post["jurusan"] = isset($_POST["jurusan"]) ? $_POST["jurusan"] : "";
    $post["alamat"] = isset($_POST["alamat"]) ? $_POST["alamat"] : "";

    if ($jsonfile) {
      unset($all["mahasiswa"][$id]);
      $all["mahasiswa"][$id] = $post;
      $all["mahasiswa"] = array_values($all["mahasiswa"]);
      file_put_contents("mahasiswa.json", json_encode($all));
    }
    header("Location: tampil_mhs.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="JSON-PHP-CRUD-BOOTSTRAP">
  <meta name="author" content="Fahmi Sulaiman">
  <title>Latihan Web Service 4 : CRUD PHP data JSON Tanpa Databsae</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/latwebservice3.css">
  <style type="text/css">
    .navbar-default {
      background-color: #3b5998;
      font-size: 18px;
      color: #ffffff;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <h4>STMIK IKMI CIREBON</h4>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar"></div>
    </div>
  </nav>
<!-- tutup navbar -->
  <div class="container">
    <div class="row">
      <div class="row">
        <h3>Ubah Data Mahasiswa</h3>
      </div>

      <?php 
        if (isset($_GET["id"])) :
      ?>

      <form action="update_mhs.php" method="POST">
          <div class="col-md-6">
            <input type="hidden" value="<?= $id ?>" name="id">
            <div class="form-group">
              <label for="inputnim">Nomor Induk Mahasiswa</label>
              <input type="text" name="nim" id="inputnim" class="form-control"
              value="<?= $jsonfile["nim"] ?>" placeholder="Nim" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="inputnama">Nama Mahasiswa</label>
              <input type="text" name="nama" id="inputnama" class="form-control"
              value="<?= $jsonfile["nama"] ?>" placeholder="Nama Lengkap" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="inputtgl_lahir">Tanggal Lahir</label>
              <input class="form-control" name="tgl_lahir" id="inputtgl_lahir" 
                value="<?= $jsonfile["tgl_lahir"] ?>" type="date" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="inputjkelamin">Jenis Kelamin</label>
              <select name="jkelamin" id="inputjkelamin" class="form-control" required="required">
              <option value="">Please Select</option>
                <option value="Male" <?= $jsonfile["jkelamin"] == 'Pria'?'selected':'';?>>Pria</option>
                <option value="Female" <?= $jsonfile["jkelamin"] == 'Wanita'?'selected':'';?>>Wanita</option>
              </select>
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="inputjurusan">Jurusan</label>
              <select class="form-control" name="jurusan" id="inputjurusan" required="required">
                <option value="Teknik Informatika" <?= $jsonfile["jurusan"] == 'Teknik Infomatika'?'selected':''; ?>>Teknik Informatika</option>
                <option value="Manajemen Infomatika" <?= $jsonfile["jurusan"] == 'Manajemen Infomatika'?'selected':''; ?>>Manajemen Informatika</option>
                <option value="Komputerisasi Akuntansi" <?= $jsonfile["jurusan"] == 'Komputerisasi Akuntansi'?'selected':''; ?>>Komputerisasi Akuntansi</option>
                <option value="Sistem Informasi" <?= $jsonfile["jurusan"] == 'Sistem Informasi'?'selected':''; ?>>Sistem Informasi</option>
                <option value="Rekayasa Perangkat Lunak" <?= $jsonfile["jurusan"] == 'Rekayasa Perangkat Lunak'?'selected':''; ?>>Rekayasa Perangkat Lunak</option>
              </select>
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="inputalamat">Alamat Lengkap</label>
              <input type="text" name="alamat" id="inputalamat" class="form-control"
              value="<?= $jsonfile["alamat"] ?>" placeholder="Alamat Lengkap" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-action">
              <button class="btn btn-primary" type="submit">UBAH DATA</button>
              <a href="tampil_mhs.php" class="btn btn btn-default">KEMBALI</a>
            </div>
          </div>
      </form>
        <?php endif; ?>
    </div>
  </div>
</body>
</html>