<?php
	require('require.php');
	require('fpdf/fpdf.php');
	$pdf = new FPDF();
	//var_dump(get_class_methods($pdf));
	
	$pdf->SetTitle("LTN Events - Reviews");
	$pdf->AddPage("L", "Legal");
	$pdf->Image('../images/ltneventssmall.jpg',153,10,50,23);
	$pdf->SetFont("Arial","","10");
	$pdf->Cell(0,30,"",0,1,"C");	 
	$pdf->Cell(0,6,"Unit 19H, 2nd Floor Big Ben Complex, JP Laurel Highway,",0,1,"C");
	$pdf->Cell(0,7,"Mataas na Lupa, Lipa, 4217 Batangas",0,1,"C");
	$pdf->Cell(0,6,"Phone: (043) 740 7112",0,1,"C");
	$pdf->Cell(0,0,"",1,1,"C");
	$pdf->SetFont("Arial","B","20");
	$pdf->Cell(0,20,"REVIEWS",0,1,"C");
	$pdf->SetFont("Arial","B","12");
	$pdf->Cell(75,10,"User",1,0,"C");
	$pdf->Cell(220,10,"Content",1,0,"C");
	$pdf->Cell(40,10,"Cluster",1,1,"C");
	$pdf->SetFont("Arial","","9");
	$q = mysqli_query($con,"select * from tblcomments fldID");
	while($qf = mysqli_fetch_array($q))
	{
		$goodArr = array(16);
	$gSize = count($goodArr);
	$gMean = 0;
	$gSum = 0;
	for($i = 0; $i < $gSize; $i++)
	{
		$gSum = $gSum + $goodArr[$i];
	}
	$good = $gSum / $gSize;



	$badArr = array(10);
	$bSize = count($badArr);
	$bMean = 0;
	$bSum = 0;
	for($i = 0; $i < $gSize; $i++)
	{
		$bSum = $bSum + $badArr[$i];
	}
	$bad = $bSum / $bSize;


	
	$q = mysqli_query($con,"select * from tblcomments");
	while($qf = mysqli_fetch_array($q))
	{	
		$user = $qf['fldUser'];
		$pts = 0;
		$text = $qf['fldContent'];
		$condi = "";
		//word count worth 5 pts
		$strcount = str_word_count($text);
		if($strcount >= 30)
			$pts = $pts + 5;

		//contains good words
		$file = fopen('ref.txt', 'r');
		while($line = fgets($file))
		{
			if (strpos(strtolower($text), strtolower(trim($line))) !== false) {
			    $pts = $pts + 3;
			}
		}


		//contains bad words
		$ctrBad = 0;
		$file = fopen('ref2.txt', 'r');
		while($line = fgets($file))
		{
			if (strpos(strtolower($text), strtolower(trim($line))) !== false) {
			    $pts = $pts -2;
			    $ctrBad = $ctrBad + 1;
			}
		}

		//bonus 10 pts if no bad word
		if($ctrBad == 0)
			$pts = $pts + 10;


		//if current pts > current good MEAN
		//calculate new MEAN by adding new pts to the array of good reviews pts
		if($pts >= $good)
		{
			array_push($goodArr, $pts);
			$gSize = count($goodArr);
			$gSum = 0;
			for($i = 0; $i < $gSize; $i++)
			{
				$gSum = $gSum + $goodArr[$i];
			}
			$good = $gSum / $gSize;
			$condi = "good";
		}

		//if current pts > current bad MEAN
		//calculate new MEAN by adding new pts to the array of bad reviews pts
		else if($pts <= $bad)
		{
			array_push($badArr, $pts);
			$bSize = count($badArr);
			$bSum = 0;
			for($i = 0; $i < $bSize; $i++)
			{
				$bSum = $bSum + $badArr[$i];
			}
			$bad = $bSum / $bSize;
			$condi = "bad";
		}


		//if current pts is in between
		//determine which cluster has a closer value
		else
		{
			$gDiff = abs($good - $pts);
			$bDiff = abs($bad - $pts);
			if($gDiff <= $bDiff)
			{
				array_push($goodArr, $pts);
				$gSize = count($goodArr);
				$gSum = 0;
				for($i = 0; $i < $gSize; $i++)
				{
					$gSum = $gSum + $goodArr[$i];
				}
				$good = $gSum / $gSize;
				$condi = "good";
			}
			else
			{
				array_push($badArr, $pts);
				$bSize = count($badArr);
				$bSum = 0;
				for($i = 0; $i < $bSize; $i++)
				{
					$bSum = $bSum + $badArr[$i];
				}
				$bad = $bSum / $bSize;
				$condi = "bad";
			}
		}

		$pdf->Cell(75,10,$user,1,0,"C");
		$pdf->Cell(220,10,substr($text, 0, 150),1,0,"C");
		$pdf->Cell(40,10,$condi,1,1,"C");
	}
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