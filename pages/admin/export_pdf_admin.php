<?php
require_once('../../TCPDF/tcpdf.php');
include "../header/config.php";

//ambil gambar chart
$chartImage = $_POST['chart_image'] ?? '';

//query data
$query = mysqli_query($koneksi, "SELECT * FROM `tbl_admin`;");

//buat PDF
$pdf = new TCPDF();
$pdf->AddPage();

//tanggal
$tanggal = date('d-m-Y');

//========== HEADER ==========
$html = ' <h1> Laporan Data Admin </h1> ';


//========== TABEL ===========
$html .= '
<table border="1" cellpadding="5">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Nama </th>
           
           
        </tr>
    </thead>
    <tbody>';

$no = 1;
foreach($query as $row){
    $html .= '<tr>
                <td>'. $no++ .'</td>
                <td>'. $row['username'] .'</td>
                <td>'. $row['password'] .'</td>
                <td>'. $row['nama'] .'</td>

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

