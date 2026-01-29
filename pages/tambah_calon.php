<?php
include "header.php";
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];
    $foto = $_POST['foto'];

    mysqli_query($koneksi, "INSERT INTO tbl_calon_ketua_osis (nama_calon, visi, misi, foto) VALUES ('$nama', '$visi', '$misi', '$foto')" );
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
              <form method="POST">
                            <div class="mb-3 mt-3 mx-4">
                                <label for="">Nama</label>
                                <input type="text" class="form-control " name="nama" placeholder="Input Nama calon">
                            </div>
                             <div class="mb-3 mt-3 mx-4">
                                <label for="">Visi</label>
                                <input type="text" class="form-control" name="visi"  placeholder="Input Visi">
                            </div>
                             <div class="mb-3 mt-3 mx-4">
                                <label for="">Misi</label>
                                <input type="text" class="form-control" name="misi"  placeholder="Input Misi">
                            </div>
                            <div class="mb-3 mt-3 mx-4">
                                <label for="">Foto</label>
                                <input type="text" class="form-control" name="foto"  placeholder="Input Foto">
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