<?php
session_start();
include "../header/config.php";

$berhasil = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   $id_calon = $_POST['id_calon'];
   $tanggal = date('Y-m-d H:i:s');



    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_voting (id_calon, tanggal, id_siswa) VALUES ('$id_calon', '$tanggal', '0')" );

   

    if($simpan){
    $berhasil = true;
   }
  }

?>
<?php if ($berhasil) { ?>
<script>

Swal.fire({
  title: "Berhasil!",
  text: "Data Berhasil Di Simpan!",
  icon: "success",
 showConfirmButton: false,
 timer: 2000
}).then(() => {
  window.location.href = "index.php";
});

</script>
<?php } ?>