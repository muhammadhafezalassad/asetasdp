<?php 
include "../db_conn.php";
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
include "../koneksi.php";
mysqli_query($koneksi, "DELETE FROM pengeluaran WHERE nomor='$_GET[kode]'");

echo "<script>window.alert('Data Dihapus')
window.location='pengeluaran.php'</script>";
}else{
    header("Location: index.php");
    exit();
}
?>
