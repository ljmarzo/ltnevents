<?php
	$id = $_REQUEST['client'];
	$q = mysqli_query($con,"update tblusers set fldArchive = 'yes' where fldID = '$id'");
	if($q)
	{
		echo "<script>alert('Client record deleted!');window.location='?p=client';</script>";
	}

?>