<?php
include "../header/header.php";
include "../header/config.php";

$current_page = basename($_SERVER['PHP_SELF']);
// $current_page = siswa.php

// $_SERVER['PHP_SELF'] ini adalah variabel bawaan PHP yang berisi alamat file yang sedang dibuka.
// basename() adalah fungsi PHP untuk mengambil nama file saja dari sebuah path.
// ambil alamat file sekarang ke ambil name filenya saja.

?>


<body>
<div class="container-fluid py-4">
 <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data Siswa</h6>
            </div>
            
            <div class="card-body px-0 pt-0 pb-2"><a href="tambah_siswa.php">
                <button class="btn btn-primary w-15 mx-3 mt-3">
                            Tambah Data
                            </button> 
</div>
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">No</th>
                      <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Nama</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kelas</th>
                      <th class=" text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 " >Jurusan</th>
                       <th class=" text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 " >alamat</th>
                        <th class=" text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 " >foto</th>
                        <th class=" text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ms-3" >Actions</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
<tr>

                     <?php
                     $no=1;
                  $query = mysqli_query($koneksi, "select * from tbl_siswa");
                  foreach($query as $data): 

                  
                  
                  ?>
                  <td >
                    <div class="text-center ">
                    <?= $no++ ?>
                  </div>
                  </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../../assets<?= $data['foto']?>" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $data['nama']?></h6>
                            <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center pe-3"><?= $data['kelas']?></p>
                       
                      </td>
                      <td class="align-middle text-center text-sm ">
                        <span class="font-weight-bold text-secondary text-xs  "><?= $data['jurusan']?></span>
                      </td>
                      <td class="align-middle  text-center text-sm ">
                        <span class="text-secondary text-xs font-weight-bold " ><?= $data['alamat']?></span>
                      </td>
                       <td class="align-middle  text-center text-sm ">
                        <span class="text-secondary text-xs font-weight-bold " ><?= $data['foto']?></span>
                      </td>
                      <td class="text-center "> 
                        <a href="edit_siswa.php?id=<?=$data['id_siswa'];?>"  class="text-secondary font-weight-bold text-xs text-white" data-toggle="tooltip" data-original-title="Edit siswa">
                          <button class="btn  btn-primary w-45 ">
                        Edit
                          </button>
                  </a>
                   <!-- <a href="delete_siswa.php?id class="text-secondary font-weight-bold text-xs text-white" data-toggle="tooltip" data-original-title="Edit user">
                      <button class="btn btn-danger ">
                        Delete
                        </button>
                  </a> -->
                    <a href="#" class="text-secondary font-weight-bold text-xs text-white" onclick="hapusSiswa(<?= $data['id_siswa'] ?>)" data-toggle="tooltip" data-original-title="Edit user">
                      <button class="btn btn-warning ">
                        Delete
                        </button>
                  </a>
                      </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                    
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

</div>
   <script>
    function hapusSiswa(id_siswa){
    Swal.fire({
  title: "Apakah Anda Yakin ?",
  text: "Data siswa akan di hapus permanen!",
  showDenyButton: true,
  // showCancelButton: true,
  confirmButtonText: "Ya, Hapus",
  cancelButtonText: 'Batal',
  // denyButtonText: `Don't save`
}).then((result) => {
  if (result.isConfirmed) {
    window.location = 'delete_siswa.php?id= ' + id_siswa;
    Swal.fire("Data Terhapus", "", "success");
  } else if (result.isDenied) {
    Swal.fire("Changes are not saved", "", "info");
  }
});
 }
   </script>              
</body>