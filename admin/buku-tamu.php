<?php
include '../conn.php';

if(isset($_POST['kembali'])){
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Telkom</title>
    <link rel="stylesheet" href="buku-tamu.css" />
  </head>
  <body>
    <div class="logo">
      <img src="../img/logo.png" alt="Telkom" />
    </div>
    <div class="tittle">
      <h2>Daftar Tamu</h2>
    </div>

    <div class="mx-auto">
    <div class="card">
      <div class="card-header text-white bg-danger">
      <div class="row">
        <form action="" method="POST" class="form-inline">
          <input type="date" name="tgl-mulai" class="form-control">
          <input type="date" name="tgl-selesai" class="form-control">
          <button class="btn btn-success" type="submit" name="filter">Filter</button>
          <button class="btn btn-primary"><a href="hal-admin.php">Kembali</a></button>
        </form>
      </div>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Tamu</th>
              <th scope="col">Keperluan</th>
              <th scope="col">Instansi</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Surat Dinas</th>
              <th scope="col">Foto Tamu</th>
              <th scope="col">keterangan</th>
            </tr>
            <tbody>
            <?php
                if(isset($_POST['filter'])){
                  $mulai = mysqli_real_escape_string($conn,$_POST['tgl-mulai']);
                  $selesai = mysqli_real_escape_string($conn,$_POST['tgl-selesai']);
                  if($mulai != null || $selesai != null){
                    $sql2 = "SELECT * FROM daftar WHERE tanggal BETWEEN '$mulai' AND '$selesai' order by id_tamu desc";
                  } else {
                    $sql2 = "SELECT * FROM daftar order by id_tamu desc";
                  }
                }else {
                  $sql2 = "SELECT * FROM daftar order by id_tamu asc";
                }

                
                $q2 = mysqli_query($conn,$sql2);
                $urut = 1;
                while($r2 = mysqli_fetch_array($q2)){
                  $id = $r2['id_tamu'];
                  $nama = $r2['nama'];
                  $keperluan = $r2['keperluan'];
                  $instansi    = $r2['instansi'];
                  $tanggal    = $r2['tanggal'];
                  $surat = $r2['surat'];
                  $tamu = $r2['tamu'];
                  $keterangan = $r2['keterangan'];

                  ?>
                  <tr>
                    <th scope="row"> <?php echo $urut++ ?></th>
                    <td scope="row"><?= $nama ?></td>
                    <td scope="row"><?= $keperluan ?></td>
                    <td scope="row"><?= $instansi ?></td>
                    <td scope="row"><?= $tanggal ?></td>
                    <td scope="row"><img src="../<?= $surat?>" style="width:150px; border-radius:5px;" alt=""></td>
                    <td scope="row"><img src="../<?= $tamu?>" style="width:150px; border-radius:5px;" alt=""></td>
                    <td scope="row" style="font-weight:bold;"><?= $keterangan ?></td>
                  </tr>
                  <?php
                }
              ?>
            </tbody>
          </thead>
        </table>
      </div>
    </div>
    </div>
  </body>
</html>
