<?php
include '../conn.php';
session_start();
if(!isset($_SESSION['username'])){
  header("location:../login.php");
  exit;
}

$id = $_GET['id'];
// mengambil data project berdasarkan ID

// inisialisasi Variable
$keterangan         = "";
$error          = "";
$sukses         = "";

if(isset($_POST['terima'])){
    // melakukan perubahan isi terhadap variable dengan data baru
    // query untuk melakukan update data berdasarkan data yang di isi
    $sql1   = "UPDATE projek SET
    keterangan = 'Diterima'
    WHERE id_projek = $id_projek
    ";
    $q1     = mysqli_query($conn,$sql1);
    if($q1){
        echo "
        <script>
        alert('Keterangan Berhasil di Ubah');
        document.location.href= 'projek-admin.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Keterangan gagal di Ubah');
        </script>
        ";
    }
  
    
  
    
  } else if(isset($_POST['tolak'])){
    // melakukan perubahan isi terhadap variable dengan data baru
    // query untuk melakukan update data berdasarkan data yang di isi
    $sql1   = "UPDATE projek SET
    keterangan = 'Ditolak'
    WHERE id_projek = $id_projek
    ";
    $q1     = mysqli_query($conn,$sql1);
    if($q1){
        echo "
        <script>
        alert('Keterangan Berhasil di Ubah');
        document.location.href= 'projek-admin.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Keterangan Gagal di Ubah');
        </script>
        ";
    }
  
    
  
    
  } 
?>