<?php 
  if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('dosen.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["dosen"];
    $jsonfile = $jsonfile[$id];

  }

  if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('dosen.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["dosen"];
    $jsonfile = $jsonfile[$id];

    $post["nidn"] = isset($_POST["nidn"]) ? $_POST["nidn"] : "";
    $post["nm_dosen"] = isset($_POST["nm_dosen"]) ? $_POST["nm_dosen"] : "";
    $post["tgl_lahir"] = isset($_POST["tgl_lahir"]) ? $_POST["tgl_lahir"] : "";
    $post["j_kelamin"] = isset($_POST["j_kelamin"]) ? $_POST["j_kelamin"] : "";
    $post["home_base"] = isset($_POST["home_base"]) ? $_POST["home_base"] : "";
    $post["pend_akhir"] = isset($_POST["pend_akhir"]) ? $_POST["pend_akhir"] : "";

    if ($jsonfile) {
      unset($all["dosen"][$id]);
      $all["dosen"][$id] = $post;
      $all["dosen"] = array_values($all["dosen"]);
      file_put_contents("dosen.json", json_encode($all));
    }
    header("Location: tampil_dsn.php");
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
        <h3>Ubah Data Dosen</h3>
      </div>

      <?php 
        if (isset($_GET["id"])) :
      ?>

      <form action="update_dsn.php" method="POST">
          <div class="col-md-6">
            <input type="hidden" value="<?= $id ?>" name="id">
            <div class="form-group">
              <label for="input_nidn">Nomor Induk Dosen Nasional</label>
              <input type="text" name="nidn" id="input_nidn" class="form-control"
              value="<?= $jsonfile["nidn"] ?>" placeholder="NIDN" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="input_nm_dosen">Nama Dosen</label>
              <input type="text" name="nm_dosen" id="input_nm_dosen" class="form-control"
              value="<?= $jsonfile["nm_dosen"] ?>" placeholder="Nama Lengkap" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="input_tgl_lahir">Tanggal Lahir</label>
              <input class="form-control" name="tgl_lahir" id="input_tgl_lahir" 
                value="<?= $jsonfile["tgl_lahir"] ?>" type="date" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="inputjkelamin">Jenis Kelamin</label>
              <select name="jkelamin" id="inputjkelamin" class="form-control" required="required">
              <option value="">Please Select</option>
                <option value="1" <?= $jsonfile["j_kelamin"] == '1'?'selected':'';?>>Pria</option>
                <option value="2" <?= $jsonfile["j_kelamin"] == '2'?'selected':'';?>>Wanita</option>
              </select>
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="input_homebase">Home Base</label>
              <select class="form-control" name="home_base" id="input_homebase" required="required">
                <option value="1" <?= $jsonfile["home_base"] == '1'?'selected':''; ?>>Teknik Informatika</option>
                <option value="2" <?= $jsonfile["home_base"] == '2'?'selected':''; ?>>Rekayasa Perangkat Lunak</option>
                <option value="3" <?= $jsonfile["home_base"] == '3'?'selected':''; ?>>Sistem Informasi</option>
                <option value="4" <?= $jsonfile["home_base"] == '4'?'selected':''; ?>>Manajemen Informatika</option>
                <option value="5" <?= $jsonfile["home_base"] == '5'?'selected':''; ?>>Komputerisasi Akuntansi</option>
              </select>
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="input_pendidikan_akhir">Pendidikan Terakhir</label>
              <select name="pend_akhir" id="input_pendidikan_akhir" class="form-control" required="required">
              <option value="">Please Select</option>
                <option value="1" <?= $jsonfile["pend_akhir"] == '1'?'selected':'';?>>Sarjana / S-1</option>
                <option value="2" <?= $jsonfile["pend_akhir"] == '2'?'selected':'';?>>Pasca Sarjana / S-2</option>
                <option value="3" <?= $jsonfile["pend_akhir"] == '3'?'selected':'';?>>Doktor / S-3</option>
              </select>
              <span class="help-block"></span>
            </div>
            <div class="form-action">
              <button class="btn btn-primary" type="submit">UBAH DATA</button>
              <a href="tampil_dsn.php" class="btn btn btn-default">KEMBALI</a>
            </div>
          </div>
      </form>
        <?php endif; ?>
    </div>
  </div>
</body>
</html>