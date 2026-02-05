<?php
include "../header/header.php";
include "../header/config.php";
$berhasil = false;


$current_page = basename($_SERVER['PHP_SELF']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];
   

  //lokasi tujuan foto
  $folder = "../../assets";

  //ambil data file
  $namaFile = $_FILES['foto']['name'];
  $tmpFile = $_FILES['foto']['tmp_name'];

  //$_FILES['foto']['name'];
  //$_FILES adalah variabel bawaan php untuk menampung data file yang di-upload.
  // [foto] : name yang ada di form . [name] untuk mengambil Nama asli file yang di-ulpload oleh user.

  // Bikin nama unik biar ga nabrak
  $namaBaru = time() . "_" . $namaFile;

  //pindahkan nama file
  move_uploaded_file($tmpFile, $folder . $namaBaru);


    $query = mysqli_query($koneksi, "INSERT INTO tbl_calon_ketua_osis (nama_calon, visi, misi, foto) VALUES ('$nama', '$visi', '$misi', '$namaBaru')" );

     if($query){
    $berhasil = true;
   }

  }
?>
<div class="container-fluid py-4">
 <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data Calon</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <form method="POST" enctype="multipart/form-data">
                            <div class="mb-3 mt-3 mx-4">
                                <label for="">Nama</label>
                                <input type="text" class="form-control " name="nama" placeholder="Input Nama calon" required>
                            </div>
                             <div class="mb-3 mt-3 mx-4">
                                <label for="">Visi</label>
                                <input type="text" class="form-control" name="visi"  placeholder="Input Visi" required>
                            </div>
                             <div class="mb-3 mt-3 mx-4">
                                <label for="">Misi</label>
                                <input type="text" class="form-control" name="misi"  placeholder="Input Misi" required>
                            </div>
                            <div class="mb-3 mt-3 mx-4">
                                <label for="">Foto</label>
                                <input type="file" class="form-control" name="foto" required >
                            </div>
                            <div class= "mx-4">
                            <button class="btn btn-warning form-control ">
                            Simpan
                            </button> 
</div>
                        </form>


                     
                  
        </div>
      </div>
    </div>
</div>

<?php if ($berhasil) { ?>
<script>

Swal.fire({
  title: "Berhasil!",
  text: "Data Berhasil Di Simpan!",
  icon: "success",
 showConfirmButton: false,
 timer: 2000
}).then(() => {
  window.location.href = "calon.php";
});

</script>
<?php } ?>