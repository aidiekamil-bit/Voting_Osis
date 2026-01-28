<?php
include "header.php";
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "INSERT INTO tbl_siswa (nama, kelas, jurusan, alamat) VALUES ('$nama', '$kelas', '$jurusan', '$alamat')" );
}
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
                                <label for="">Nama</label>
                                <input type="text" class="form-control " name="nama" placeholder="Input Nama">
                            </div>
                             <div class="mb-3 mt-3 mx-4">
                                <label for="">Kelas</label>
                                <input type="text" class="form-control" name="kelas"  placeholder="Input Kelas">
                            </div>
                             <div class="mb-3 mt-3 mx-4">
                                <label for="">Jurusan</label>
                                <input type="text" class="form-control" name="jurusan"  placeholder="Input Jurusan">
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