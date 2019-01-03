<?php
	require('require.php');
	$uname = $_POST['uname'];

		$q = mysqli_query($con,"select * from tblusers where fldUsername = '$uname'");
		$row = mysqli_num_rows($q);
		if($row>0)
			echo 'Username unavailable';
		else
			echo 'Username available!';


?>
