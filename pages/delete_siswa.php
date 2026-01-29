<?php
include "config.php";

//ambil id dari URL
$id_siswa= $_GET['id'] ?? null;

//proses delete
mysqli_query($koneksi, "DELETE FROM tbl_siswa WHERE id_siswa='$id_siswa'");

//kembali ke halaman siswa
header("Location: siswa.php");
exit;





?>