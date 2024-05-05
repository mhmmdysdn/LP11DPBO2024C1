<?php

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");


$tp = new TampilPasien();

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
//     $data = array(
//         'nik' => $_POST['nik'],
//         'nama' => $_POST['nama'],
//         'tempat' => $_POST['tempat'],
//         'tl' => $_POST['tl'],
//         'gender' => $_POST['gender'],
//         'email' => $_POST['email'],
//         'telp' => $_POST['telp']
//     );

//     $tp->tambahPasien($data);
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $tp->hapusPasien($id);
    echo "<script>alert('Data berhasil dihapus');</script>";
    header("Location: index.php"); 
    exit(); 
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $data = array(
        'id' => $_POST['id'],
        'nik' => $_POST['nik'],
        'nama' => $_POST['nama'],
        'tempat' => $_POST['tempat'],
        'tl' => $_POST['tl'],
        'gender' => $_POST['gender'],
        'email' => $_POST['email'],
        'telp' => $_POST['telp']
    );
    $tp->ubahPasien($data);
}
$data = $tp->tampil();