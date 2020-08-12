<?php

$servername    = "localhost";
$username    = "root";
$password    = "";
$dbname        = "tugas14";

$conn  = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection Failed: " . mysqli_connect_error());
}
require('fpdf.php');
$pdf = new FPDF('l', 'mm', 'A5');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 7, 'Data Diri Mahasiswa UMHT', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(190, 7, "Jl.Keramatjati Jakarta Timur", 0, 1, 'C');
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 6, 'NO', 1, 0);
$pdf->Cell(50, 6, 'NAMA', 1, 0);
$pdf->Cell(35, 6, 'ktp', 1, 0);
$pdf->Cell(30, 6, 'Tempat Lahir', 1, 0);
$pdf->Cell(25, 6, 'Tanggal Lahir', 1, 0);
$pdf->Cell(25, 6, 'Alamat', 1, 0);
$pdf->Cell(25, 6, 'Telepon', 1, 0);
$pdf->Cell(25, 6, 'Email', 1, 1);
$pdf->SetFont('Arial', '', 10);
$query = mysqli_query($conn, "SELECT * FROM user");
while ($row = mysqli_fetch_array($query)) {
  $pdf->Cell(10, 6, $row['id'], 1, 0);
  $pdf->Cell(50, 6, $row['nama'], 1, 0);
  $pdf->Cell(35, 6, $row['ktp'], 1, 0);
  $pdf->Cell(30, 6, $row['tempat_lahir'], 1, 0);
  $pdf->Cell(25, 6, $row['tgl_lahir'], 1, 0);
  $pdf->Cell(25, 6, $row['alamat'], 1, 0);
  $pdf->Cell(25, 6, $row['telepon'], 1, 0);
  $pdf->Cell(25, 6, $row['email'], 1, 1);
}
$pdf->Output();
?>