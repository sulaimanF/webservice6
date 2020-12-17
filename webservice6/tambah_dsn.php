<?php 
  if (!empty($_POST)) {
    // post value
    $nidn  = $_POST['nidn'];
    $nm_dosen  = $_POST['nm_dosen'];
    $tgl_lahir = date("Y-m-d",strtotime($_POST['tgl_lahir']));
    $j_kelamin = $_POST['j_kelamin'];
    $home_base = $_POST['home_bsae'];
    $pend_akhir = $_POST['pend_akhir'];

    // membaca semua data yang ada di file mahasiswa.json
    // dalam bentuk string
    $file = file_get_contents('dosen.json');
    // menerjemahkan string json dengan kata lain,
    // mengubah string json menjadi variabel PHP
    $data = json_decode($file, true);
    // digunakan untuk membuat file target menjadi kosong saat mengapus kontennya
    // membetalkan inisialisasi variabel PHP, sehingga membuat kosong
    unset($_POST["add"]);
    // mengembalikan fungsi array yang berisi semua nilai-nilai array
    $data["dosen"] = array_values($data["dosen"]);
    // menambah 1 atau beberapa elemen pada array
    array_push($data["dosen"], $_POST);
    // fungsi json_encode untuk mengubah format data array menjadi json
    file_put_contents('dosen.json', json_encode($data));
    header("location: tampil_dsn.php");

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="JSON-PHP-CRUD-BOOTSTRAP">
  <meta name="author" content="Fahmi Sulaiman">
  <title>Latihan Web Service 5 : CRUD PHP data JSON Tanpa Databsae</title>
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
      <div class="col-sm-5 col-sm-offset-3">
        <h3>Tambah Data Dosen</h3>
        <form method="POST" action="">
          <div class="form-group">
            <label for="input_nidn">Nomor Induk Dosen Nasional</label>
            <input type="text" name="nidn" id="input_nidn" class="form-control" required="required" placeholder="NIDN">
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="input_nm_dosen">Nama Dosen</label>
            <input type="text" name="nm_dosen" id="input_nm_dosenn" class="form-control" required="required" placeholder="Nama Lengkap Dosen">
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="input_tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="input_tgl_lahir" class="form-control" required="required" placeholder="mm / dd / yyyy">
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="input_j_kelamin">Jenis Kelamin</label>
            <select name="j_kelamin" id="input_j_kelamin" class="form-control" required="required">
            <option>Please Select</option>
              <option value="1">Pria</option>
              <option value="2">Wanita</option>
            </select>
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="input_homebase">Home base</label>
            <select name="home_base" id="input_homebase" class="form-control" required="required">
            <option value="">Please Select</option>
              <option value="1">Teknik Informatika</option>
              <option value="2">Rekayasa Perangkat Lunak</option>
              <option value="3">Sistem Informasi</option>
              <option value="4">Manajemen Informatika</option>
              <option value="5">Komputerisasi Akuntansi</option>
            </select>
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="input_pendidikan_akhir">Pendidikan Terakhir</label>
            <select name="pend_akhir" id="input_pendidikan_akhir" class="form-control" required="required">
            <option>Please Select</option>
              <option value="1">Sarjana / S-1</option>
              <option value="2">pasca sarjana / S-2</option>
              <option value="3">Doktor / S-3</option>
            </select>
            <span class="help-block"></span>
          </div>
          <div class="form-action">
            <button class="btn btn-success" type="submit">TAMBAH</button>
            <a href="tampil_dsn.php" class="btn btn btn-default">BACK</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>