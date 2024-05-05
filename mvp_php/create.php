<?php

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");

$prosespasien = new ProsesPasien();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = array(
        'nik' => $_POST['nik'],
        'nama' => $_POST['nama'],
        'tempat' => $_POST['tempat'],
        'tl' => $_POST['tl'],
        'gender' => $_POST['gender'],
        'email' => $_POST['email'],
        'telp' => $_POST['telp']
    );

    $prosespasien->tambahPasien($data);
    header("Location: index.php"); // Redirect ke halaman utama setelah menambahkan data
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Tabel dan CRUD</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">WIW</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="create.php">ADD PASIEN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
    <br/>
  <br/>

  <div class="col-lg-4 col-md-4 col-sm-4 col-4 m-3">
    <div class="card p-5 mr-3">
      <h2 class="card-title">Add Pasien</h2>
      <form action="create.php" method="POST">
        <div class="form-row">
          <div class="form-group col">
          <input type="hidden" name="id">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col">
          <label>NIK</label>
          <input type="text" name="nik">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col">
          <label>Nama</label>
          <input type="text" name="nama">
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col">
          <label>Tempat</label>
          <input type="text" name="tempat">
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col">
          <label>Tanggal Lahir</label>
          <input type="date" name="tl">
          </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col">
                <label>Jenis Kelamin</label>
                <input type = "radio" name="gender" value="Laki-laki">Laki-laki
                <input type = "radio" name="gender" value="Perempuan">Perempuan
          </div>
      </div>
      
      <div class="form-row">
          <div class="form-group col">
              <label>Email</label>
              <input type="email" name="email">
          </div>
      </div>
      
      <div class="form-row">
        <div class="form-group col">
          <label>No. Telp</label>
          <input type="text" name="telp">
        </div>
      </div>

        <button type="submit" name="add" class="btn btn-primary mt-3">Add</button>
      </form>
    </div>
  </div>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
      </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
      </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
      </script>
  </body>
</html>