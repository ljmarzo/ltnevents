<?php
	$time = date("Y-m-d H:i:s");
	$q = mysqli_query($con,"update tblusers set fldLastLog = '$time', fldOnline = '0' where fldID = '$id'");
	session_destroy();
	echo "<script>alert('Successfully logged out!');window.location='login.php'</script>";
?>