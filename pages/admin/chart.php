<?php
include "../header/config.php";
include "../header/header.php";

$current_page = basename($_SERVER['PHP_SELF']);

$query = mysqli_query($koneksi, "SELECT tbl_calon_ketua_osis.nama_calon, COUNT(tbl_voting.id_calon) AS jumlah
FROM tbl_calon_ketua_osis INNER JOIN tbl_voting
on tbl_voting.id_calon=tbl_calon_ketua_osis.id_calon
GROUP BY tbl_voting.id_calon");

foreach($query as $row){
    $nama_calon[] = $row['nama_calon'];
    $jumlah[] = $row['jumlah'];
}





?>

<h3 align="center"> Grafik Perolehan Suara Ketua Osis </h3>

<h5 align="center"> SMK Pesat IT XPro</h5>



<div class="container-fluid py-4">
    <div class="card log-12">
<div>
  <canvas id="myChart" height="100"></canvas>
</div>




<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<script>



const nama = <?=  json_encode($nama_calon); ?>;

const jumlah = <?=  json_encode($jumlah); ?>;


const ctx = document.getElementById('myChart');

  new Chart(ctx, {
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
</script>
</div>
</div>