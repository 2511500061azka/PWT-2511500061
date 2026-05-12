<?php
require 'vendor/autoload.php';
include 'config/koneksi.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$hasil = mysqli_query($koneksi, "SELECT * FROM jadwal_kelas");
$data  = mysqli_fetch_array($hasil);

$query = mysqli_query($koneksi, "SELECT * FROM jadwal_kelas
    JOIN detail_jadwal ON jadwal_kelas.Id_jadwal = detail_jadwal.Id_jadwal
    JOIN mapel ON mapel.Kd_mapel = detail_jadwal.Kd_mapel
    JOIN guru ON guru.Kd_guru = detail_jadwal.Kd_guru");
    
    $html = '
    <h2>Detail Jadwal</h2>
    <table>
    <tr>
        <td>Tahun Ajaran</td>
        <td>:</td>
        <td>' . $data['Thn_ajaran'] . '</td>
    </tr>
    <tr>
        <td>Semester</td>
        <td>:</td>
        <td>' . $data['Semester'] . '</td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td>:</td>
        <td>' . $data['Kelas'] . '</td>
    </tr>
</table>

<br>
<strong>DETAIL JADWAL KELAS</strong>

<table border="1" width="100%" cellpadding="5" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Kd Mapel</th>
        <th>Nama Mapel</th>
        <th>Nama Guru</th>
        <th>Hari</th>
        <th>Jam</th>
    </tr>
';

$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $html .= '
    <tr>
        <td>' . $no++ . '</td>
        <td>' . $row['Kd_mapel'] . '</td>
        <td>' . $row['Nm_mapel'] . '</td>
        <td>' . $row['Nm_guru'] . '</td>
        <td>' . $row['Hari'] . '</td>
        <td>' . $row['Jam_mulai'] . ' - ' . $row['Jam_selesai'] . '</td>
    </tr>
    ';
}

$html .= '</table>';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("jadwal.pdf", array("Attachment" => false));