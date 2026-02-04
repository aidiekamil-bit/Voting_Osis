<?php
include "../header/config.php";

//ambil id dari URL
$id_admin= $_GET['id'] ?? null;

//proses delete
mysqli_query($koneksi, "DELETE FROM tbl_admin WHERE id_admin= '$id_admin'");

//kembali ke halaman siswa
header("Location: admin.php");
exit;





?>