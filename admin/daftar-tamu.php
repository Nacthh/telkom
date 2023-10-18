<?php
include '../conn.php';

if(isset($_POST['kembali'])){
  header("location:index.php");
}

session_start();
if(!isset($_SESSION['username'])){
  header("location:../login.php");
  exit;
}

  if(isset($_POST['terima'])){
    $id = $_POST['id_tamu'];

    $select = "UPDATE daftar SET keterangan = 'Diterima' WHERE id_tamu = $id";
    $result = mysqli_query($conn,$select);

    echo "
            <script>
            alert('Tamu Diterima');
            document.location.href= 'daftar-tamu.php';
            </script>
            ";
  }

  if(isset($_POST['tolak'])){
    $id = $_POST['id_tamu'];

    $select = "UPDATE daftar SET keterangan = 'Ditolak' WHERE id_tamu = $id";
    $result = mysqli_query($conn,$select);

    echo "
            <script>
            alert('Tamu Ditolak');
            document.location.href= 'daftar-tamu.php';
            </script>
            ";
  }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Telkom</title>
    <link rel="stylesheet" href="daftar-tamu.css" />
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
      <button><a href="hal-admin.php">Kembali</a></button>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Tamu</th>
              <th scope="col">Keperluan</th>
              <th scope="col">Instansi</th>
              <th scope="col">Surat Dinas</th>
              <th scope="col">Foto Tamu</th>
              <th scope="col">Unduh</th>
              <th scope="col">keterangan</th>
            </tr>
            <tbody>
              <?php
                $sql2 = "SELECT * FROM daftar WHERE keterangan = 'Menunggu Persetujuan' order by id_tamu asc";
                $q2 = mysqli_query($conn,$sql2);
                $urut = 1;
                while($r2 = mysqli_fetch_array($q2)){
                  $id = $r2['id_tamu'];
                  $nama = $r2['nama'];
                  $keperluan = $r2['keperluan'];
                  $instansi    = $r2['instansi'];
                  $surat = $r2['surat'];
                  $tamu = $r2['tamu'];

                  ?>
                  <tr>
                    <th scope="row"> <?php echo $urut++ ?></th>
                    <td scope="row"><?= $nama ?></td>
                    <td scope="row"><?= $keperluan ?></td>
                    <td scope="row"><?= $instansi ?></td>
                    <td scope="row"><img src="../<?= $surat?>" style="width:150px; border-radius:5px;" alt=""></td>
                    <td scope="row"><img src="../<?= $tamu?>" style="width:150px; border-radius:5px;" alt=""></td>
                    <td scope="row">
                      <div class="download">
                      <a href="download.php?url=../<?= $surat ?>" >Surat</a>
                      <a href="download.php?url=../<?= $tamu ?>">Foto</a>
                      </div>
                    </td>
                    <td scope="row">
                        <form action="daftar-tamu.php" method="POST">
                          <input type="hidden" name="id_tamu" value="<?= $r2['id_tamu'] ?>">
                          <input style="background-color:#5cb85c" type="submit" name="terima" value="Terima">
                          <input style="background-color:#d9534f" type="submit" name="tolak" value="Tolak">
                        </form>
                        
                    </td>
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
