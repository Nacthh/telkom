<?php
// koneksi ke data base
$host   = "localhost";
$user   = "root";
$pass   = "";
$db     = "telkom";

$conn = mysqli_connect($host,$user,$pass,$db);
if(!$conn){
    die("Tidak Bisa Terkoneksi Ke DataBase");
}