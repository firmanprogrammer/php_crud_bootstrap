<?php
  require('assets/fpdf181/fpdf.php');

class PDF extends FPDF{
  function Header(){
      $this->Image('assets/img/logo2.png',10,10,40); //JarakKirim,JarakAtas,Size
      $this->SetFont('Arial','B',15);// Arial,bold,15
      $this->Cell(80);// Padding Logo bagian kanan
      $this->Cell(30,10,'BUKU TAMU',0,0,'C'); //paddingKanaKiri, paddingAtasBawah, TitleText, Border, MarginBawah, MaybeCENTER
      $this->Ln(20);// breakLine/spaceBawah
  }

  function Footer(){
      $this->SetY(-15); // Position at 1.5 cm from bottom
      $this->SetFont('Arial','I',8);// Arial italic 8
      $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C'); // Page number
  }
}

  $pdf = new PDF();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  //$pdf->Cell(55,5,'TIME',1,0,'C',0);$pdf->Ln();
  $pdf->Ln();
  include 'config.php';
  $q1 = mysqli_query($koneksi, "SELECT * FROM tb_tamu");
  while($r1 = mysqli_fetch_array($q1)){
    $pdf->SetFont('Arial','I',8);
    $isi = $r1['time'].", ".$r1['nama'].", ".$r1['email'].", ".$r1['url']."\n".$r1['pesan']."\n";
    $pdf->MultiCell(0,5,$isi,1);
  }
  $pdf->Output();

?>
