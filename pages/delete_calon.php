<?php
include "config.php";

//ambil id dari URL
$id_calon= $_GET['id'] ?? null;

//proses delete
mysqli_query($koneksi, "DELETE FROM tbl_calon_ketua_osis WHERE id_calon='$id_calon'");

//kembali ke halaman siswa
header("Location: calon.php");
exit;





?>