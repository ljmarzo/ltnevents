<?php
	require('require.php');
	require('fpdf/fpdf.php');
	$pdf = new FPDF();
	//var_dump(get_class_methods($pdf));
	
	$pdf->SetTitle("LTN Events - Clients Report");
	$pdf->AddPage("L", "Legal");
	$pdf->Image('../images/ltneventssmall.jpg',153,10,50,23);
	$pdf->SetFont("Arial","","10");
	$pdf->Cell(0,30,"",0,1,"C");	 
	$pdf->Cell(0,6,"Unit 19H, 2nd Floor Big Ben Complex, JP Laurel Highway,",0,1,"C");
	$pdf->Cell(0,7,"Mataas na Lupa, Lipa, 4217 Batangas",0,1,"C");
	$pdf->Cell(0,6,"Phone: (043) 740 7112",0,1,"C");
	$pdf->Cell(0,0,"",1,1,"C");
	$pdf->SetFont("Arial","B","20");
	$pdf->Cell(0,20,"CLIENTS REPORT",0,1,"C");
	$pdf->SetFont("Arial","B","12");
	$pdf->Cell(75,10,"Client",1,0,"C");
	$pdf->Cell(95,10,"Address",1,0,"C");
	$pdf->Cell(60,10,"Email",1,0,"C");
	$pdf->Cell(55,10,"Contact #",1,0,"C");
	$pdf->Cell(50,10,"Registration Date",1,1,"C");
	$pdf->SetFont("Arial","","9");
	$q = mysqli_query($con,"select * from tblusers where fldPosition = 'Client' order by fldID");
	while($qf = mysqli_fetch_array($q))
	{
		$client = $qf['fldFirstName'] . " " . $qf['fldLastName'];
		$addr = $qf['fldAddress'];
		$email = $qf['fldEmail'];
		$cont = $qf['fldPhoneNum'];
		$reg = $qf['fldRegDate'];
		$reg = date("m-d-Y", strtotime($reg));
		$pdf->Cell(75,10,$client,1,0,"C");
		$pdf->Cell(95,10,$addr,1,0,"C");
		$pdf->Cell(60,10,$email,1,0,"C");
		$pdf->Cell(55,10,$cont,1,0,"C");
		$pdf->Cell(50,10,$reg,1,1,"C");
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