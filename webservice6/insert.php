<?php 
  if (!empty($_POST)) {
    // post value
    $fname  = $_POST['fname'];
    $lname  = $_POST['lname'];
    $age    = $_POST['age'];
    $gender = $_POST['gender'];

    // membeaca semua data yang ada di file people.json
    // dalam bentuk string
    $file = file_get_contents('people.json');
    // menerjemahkan string json dengan kata lain,
    // mengubah string json menjadi variabel PHP
    $data = json_decode($file, true);
    // digunakan untuk membuat file target menjadi kosong saat mengapus kontennya
    // membetalkan inisialisasi variabel PHP, sehingga membuat kosong
    unset($_POST["add"]);
    // mengembalikan fungsi array yang berisi semua nilai-nilai array
    $data["records"] = array_values($data["records"]);
    // menambah 1 atau beberapa elemen pada array
    array_push($data["records"], $_POST);
    // fungsi json_encode untuk mengubah format data array menjadi json
    file_put_contents('people.json', json_encode($data));
    header("location: tampil.php");

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="JSON-PHP-CRUD-BOOTSTRAP">
  <meta name="author" content="Fahmi Sulaiman">
  <title>Latihan Web Service 3 : CRUD PHP data JSON Tanpa Databsae</title>
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
        <h3>Tambah Pengguna Baru</h3>
        <form method="POST" action="">
          <div class="form-group">
            <label for="inputFName">Nama Depan</label>
            <input type="text" name="fname" id="inputFName" class="form-control" required="required" placeholder="First Name">
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="inputLName">Nama Belakang</label>
            <input type="text" name="lname" id="inputLName" class="form-control" required="required" placeholder="Last Name">
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="inputAge">Usia</label>
            <input type="number" name="age" id="inputAge" class="form-control" required="required" placeholder="Age">
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="inputGender">Jenis Kelamin</label>
            <select name="gender" id="inputGender" class="form-control" required="required">
            <option value="">Please Select</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
            <span class="help-block"></span>
          </div>
          <div class="form-action">
            <button class="btn btn-success" type="submit">TAMBAH</button>
            <a href="tampil.php" class="btn btn btn-default">BACK</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>