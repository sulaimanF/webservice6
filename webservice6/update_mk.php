<?php 
  if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('mata_kuliah.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["mata_kuliah"];
    $jsonfile = $jsonfile[$id];

  }

  if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('mata_kuliah.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["mata_kuliah"];
    $jsonfile = $jsonfile[$id];

    $post["kode_mk"] = isset($_POST["kode_mk"]) ? $_POST["kode_mk"] : "";
    $post["nama_mk"] = isset($_POST["nama_mk"]) ? $_POST["nama_mk"] : "";
    $post["jurusan"] = isset($_POST["jurusan"]) ? $_POST["jurusan"] : "";
    $post["jenis"] = isset($_POST["jenis"]) ? $_POST["jenis"] : "";
    $post["sks"] = isset($_POST["sks"]) ? $_POST["sks"] : "";

    if ($jsonfile) {
      unset($all["mata_kuliah"][$id]);
      $all["mata_kuliah"][$id] = $post;
      $all["mata_kuliah"] = array_values($all["mata_kuliah"]);
      file_put_contents("mata_kuliah.json", json_encode($all));
    }
    header("Location: tampil_mk.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="JSON-PHP-CRUD-BOOTSTRAP">
  <meta name="author" content="Fahmi Sulaiman">
  <title>Latihan Web Service 6 : CRUD PHP data JSON Tanpa Databsae</title>
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
        <h3>Ubah Data Mata Kuliah</h3>
      </div>

      <?php 
        if (isset($_GET["id"])) :
      ?>

      <form action="update_mk.php" method="POST">
          <div class="col-md-6">
            <input type="hidden" value="<?= $id ?>" name="id">
            <div class="form-group">
              <label for="input_kode_mk">Kode Mata Kuliah</label>
              <input type="text" name="kode_mk" id="input_kode_mk" class="form-control"
              value="<?= $jsonfile["kode_mk"] ?>" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="input_nama_mk">Nama Mata Kuliah</label>
              <input type="text" name="nama_mk" id="input_nama_mk" class="form-control"
              value="<?= $jsonfile["nama_mk"] ?>" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="input_jurusan">Jurusan</label>
              <select class="form-control" name="jurusan" id="input_jurusan" required="required">
                <option value="1" <?= $jsonfile["jurusan"] == '1'?'selected':''; ?>>Teknik Informatika</option>
                <option value="2" <?= $jsonfile["jurusan"] == '2'?'selected':''; ?>>Rekayasa Perangkat Lunak</option>
                <option value="3" <?= $jsonfile["jurusan"] == '3'?'selected':''; ?>>Sistem Informasi</option>
                <option value="4" <?= $jsonfile["jurusan"] == '4'?'selected':''; ?>>Manajemen Informatika</option>
                <option value="5" <?= $jsonfile["jurusan"] == '5'?'selected':''; ?>>Komputerisasi Akuntansi</option>
              </select>
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="input_jenis">Jenis Mata Kuliah</label>
              <select name="jenis" id="input_jenis" class="form-control" required="required">
              <option value="">Please Select</option>
                <option value="1" <?= $jsonfile["jenis"] == '1'?'selected':'';?>>M K D U</option>
                <option value="2" <?= $jsonfile["jenis"] == '2'?'selected':'';?>>M K D K</option>
                <option value="2" <?= $jsonfile["jenis"] == '3'?'selected':'';?>>M K K</option>
              </select>
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="input_sks">SKS</label>
              <input type="text" name="sks" id="input_sks" class="form-control"
              value="<?= $jsonfile["sks"] ?>" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-action">
              <button class="btn btn-primary" type="submit">UBAH DATA</button>
              <a href="tampil_mk.php" class="btn btn btn-default">KEMBALI</a>
            </div>
          </div>
      </form>
        <?php endif; ?>
    </div>
  </div>
</body>
</html>