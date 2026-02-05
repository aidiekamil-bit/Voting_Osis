<?php
include "../header/config.php";
$current_page = basename($_SERVER['PHP_SELF']);
$berhasil = false;
//ambil id daru url
//kalau di url ada id, simpan ke var $id
//kalau ga ada, isi var $id dengan null, jadi $id = null
$id_admin= $_GET['id'] ?? null;

//ambil data dari id
if($id_admin){
    $query = mysqli_query($koneksi, "SELECT * from tbl_admin where id_admin = '$id_admin'");
    $siswa = mysqli_fetch_assoc($query);
    //mysqli_fetch_assoc akan mengambil 1 baris data hasil dari query
}
//update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    if ($_FILES['foto']['name'] != ""){
      $foto = $_FILES['foto']['name'];
      $tmp = $_FILES['foto']['tmp_name'];

      $folder = "../../assets";

      move_uploaded_file($tmp, $folder . $foto);

      //update + foto
      $sql = "UPDATE tbl_admin SET
              username='$username',
              password='$password',
              nama='$nama',
              alamat='$alamat',
              foto='$foto'
              WHERE id_admin='$id_admin' ";
    }else{
      //update tanpa ganti foto
      $sql = "UPDATE tbl_admin SET
             username='$username',
              password='$password',
              nama='$nama',
              alamat='$alamat',
              WHERE id_admin='$id_admin'";

    }

    
   

    $query = mysqli_query($koneksi, "update tbl_admin set username='$username', password='$password', nama='$nama', alamat='$alamat', foto='$foto' where id_admin = '$id_admin' ");
 
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
              <form method="POST" enctype="multipart/form-data">
                            <div class="mb-3 mt-3 mx-4">
                                <label for="">Username</label>
                                <input type="text" class="form-control " name="username"  value= "<?= $siswa['username']; ?>" required>
                            </div>
                             <div class="mb-3 mt-3 mx-4">
                                <label for="">Password</label>
                                <input type="text" class="form-control" name="password"   value= "<?= $siswa['password']; ?>" required>
                            </div>
                             <div class="mb-3 mt-3 mx-4">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama" value= "<?= $siswa['nama']; ?>" required>
                            </div>
                            <div class="mb-3 mt-3 mx-4">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value= "<?= $siswa['alamat']; ?>" required>
                            </div>
                              <div class="mb-3 mt-3 mx-4">
                                <label for="">Foto</label>
                                 <div>
                            <img src="../../assets<?= $siswa['foto']?>" class="avatar avatar-lg me-3" alt="user1">
                           
                          </div>
                                <input type="file" class="form-control mt-3" name="foto" value= "<?= $siswa['foto']; ?>" required>
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
  window.location.href = "admin.php";
});

</script>
<?php } ?>