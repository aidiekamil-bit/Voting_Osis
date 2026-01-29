<?php
include "header.php";
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "INSERT INTO tbl_admin (username, password, nama, alamat) VALUES ('$username', '$password', '$nama', '$alamat')" );
}
?>
<div class="container-fluid py-4">
 <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data Admin</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <form method="POST">
                            <div class="mb-3 mt-3 mx-4">
                                <label for="">Username</label>
                                <input type="text" class="form-control " name="username" placeholder="Input Username">
                            </div>
                             <div class="mb-3 mt-3 mx-4">
                                <label for="">Password</label>
                                <input type="text" class="form-control" name="password"  placeholder="Input Password">
                            </div>
                             <div class="mb-3 mt-3 mx-4">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama"  placeholder="Input Nama">
                            </div>
                            <div class="mb-3 mt-3 mx-4">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" name="alamat"  placeholder="Input Alamat">
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