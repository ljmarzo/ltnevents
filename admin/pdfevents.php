<?php
	require('require.php');
	require('fpdf/fpdf.php');
	$pdf = new FPDF();
	//var_dump(get_class_methods($pdf));
	
	$pdf->SetTitle("LTN Events - Events Report");
	$pdf->AddPage("L", "Legal");
	$pdf->Image('../images/ltneventssmall.jpg',153,10,50,23);
	$pdf->SetFont("Arial","","10");
	$pdf->Cell(0,30,"",0,1,"C");	 
	$pdf->Cell(0,6,"Unit 19H, 2nd Floor Big Ben Complex, JP Laurel Highway,",0,1,"C");
	$pdf->Cell(0,7,"Mataas na Lupa, Lipa, 4217 Batangas",0,1,"C");
	$pdf->Cell(0,6,"Phone: (043) 740 7112",0,1,"C");
	$pdf->Cell(0,0,"",1,1,"C");
	$pdf->SetFont("Arial","B","20");
	$pdf->Cell(0,20,"EVENTS REPORT",0,1,"C");
	$pdf->SetFont("Arial","B","12");
	$pdf->Cell(80,10,"Event Name",1,0,"C");
	$pdf->Cell(45,10,"Category",1,0,"C");
	$pdf->Cell(100,10,"Venue",1,0,"C");
	$pdf->Cell(50,10,"Date & Time",1,0,"C");
	$pdf->Cell(60,10,"Client",1,1,"C");
	$pdf->SetFont("Arial","","9");
	$q = mysqli_query($con,"select * from tblevents order by fldEventID DESC");
	while($qf = mysqli_fetch_array($q))
	{
		$eventName = $qf['fldEventName'];
		$eventCategory = $qf['fldEventType'];
		$eventVenue = $qf['fldEventVenue'];
		$dateTime = $qf['fldEventDateTime'];
		$clientName = $qf['fldClient'];
		
		$pdf->Cell(80,10,$eventName,1,0,"C");
		$pdf->Cell(45,10,$eventCategory,1,0,"C");
		$pdf->Cell(100,10,$eventVenue,1,0,"C");
		$pdf->Cell(50,10,$dateTime,1,0,"C");
		$pdf->Cell(60,10,$clientName,1,1,"C");
	}
	
	
	$pdf->SetFont("Arial","","15");
	$pdf->Cell(0,8,"",0,1,"L");
	$pdf->Cell(0,8,"Report Generation Date: ". date("Y-m-d"),0,1,"L");
	$pdf->Output();
?>
<html>
<head>
	<title>STI-LIPA</title>
</head>
</html>