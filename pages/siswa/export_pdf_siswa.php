<?php
require_once('../../TCPDF/tcpdf.php');
include "../header/config.php";

//ambil gambar chart
$chartImage = $_POST['chart_image'] ?? '';

//query data
$query = mysqli_query($koneksi, "SELECT * FROM `tbl_siswa`;");

//buat PDF
$pdf = new TCPDF();
$pdf->AddPage();

//tanggal
$tanggal = date('d-m-Y');

//========== HEADER ==========
$html = ' <h1> Laporan Data Siswa </h1> ';


//========== TABEL ===========
$html .= '
<table border="1" cellpadding="5">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Alamat</th>
           
        </tr>
    </thead>
    <tbody>';

$no = 1;
foreach($query as $row){
    $html .= '<tr>
                <td>'. $no++ .'</td>
                <td>'. $row['nama'] .'</td>
                <td>'. $row['kelas'] .'</td>
                <td>'. $row['jurusan'] .'</td>
                <td>'. $row['alamat'] .'</td>
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

