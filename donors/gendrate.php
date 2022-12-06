<?php
session_start();
include('../php/config.php');

$query = mysqli_query($conn, "SELECT * FROM tbl_registration INNER JOIN tbl_user on user_id = '$_SESSION[id]'");
$mysql_data = mysqli_fetch_array($query);


if(isset($_POST['generate_pdf'])){

    require('./fpdf/fpdf.php');

  
  class PDF extends FPDF
  {
    
    function Header(){
        include('../php/config.php');
      //Display Company Info
      $this->SetFont('Arial','B',14);
      $this->Cell(50,10,"KURUDHI - PROFILE",0,1);
      $this->SetFont('Arial','',12);
      $this->Cell(50,7,"DONTATE BLOOD - SAVE LIFE",0,1);

      
      //Display INVOICE text
      $this->SetY(15);
      $this->SetX(-40);
      $this->Image("pdf-footer.jpg",120,10,80,20,"JPG");

      
      //Display Horizontal line
      $this->Line(0,37,210,37);
    }
    
    function body() {
        include('../php/config.php');

            $query = mysqli_query($conn, "SELECT * FROM tbl_registration INNER JOIN tbl_user on user_id = '$_SESSION[id]'");
            $mysql_data = mysqli_fetch_array($query);



        $this->SetY(50);
        $this->SetX(10);
        $this->SetFont('Helvetica','B',18);
        $this->Cell(0,9,"General Information",0,1);
        $this->Ln(4);
        $this->SetFont('Arial','',12);
        $this->Cell(0,9,'NAME : '. $mysql_data['Name'] .'',0,1);
        $this->Cell(0,9,'GENDER : '. $mysql_data['Sex'] .'',0,1);
        $this->Cell(0,9,'AGE : '. $mysql_data['Age'] .'',0,1);
        $this->Cell(0,9,'EMAIL : '. $mysql_data['Email'] .'',0,1);
        $this->Cell(0,9,'CONTACT NUMBER  : '. $mysql_data['ContactNumber'] .'',0,1);
        $this->Cell(0,9,'WHATSAPP NUMBER : '. $mysql_data['WhatsappNumber'] .'',0,1);


        $this->SetY(130);
        $this->SetX(10);
        $this->SetFont('Helvetica','B',18);
        $this->Cell(0,9,"Location Information",0,1);
        $this->Ln(4);
        $this->SetFont('Arial','',12);
        $this->Cell(0,9,'ADDRESS : '. $mysql_data['Address'] .'',0,3);
        $this->Cell(0,9,'COUNTRY : '. $mysql_data['Country'] .'',0,1);
        $this->Cell(0,9,'STATE : '. $mysql_data['State'] .'',0,1);
        $this->Cell(0,9,'CITY : '. $mysql_data['City'] .'',0,1);


        $this->SetY(190);
        $this->SetX(10);
        $this->SetFont('Helvetica','B',18);
        $this->Cell(0,9,"Blood Information",0,1);
        $this->Ln(4);
        $this->SetFont('Arial','',12);
        $this->Cell(0,9,'BLOOD GROUP : '. $mysql_data['BloodType'] .'',0,1);
        $this->Cell(0,9,'WEIGHT : '. $mysql_data['WeightKG'] .'',0,1);
        $this->Cell(0,9,'DATE OF BIRTH : '. $mysql_data['DOB'] .'',0,1);
        $this->Cell(0,9,'DATE OF LAST BLOOD DONATE : '. $mysql_data['DOLBD'] .'',0,1);


    }
    

    function Footer(){
      
      //set footer position
      $this->SetY(-30);
    //   $this->SetFont('Arial','B',12);
    $this->SetTextColor(194,8,8);
      $this->SetFont('Arial','B',14);
      $this->Cell(50,10,"KURUDHI - TEAM",0,1);
      $this->SetFont('Arial','',14);
      $this->Cell(50,7,"A single drop of blood can make a huge difference",0,1);
      

      
    }
    
  }





  //Create A4 Page with Portrait 
  $pdf=new PDF("P","mm","A4");
  $pdf->AddPage();
    $pdf->body();
  $pdf->Output();

}
?>