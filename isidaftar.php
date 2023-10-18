<?php
include 'conn.php';

$nama = "";
$keperluan ="";
$instansi = "";
$tanggal = "";
$surat = "";
$tamu = "";
$error = "";

if(isset($_POST['kirim'])){
    $nama    = $_POST['nama'];
    $keperluan = $_POST['keperluan'];
    $instansi = $_POST['instansi'];
    $tanggal = $_POST['tanggal'];
    $surat  = $_FILES['surat']['name'];
    $tamu  = $_FILES['tamu']['name'];
    $keterangan = "Menunggu Persetujuan";

    $path   = $_FILES['surat']['tmp_name'];
    $folsurat = "surat/$surat";
    move_uploaded_file($path, "$folsurat");

    $path1   = $_FILES['tamu']['tmp_name'];
    $foltamu = "tamu/$tamu";
    move_uploaded_file($path1, "$foltamu");

    
    if($nama && $keperluan && $instansi && $surat && $tamu){
        $sql1   = "INSERT into daftar(nama,keperluan,instansi,surat,tamu,keterangan,tanggal) values ('$nama','$keperluan','$instansi','$folsurat','$foltamu','Menunggu Persetujuan','$tanggal')";
        $q1     = mysqli_query($conn,$sql1);
        if($q1){
            echo "
            <script>
            alert('Data Berhasil Di Kirim');
            document.location.href= 'index.php';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('Data Gagal Di Kirim');
            document.location.href= 'isidaftar.php';
            </script>
            ";
        }
    } else {
        $error  = "Data tidak Boleh Kosong";
    }
} else if(isset($_POST['kembali'])){
    header("location:index.php");
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>Telkom</title>
    <link rel="stylesheet" href="isidaftar.css" />
  </head>
  <body>
    <div class="logo">
      <img src="./img/logo.png" alt="Telkom" />
    </div>
    <div class="tittle">
      <img src="./img/bukutamu.png" alt="Bukutamu" />
    </div>
    <?php
        if($error){
        ?>
        <div class="alert alert-danger" role="alert"><?= $error ?></div>
        <?php
         }
        ?>
    <div class="form-input">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>" require/>
        </div>

        <div class="mb-3">
          <label for="keperluan" class="form-label">Keperluan</label>
          <input type="text" class="form-control" id="keperluan" name="keperluan" value="<?= $keperluan ?>" require/>
        </div>

        <div class="mb-3">
          <label for="instansi" class="form-label">Instansi</label>
          <input type="text" class="form-control" id="instansi" name="instansi" value="<?= $instansi ?>" require/>
        </div>

        <div class="mb-3">
            <label for="surat" class="form-label">Surat Dinas</label>
            <input type="file" class="form-control" id="surat" name="surat" value="<?= $surat ?>">
        </div>

        <div class="mb-3">
            <label for="tamu" class="form-label">Foto Tamu</label>
            <input type="file" class="form-control" id="tamu" name="tamu" value="<?= $tamu ?>">
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $tanggal ?>">
        </div>
        <div class="mb-3">
          <input type="submit" name="kirim" value="Kirim" class="btn btn-danger" />
          <input type="submit" name="kembali" value="Kembali" class="btn btn-primary" />
        </div>
      </form>
    </div>
  </body>
</html>
