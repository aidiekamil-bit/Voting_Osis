<?php
require_once('../../TCPDF/tcpdf.php');
include "../header/config.php";

//ambil gambar chart
$chartImage = $_POST['chart_image'] ?? '';

//query data
$query = mysqli_query($koneksi, "SELECT tbl_calon_ketua_osis.nama_calon, tbl_calon_ketua_osis.foto, COUNT(tbl_voting.id_calon) AS jumlah
FROM tbl_calon_ketua_osis INNER JOIN tbl_voting
on tbl_voting.id_calon=tbl_calon_ketua_osis.id_calon
GROUP BY tbl_voting.id_calon");

//buat PDF
$pdf = new TCPDF();
$pdf->AddPage();

//tanggal
$tanggal = date('d-m-Y');

//========== HEADER ==========
$html = '<h1> Laporan Data Calon Ketua OSIS </h1>';

//========== GRAFIK ==========
if(!empty($chartImage)){
    $html .= '<div>
            <img src= "'. $chartImage .'" width="500">
    </div>';
}

//========== TABEL ===========
$html .= '
<table border="1" cellpadding="5">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th>No</th>
            <th>Nama Calon</th>
            <th>Perolehan Suara</th>
           
        </tr>
    </thead>
    <tbody>';

$no = 1;
foreach($query as $row){
    $html .= '<tr>
                <td>'. $no++ .'</td>
                <td>'. $row['nama_calon'] .'</td>
                <td>'. $row['jumlah'] .'</td>
            </tr>';
}

$html .= '</tbody></table>';

//footer
$html .= '
<br><br>
<table width="100%">
    <tr>
      <td align= "right">
      Dicetak pada : '. $tanggal .'
      </td>
    </tr>
</table>
';
// render
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('laporan_voting.pdf', 'I');

?>

