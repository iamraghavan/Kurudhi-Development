<?php
include('../php/config.php');

$query = mysqli_query($conn, "SELECT * FROM tbl_registration INNER JOIN tbl_user on user_id = '$_SESSION[id]'");
$mysql_data = mysqli_fetch_array($query);


if(isset($_POST['generate_pdf'])){

    require('./fpdf/fpdf.php');

    class PDF extends FPDF {
        function Header() {
            $this->Image('https://firebasestorage.googleapis.com/v0/b/kurudhiweb.appspot.com/o/Assets%2Fkurudhi.png?alt=media&token=36c998ed-264c-42f2-84ef-f28e08f7d7dd',10,6,30);
            $this->SetFont('Arial', 'B', 15);
            $this->Cell(80);
            $this->Cell(30, 10, 'Title', 1, 0, 'C');
            $this->Ln(20);
        }
    }

    $pdf = new FPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 10);

    $pdf->Cell(40, 10, ''. $mysql_data['Name'] .'');
    $pdf->Ln(4);
    $pdf->Cell(40, 10, ''. $mysql_data['Name'] .'');
    $pdf->Ln(4);
    $pdf->Cell(40, 10, ''. $mysql_data['Name'] .'');
    $pdf->Ln(4);
    $pdf->Cell(40, 10, ''. $mysql_data['Name'] .'');
    $pdf->Ln(4);
    $pdf->Cell(40, 10, ''. $mysql_data['Name'] .'');
    $pdf->Ln(4);
    $pdf->Cell(40, 10, ''. $mysql_data['Name'] .'');
    $pdf->Ln(4);
    $pdf->Cell(40, 10, ''. $mysql_data['Name'] .'');
    $pdf->Ln(4);
    $pdf->Cell(40, 10, ''. $mysql_data['Name'] .'');
    $pdf->Ln(4);
    $pdf->Cell(40, 10, ''. $mysql_data['Name'] .'');
    $pdf->Ln(8);
    $pdf->Cell(40, 10, ''. $mysql_data['Name'] .'');
    $pdf->Ln(4);
    $pdf->Cell(40, 10, ''. $mysql_data['Name'] .'');
    $pdf->Ln(8);
    $pdf->Cell(40, 10, ''. $mysql_data['Name'] .'');
    $pdf->Ln(4);
    $pdf->Cell(40, 10, ''. $mysql_data['Name'] .'');
    $pdf->Ln(8);
    $pdf->Cell(40, 10, ''. $mysql_data['Name'] .',');
    $pdf->Ln(4);


    // $pdf->Cell(40, 10, 'We look forward to hearing from you in the near future.');
    // $pdf->Ln(8);
    // $pdf->Cell(40, 10, 'With best wishes,');
    // $pdf->Ln(4);
    // $pdf->Cell(40, 10, 'Business Ltd.');

    $pdf->Output();

}
?>