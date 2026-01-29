<?php
include "config.php";


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

   

    mysqli_query($koneksi, "update tbl_admin set username='$username', password='$password', nama='$nama', alamat='$alamat' where id_admin = '$id_admin' ");

    
}

include "header.php";


?>
<div class="container-fluid py-4">
 <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data Siswa</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <form method="POST">
                            <div class="mb-3 mt-3 mx-4">
                                <label for="">Username</label>
                                <input type="text" class="form-control " name="username"  value= "<?= $siswa['username']; ?>" >
                            </div>
                             <div class="mb-3 mt-3 mx-4">
                                <label for="">Password</label>
                                <input type="text" class="form-control" name="password"   value= "<?= $siswa['password']; ?>">
                            </div>
                             <div class="mb-3 mt-3 mx-4">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama" value= "<?= $siswa['nama']; ?>">
                            </div>
                            <div class="mb-3 mt-3 mx-4">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value= "<?= $siswa['alamat']; ?>" >
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