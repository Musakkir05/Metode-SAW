<?php
require_once('connect/conn.php');
require_once('assets/vendor/tecnickcom/tcpdf/tcpdf.php');
$pdf = new TCPDF('P', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(200, 5, 'LAPORAN MAHASISWA BERPOTENSI DROP OUT', 0, 0, 'C');

$pdf->Cell(10, 15, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
$pdf->Cell(70, 7, 'NAMA', 1, 0, 'C');
$pdf->Cell(25, 7, 'Stambuk', 1, 0, 'C');
$pdf->Cell(28, 7, 'Phone', 1, 0, 'C');
$pdf->Cell(20, 7, 'Nilai', 1, 0, 'C');
$pdf->Cell(35, 7, 'Keterangan', 1, 0, 'C');



$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Times', '', 10);
$no = 1;
$data = mysqli_query($conn, "SELECT * FROM alternatif WHERE nilai >0 ORDER BY nilai DESC");
while ($d = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(70, 6, $d['nama'], 1, 0);
    $pdf->Cell(25, 6, $d['stambuk'], 1, 0);
    $pdf->Cell(28, 6, $d['no_hp'], 1, 0);
    $pdf->Cell(20, 6, $d['nilai'], 1, 0);
    $pdf->Cell(35, 6, $d['ket'], 1, 1);
}

$pdf->Output('Laporan_mahasiswa_do.pdf', 'I');
