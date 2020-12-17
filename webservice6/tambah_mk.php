<?php 
  if (!empty($_POST)) {
    // post value
    $kode_mk  = $_POST['kode_mk'];
    $nama_mk  = $_POST['nama_mk'];
    $jurusan = $_POST['jurusan'];
    $jenis = $_POST['jenis'];
    $sks = $_POST['sks'];

    // membaca semua data yang ada di file mahasiswa.json
    // dalam bentuk string
    $file = file_get_contents('mata_kuliah.json');
    // menerjemahkan string json dengan kata lain,
    // mengubah string json menjadi variabel PHP
    $data = json_decode($file, true);
    // digunakan untuk membuat file target menjadi kosong saat mengapus kontennya
    // membetalkan inisialisasi variabel PHP, sehingga membuat kosong
    unset($_POST["add"]);
    // mengembalikan fungsi array yang berisi semua nilai-nilai array
    $data["mata_kuliah"] = array_values($data["mata_kuliah"]);
    // menambah 1 atau beberapa elemen pada array
    array_push($data["mata_kuliah"], $_POST);
    // fungsi json_encode untuk mengubah format data array menjadi json
    file_put_contents('mata_kuliah.json', json_encode($data));
    header("location: tampil_mk.php");

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
      <div class="col-sm-5 col-sm-offset-3">
        <h3>Tambah Data Mata Kuliah</h3>
        <form method="POST" action="">
          <div class="form-group">
            <label for="input_kode_mk">Kode Mata Kuliah</label>
            <input type="text" name="kode_mk" id="input_kode_mk" class="form-control" required="required" placeholder="Kode Mata Kuliah">
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="input_nama_mk">Nama Mata Kuliah</label>
            <input type="text" name="nama_mk" id="input_nama_mk" class="form-control" required="required" placeholder="Nama Mata kuliah">
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="input_jurusan">Jurusan</label>
            <select name="jurusan" id="input_jurusan" class="form-control" required="required">
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
            <label for="input_jenis">Jenis Mata Kuliah</label>
            <select name="jenis" id="input_jenis" class="form-control" required="required">
            <option>Please Select</option>
              <option value="1">M K D U</option>
              <option value="2">M K D K</option>
              <option value="3">M K K</option>
            </select>
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="input_sks">SKS</label>
            <input type="text" name="sks" id="input_sks" class="form-control" required="required" placeholder="Sistem Kredit Semester">
            <span class="help-block"></span>
          </div>
          <div class="form-action">
            <button class="btn btn-success" type="submit">TAMBAH</button>
            <a href="tampil_mk.php" class="btn btn btn-default">BACK</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>