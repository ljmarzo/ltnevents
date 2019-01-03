<?php
	$TLID = $_REQUEST['TLID'];
	$eventID = $_REQUEST['eventID'];
	$q = mysqli_query($con,"delete from tbltimeline where fldTLID = '$TLID'");
	$q = mysqli_query($con,"delete from tbltimelinepic where fldTimelineID = '$TLID'");
	if($q)
	{
		echo "<script>alert('Timeline entry deleted!');window.location='?p=timeline&eventID=$eventID';</script>";
	}

?>