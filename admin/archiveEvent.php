<?php
	$eventID = $_REQUEST['eventID'];
	$q = mysqli_query($con,"update tblevents set fldStatus = 'Archive' where fldEventID = '$eventID'");
	if($q)
	{
		echo "<script>alert('Event record deleted!');window.location='?p=events';</script>";
	}

?>