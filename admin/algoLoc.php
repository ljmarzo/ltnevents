<?php
	function getClosest($search, $arr) {
	   $closest = null;
	   if($search > (60 - $arr[3]))
	   	return "c5";
	   foreach ($arr as $item) {
	      if ($closest === null || abs($search - $closest) > abs($item - $search)) {
	         $closest = $item;
	      }
	   }
	   return $closest;
	}

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


	$c1Arr = array(5);
	$c1Size = count($c1Arr);
	$c1Sum = 0;
	for($i = 0; $i < $c1Size; $i++)
	{
		$c1Sum = $c1Sum + $c1Arr[$i];
	}
	$c1 = round($c1Sum / $c1Size,2);


	$c2Arr = array(15);
	$c2Size = count($c2Arr);
	$c2Sum = 0;
	for($i = 0; $i < $c2Size; $i++)
	{
		$c2Sum = $c2Sum + $c2Arr[$i];
	}
	$c2 = round($c2Sum / $c2Size,2);


	$c3Arr = array(25);
	$c3Size = count($c3Arr);
	$c3Sum = 0;
	for($i = 0; $i < $c3Size; $i++)
	{
		$c3Sum = $c3Sum + $c3Arr[$i];
	}
	$c3 = round($c3Sum / $c3Size,2);


	$c4Arr = array(35);
	$c4Size = count($c4Arr);
	$c4Sum = 0;
	for($i = 0; $i < $c4Size; $i++)
	{
		$c4Sum = $c4Sum + $c4Arr[$i];
	}
	$c4 = round($c4Sum / $c4Size,2);

		
	


	$q = mysqli_query($con,'select concat(U.fldFirstName, " ", U.fldLastName) as fldName, U.fldAddress, "Client" as fldType from tblusers U where fldPosition = 					"Client"
							UNION
							select I.fldName, I.fldAddress, "Inquiry" as fldType from tblinquiry I order by fldName');
	while($qf = mysqli_fetch_array($q))
	{
		$name = $qf['fldName'];
		$addressOrig = $qf['fldAddress'];
		        echo "Address : " . $addressOrig . "<br>";
		$distance = 0;
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
		

		echo "Current Cluster 1 rating : " . $c1;
		echo "<br>";
		echo "Current Cluster 2 rating : " . $c2;
		echo "<br>";
		echo "Current Cluster 3 rating : " . $c3;
		echo "<br>";
		echo "Current Cluster 4 rating : " . $c4;
		echo "<br>";
		echo "Address : ";
		echo $addressOrig . "<br>";

		$c1Temp = $c1;
		$c2Temp = $c2;
		$c3Temp = $c3;
		$c4Temp = $c4;

		$cluster = "";
		$searchArr = array($c1, $c2, $c3, $c4);
		$closest = getClosest($distance, $searchArr);

		


		if($closest == $c1)
		{
			array_push($c1Arr, $distance);
			$c1Size = count($c1Arr);
			$c1Sum = 0;
			for($i = 0; $i < $c1Size; $i++)
			{
				$c1Sum = $c1Sum + $c1Arr[$i];
			}
			
			$c1 = round($c1Sum / $c1Size,2);
			$cluster = "1";
		}

		else if($closest == $c2)
		{
			array_push($c2Arr, $distance);
			$c2Size = count($c2Arr);
			$c2Sum = 0;
			for($i = 0; $i < $c2Size; $i++)
			{
				$c2Sum = $c2Sum + $c2Arr[$i];
			}
			
			$c2 = round($c2Sum / $c2Size,2);
			$cluster = "2";
		}
		else if($closest ==$c3)
		{
			array_push($c3Arr, $distance);
			$c3Size = count($c3Arr);
			$c3Sum = 0;
			for($i = 0; $i < $c3Size; $i++)
			{
				$c3Sum = round($c3Sum + $c3Arr[$i],2);
			}
			
			$c3 = $c3Sum / $c3Size;
			$cluster = "3";
		}
		else if($closest == $c4)
		{
			array_push($c4Arr, $distance);
			$c4Size = count($c4Arr);
			$c4Sum = 0;
			for($i = 0; $i < $c4Size; $i++)
			{
				$c4Sum = round($c4Sum + $c4Arr[$i],2);
			}
			
			$c4 = $c4Sum / $c4Size;
			$cluster = "4";
		}
		else
		{
			$cluster = "5";
		}

		echo "Distance: " . $distance . " km<br>";
		echo "Cluster : " . $cluster . "<br>";
		if($cluster == '1')
			echo "New c1 rating : ($c1Temp + $distance) / $c1Size = [$c1]<br>";
		if($cluster == '2')
			echo "New c2 rating : ($c2Temp + $distance) / $c2Size = [$c2]<br>";
		if($cluster == '3')
			echo "New c3 rating : ($c3Temp + $distance) / $c3Size = [$c3]<br>";
		if($cluster == '4')
			echo "New c4 rating : ($c4Temp + $distance) / $c4Size = [$c4]<br>";
		echo "<br><br><br><br>";
	}

?>