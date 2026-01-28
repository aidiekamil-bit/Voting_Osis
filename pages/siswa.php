<?php
include "header.php";
include "config.php";

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
                <button class="btn btn-warning w-20 mx-3 mt-3">
                            Tambah
                            </button> 
</div>
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Nama</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Kelas</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >Jurusan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
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
                    <div class="d-flex px-3 ">
                    <?= $no++ ?>
                  </div>
                  </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $data['nama']?></h6>
                            <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center"><?= $data['kelas']?></p>
                       
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"></span>
                      </td>
                      <td class="align-middle ">
                        <span class="text-secondary text-xs font-weight-bold"><?= $data['jurusan']?></span>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          <?= $data['alamat']?>
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
                 
</body>