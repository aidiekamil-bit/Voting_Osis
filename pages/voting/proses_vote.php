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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php if ($berhasil) { ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

Swal.fire({
  title: "Berhasil!",
  text: "Data Berhasil Di Simpan!",
  icon: "success",
 showConfirmButton: false,
 timer: 2000
}).then(() => {
  window.location.href = "../../index.php";
});

</script>
<?php } ?>
  
</body>
</html>
