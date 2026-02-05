<?php
include "../header/config.php";
$current_page = basename($_SERVER['PHP_SELF']);

$berhasil = false;

//ambil id daru url
//kalau di url ada id, simpan ke var $id
//kalau ga ada, isi var $id dengan null, jadi $id = null
$id_siswa= $_GET['id'] ?? null;

//ambil data dari id
if($id_siswa){
    $query = mysqli_query($koneksi, "SELECT * from tbl_siswa where id_siswa = '$id_siswa'");
    $siswa = mysqli_fetch_assoc($query);
    //mysqli_fetch_assoc akan mengambil 1 baris data hasil dari query
}
//update
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];


  
    if ($_FILES['foto']['name'] != ""){
      $foto = $_FILES['foto']['name'];
      $tmp = $_FILES['foto']['tmp_name'];

      $folder = "../../assets";

      move_uploaded_file($tmp, $folder . $foto);

      //update + foto
      $sql = "UPDATE tbl_siswa SET
              nama='$nama',
              kelas='$kelas',
              jurusan='$jurusan',
              alamat='$alamat',
              foto='$foto'
              WHERE id_siswa='$id_siswa' ";
    }else{
      //update tanpa ganti foto
      $sql = "UPDATE tbl_siswa SET
              nama='$nama',
              kelas='$kelas',
              jurusan='$jurusan',
             alamat='$alamat',
              WHERE id_siswa='$id_siswa'";

    }
  

   $query = mysqli_query($koneksi, "update tbl_siswa set nama='$nama', kelas='$kelas', jurusan='$jurusan', alamat='$alamat', foto='$foto'  where id_siswa = '$id_siswa' ");

    if($query){
    $berhasil = true;
   }
}

include "../header/header.php";


?>
<div class="container-fluid py-4">
 <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data Siswa</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <form method="POST"  enctype="multipart/form-data">
                            <div class="mb-3 mt-3 mx-4">
                                <label for="">Nama</label>
                                <input type="text" class="form-control " name="nama"  value= "<?= $siswa['nama']; ?>"  required>
                            </div>
                             <div class="mb-3 mt-3 mx-4">
                                <label for="">Kelas</label>
                                <input type="text" class="form-control" name="kelas"   value= "<?= $siswa['kelas']; ?>"  required>
                            </div>
                             <div class="mb-3 mt-3 mx-4">
                                <label for="">Jurusan</label>
                                <input type="text" class="form-control" name="jurusan" value= "<?= $siswa['jurusan']; ?>"  required>
                            </div>
                            <div class="mb-3 mt-3 mx-4">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value= "<?= $siswa['alamat']; ?>"  required>
                            </div>
                            <div class="mb-3 mt-3 mx-4">
                                <label for="">Foto</label>
                                <div>
                            <img src="../../assets<?= $siswa['foto']?>" class="avatar avatar-lg me-3" alt="user1">
                           
                          </div>
                                <input type="file" class="form-control mt-3" name="foto" value= "<?= $siswa['foto']; ?>"  required>
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
  window.location.href = "siswa.php";
});

</script>
<?php } ?>