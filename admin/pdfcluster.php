<?php
	require('require.php');
	function haversineGreatCircleDistance($lat2, $long2)
	{
	  $earthRadius = 6371;
	  // convert from degrees to radians
	  $lat1 = 13.941969871521;
	  $long1 = 121.152168273926;



	  $latFrom = deg2rad($lat1);
	  $lonFrom = deg2rad($long1);

	  $latTo = deg2rad($lat2);
	  $lonTo = deg2rad($long2);

	  $latDelta = $latTo - $latFrom;
	  $lonDelta = $lonTo - $lonFrom;

	  $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
	    cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
	  return round($angle * $earthRadius,2);
	}

	require('fpdf/fpdf.php');
	$pdf = new FPDF();
	//var_dump(get_class_methods($pdf));
	
	$pdf->SetTitle("LTN Events - Clustering");
	$pdf->AddPage("L", "Legal");
	$pdf->Image('../images/ltneventssmall.jpg',153,10,50,23);
	$pdf->SetFont("Arial","","10");
	$pdf->Cell(0,30,"",0,1,"C");	 
	$pdf->Cell(0,6,"Unit 19H, 2nd Floor Big Ben Complex, JP Laurel Highway,",0,1,"C");
	$pdf->Cell(0,7,"Mataas na Lupa, Lipa, 4217 Batangas",0,1,"C");
	$pdf->Cell(0,6,"Phone: (043) 740 7112",0,1,"C");
	$pdf->Cell(0,0,"",1,1,"C");
	$pdf->SetFont("Arial","B","20");
	$pdf->Cell(0,20,"Clusters",0,1,"C");
	$pdf->SetFont("Arial","B","12");
	$pdf->Cell(60,10,"User",1,0,"C");
	$pdf->Cell(185,10,"Address",1,0,"C");
	$pdf->Cell(30,10,"Type",1,0,"C");
	$pdf->Cell(30,10,"Distance",1,0,"C");
	$pdf->Cell(30,10,"Cluster",1,1,"C");
	$pdf->SetFont("Arial","","9");
	$q = mysqli_query($con,'select concat(U.fldFirstName, " ", U.fldLastName) as fldName, U.fldAddress, "Client" as fldType from tblusers U where fldPosition = 					"Client"
							UNION
							select I.fldName, I.fldAddress, "Inquiry" as fldType from tblinquiry I order by fldName');
	while($qf = mysqli_fetch_array($q))
	{
		$name = $qf['fldName'];
		$addressOrig = $qf['fldAddress'];
		if($addressOrig == "")
		{
			continue;
		}
		$type = $qf['fldType'];
		$addressOrig = trim($addressOrig);
		$address = str_replace(" ", "%20", $addressOrig);
		$baseURL = "http://dev.virtualearth.net/REST/v1/Locations";
		$key = "AiqXC9CIpC6D-IG7cD9klrCQ-GjgoBiv9wvhImdhmqZ1IHwUk6whN4-o4P3sVIQG";			
		$findURL = $baseURL."/".$address."?output=xml&key=".$key;
		$output = file_get_contents($findURL);
	    $response = new SimpleXMLElement($output);
	    $latitude = $response->ResourceSets->ResourceSet->Resources->Location->Point->Latitude;
		$longitude = $response->ResourceSets->ResourceSet->Resources->Location->Point->Longitude;
		$latitude = "" . $latitude;
		$longitude = "" . $longitude;
		$distance = haversineGreatCircleDistance($latitude, $longitude);
		$cluster = "";
		if($distance<=5)
			$cluster = "1";
		else if($distance <= 10)
			$cluster = "2";
		else if ($distance <= 15)
			$cluster = "3";
		else if ($distance <= 20)
			$cluster = "4";
		else
		    $cluster = "5";




		$pdf->Cell(60,10,$name,1,0,"C");
		$pdf->Cell(185,10,$addressOrig,1,0,"C");
		$pdf->Cell(30,10,$type,1,0,"C");
		$pdf->Cell(30,10,$distance . " km",1,0,"C");
		$pdf->Cell(30,10,"Cluster ". $cluster,1,1,"C");
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