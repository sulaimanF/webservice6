<?php 
  if (!empty($_POST)) {
    // post value
    $nim  = $_POST['nim'];
    $nama  = $_POST['nama'];
    $tgl_lahir = date("Y-m-d",strtotime($_POST['tgl_lahir']));
    $jkelamin = $_POST['jkelamin'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    // membaca semua data yang ada di file mahasiswa.json
    // dalam bentuk string
    $file = file_get_contents('mahasiswa.json');
    // menerjemahkan string json dengan kata lain,
    // mengubah string json menjadi variabel PHP
    $data = json_decode($file, true);
    // digunakan untuk membuat file target menjadi kosong saat mengapus kontennya
    // membetalkan inisialisasi variabel PHP, sehingga membuat kosong
    unset($_POST["add"]);
    // mengembalikan fungsi array yang berisi semua nilai-nilai array
    $data["mahasiswa"] = array_values($data["mahasiswa"]);
    // menambah 1 atau beberapa elemen pada array
    array_push($data["mahasiswa"], $_POST);
    // fungsi json_encode untuk mengubah format data array menjadi json
    file_put_contents('mahasiswa.json', json_encode($data));
    header("location: tampil_mhs.php");

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
      <div class="col-sm-5 col-sm-offset-3">
        <h3>Tambah Data Mahasiswa</h3>
        <form method="POST" action="">
          <div class="form-group">
            <label for="inputnim">Nomor Induk Mahasiswa</label>
            <input type="text" name="nim" id="inputnim" class="form-control" required="required" placeholder="NIM">
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="inputnama">Nama Mahasiswa</label>
            <input type="text" name="nama" id="inputnama" class="form-control" required="required" placeholder="Nama Lengkap">
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="inputtgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="inputtgl_lahir" class="form-control" required="required" placeholder="mm / dd / yyyy">
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="inputjkelamin">Jenis Kelamin</label>
            <select name="jkelamin" id="inputjkelamin" class="form-control" required="required">
            <option value="">Please Select</option>
              <option value="Pria">Pria</option>
              <option value="Wanita">Wanita</option>
            </select>
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="inputjurusan">Jurusan</label>
            <select name="jurusan" id="inputjurusan" class="form-control" required="required">
            <option value="">Please Select</option>
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Manajemen Informatika">Manajemen Informatika</option>
              <option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
              <option value="Sistem Informasi">Sistem Informasi</option>
              <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
            </select>
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="inputalamat">Alamat Lengkap</label>
            <input type="text" name="alamat" id="inputalamat" class="form-control" required="required" placeholder="Alamat Lengkap">
            <span class="help-block"></span>
          </div>
          <div class="form-action">
            <button class="btn btn-success" type="submit">TAMBAH</button>
            <a href="tampil_mhs.php" class="btn btn btn-default">BACK</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>