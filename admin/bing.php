<?php
// api key
// VSVqgzlD0D9WooSehLCBGvJ7zaWvPhun

function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
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

?>

<body>
	<form method="post">
	  <div class="box">
	    <div class="box-header with-border">
	      <h1 class="box-title">Distance Calculator</h1>
	    </div>
	   
	    <!-- /.box-header -->
	    <div class="box-body">
	      
	        <!-- text input -->

	    	<div class="form-group">
	          <label>Address</label>
	         	<textarea required name="addr" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; font-weight: normal; padding: 10px;"></textarea>
	        </div>

	        <input type="submit" name="submit" class="btn btn-success" value="Submit">
	    </div>

	  </div>
	 </form>
	  <!-- /.box -->


	<?php
		if(isset($_POST['submit']))
		{
			//p1.lat = 13.941969871521
			//p1.long = 121.152168273926
			$addressOrig = trim($_POST['addr']);
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

			echo "Place 1 : LTN Events HQ<br>Latitude : 13.941969871521<br>Longitude : 121.152168273926<br>=======================<br>";
			echo "Place 2 : " . $addressOrig . "<br>Latitude : " . $latitude . "<br>Longitude : " . $longitude . "<br>=======================<br>";
			echo "Distance : " .  haversineGreatCircleDistance($latitude, $longitude) . " km";
			
			
		}
		
	?>
</body>


