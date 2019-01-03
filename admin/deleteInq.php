<?php
	$inqID = $_REQUEST['inqID'];
	$q = mysqli_query($con,"delete from tblinquiry where fldID = '$inqID'");
	if($q)
	{
		echo "<script>alert('Inquiry deleted!');window.location='?p=inquiries';</script>";
	}

?>