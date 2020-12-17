<?php 
  if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('people.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["records"];
    $jsonfile = $jsonfile[$id];

  }

  if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('people.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["records"];
    $jsonfile = $jsonfile[$id];

    $post["fname"] = isset($_POST["fname"]) ? $_POST["fname"] : "";
    $post["lname"] = isset($_POST["lname"]) ? $_POST["lname"] : "";
    $post["age"] = isset($_POST["age"]) ? $_POST["age"] : "";
    $post["gender"] = isset($_POST["gender"]) ? $_POST["gender"] : "";

    if ($jsonfile) {
      unset($all["records"][$id]);
      $all["records"][$id] = $post;
      $all["records"] = array_values($all["records"]);
      file_put_contents("people.json", json_encode($all));
    }
    header("Location: tampil.php");
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
      <div class="row">
        <h3>Ubah Pengguna</h3>
      </div>

      <?php 
        if (isset($_GET["id"])) :
      ?>

      <form action="update.php" method="POST">
          <div class="col-md-6">
            <input type="hidden" value="<?= $id ?>" name="id">
            <div class="form-group">
              <label for="inputFName">Nama Depan</label>
              <input type="text" name="fname" id="inputFName" class="form-control"
              value="<?= $jsonfile["fname"] ?>" placeholder="First Name" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="inputLName">Nama Belakang</label>
              <input type="text" name="lname" id="inputLName" class="form-control"
              value="<?= $jsonfile["lname"] ?>" placeholder="Last Name" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="inputAge">Usia</label>
              <input type="number" name="age" id="inputAge" class="form-control"
              value="<?= $jsonfile["age"] ?>" placeholder="Age" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="inputGender">Jenis Kelamin</label>
              <select name="gender" id="inputGender" class="form-control" required="required">
              <option value="">Please Select</option>
                <option value="Male" <?= $jsonfile["gender"] == 'Male'?'selected':'';?>>Male</option>
                <option value="Female" <?= $jsonfile["gender"] == 'Female'?'selected':'';?>>Female</option>
              </select>
              <span class="help-block"></span>
            </div>
            <div class="form-action">
              <button class="btn btn-primary" type="submit">UBAH DATA</button>
              <a href="tampil.php" class="btn btn btn-default">KEMBALI</a>
            </div>
          </div>
      </form>
        <?php endif; ?>
    </div>
  </div>
</body>
</html>