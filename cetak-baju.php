<?php
ob_start();
require_once("config/database.php");
require 'vendor/autoload.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$html = '';

$sid = isset($_GET['id']) ? $_GET['id'] : '';
$cid = $sid;
$qedit = "SELECT id_bayar_baju, kd_bayar_baju, tbl_siswa.nama_siswa, tbl_siswa.nama_wali, tbl_pembayaran_baju.id_siswa, jumlah_byr, tgl_bayar, ket, tbl_rombel.id_rombel, 
        tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat  
FROM tbl_pembayaran_baju, tbl_siswa, tbl_rombel ,tbl_kelas, lib_tingkat
WHERE tbl_pembayaran_baju.id_siswa = tbl_siswa.id_siswa AND tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND kd_bayar_baju = '{$cid}'";
$red = mysqli_query($connection, $qedit);
while ($baseng = mysqli_fetch_array($red)) {
    $html .= "".$baseng['id_bayar_baju']."";
}

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('e-rapor siswa.pdf');

ob_end_flush();
?>