<?php
	$revID = $_REQUEST['revID'];
	$q = mysqli_query($con,"delete from tblcomments where fldComID = '$revID'");
	if($q)
	{
		echo "<script>alert('Review deleted!');window.location='?p=reviews';</script>";
	}

?>