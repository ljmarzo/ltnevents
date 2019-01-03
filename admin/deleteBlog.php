<?php
	$blogID = $_REQUEST['blogID'];
	$q = mysqli_query($con,"delete from tblblog where fldBlogID = '$blogID'");
	$q = mysqli_query($con,"delete from tblblogpic where fldBlogID = '$blogID'");
	if($q)
	{
		echo "<script>alert('Blog entry deleted!');window.location='?p=dashboard';</script>";
	}

?>