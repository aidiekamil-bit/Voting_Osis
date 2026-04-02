<?php
include "../header/config.php";
include "../header/header.php";

$current_page = basename($_SERVER['PHP_SELF']);

$query = mysqli_query($koneksi, "SELECT tbl_calon_ketua_osis.nama_calon, tbl_calon_ketua_osis.foto, COUNT(tbl_voting.id_calon) AS jumlah
FROM tbl_calon_ketua_osis INNER JOIN tbl_voting
on tbl_voting.id_calon=tbl_calon_ketua_osis.id_calon
GROUP BY tbl_voting.id_calon");

foreach($query as $row){
    $nama_calon[] = $row['nama_calon'];
    $jumlah[] = $row['jumlah'];
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
  <div class="container-fluid py-4 ">
    <div class="card log-12 pt-5">
      <div id="areaPDF">
        <h3 align="center"> Grafik Perolehan Suara Ketua Osis </h3>

<h5 align="center"> SMK Pesat IT XPro</h5>

<div>
  <canvas id="myChart" height="100"></canvas>
</div>




<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

const nama = <?=  json_encode($nama_calon); ?>;

const jumlah = <?=  json_encode($jumlah); ?>;


const ctx = document.getElementById('myChart');

 const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: nama,
      datasets: [{
        label: '# Voting', 
        data: jumlah,
       backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  function exportPDF(){
    document.getElementById('chart_image').value = myChart.
    toBase64Image();
  }
</script>
<div class="row">
        <?php foreach ($query as $row): ?>
        <div class="col-md-4 text-center d-flex justify-content-center mt-3 mb-3">
            <img src="../../assets<?= $row['foto']; ?>" style="width:200px; height:200px; border-radius:5%;">
            
        </div>
        <?php endforeach; ?>
    </div>
<body>
<div class="container-fluid py-4">
 <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data Calon Ketua Osis</h6>
            <form action="export_pdf.php" method="POST" target="_blank">
              <input type="hidden" name="chart_image" id="chart_image">
              <button type="submit" onclick="exportPDF()" class="btn btn-danger mt-2">
                Export PDF
              </button>
            </form>

            </div>
            
            
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">No</th>
                      <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Nama Calon</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Perolehan Poin</th>
                     
                      
                    </tr>
                  </thead>
                  <tbody>
<tr>

                     <?php
                     $no=1;
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
                            <h6 class="mb-0 text-sm"><?= $data['nama_calon']?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center pe-3"><?= $data['jumlah']?></p>
                       
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


   
</body>
    </div>
</div>
</div>

</div>

</body>
</html>


  



