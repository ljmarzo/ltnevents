<?php
	$id = $_SESSION['id'];
	$z = mysqli_query($con,"update tblusers set fldOnline = '0', fldLastLog = '" . date("Y-m-d H:i:s") . "' where fldID = '$id'");
	session_destroy();
	echo "<script>alert('Successfully logged out!');window.location='index.php'</script>";
?>