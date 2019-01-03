<?php
			$zxc = mysqli_query($con,"select * from tblpageviews where fldPage = 'account'");
			$zxcf = mysqli_fetch_array($zxc);
			$views = $zxcf['fldViews'];
			$views = $views +1;
			$zxc = mysqli_query($con,"update tblpageviews set fldViews = '$views' where fldPage = 'account'");
		?>

<?php
	$id = $_SESSION['id'];
	$q = mysqli_query($con,"select * from tblusers where fldID = '$id'");
	$qf = mysqli_fetch_array($q);
	$name = $qf['fldFirstName'] . " " . $qf['fldLastName'];
	$uname = $qf['fldUsername'];
	$verified = $qf['fldVerified'];
	$email = $qf['fldEmail'];
	$position = $qf['fldPosition'];
?>

<div class="container-fluid">
	
	<div class="row">
		
		<!-- menu -->
		
		<div class="col-sm-2 col-md-2 col-xs-2">
			<!-- Sidebar -->
				<!-- Sidebar -->
			<div id="sidebar-wrapper">
				<ul id="sidebar_menu" class="sidebar-nav">
					<br>
					<center><img class="img-responsive img-thumbnail img-circle" src="images/users/<?php echo $qf['fldImage'] ?>" height="100px" width="100px"></center>
					<li class="sidebar-brand"><center><p style="line-height:30px;word-break: break-word;"><?php echo $name ?></p></center></li>
					<li style="color:dimgray"><center><p style="font-size:20px;">@<?php echo $uname; ?></p></center></li>
				</ul>

				
				<br>
				
				<ul class="sidebar-nav" id="sidebar">     
					<?php
						$loggedid = $_SESSION['id'];
						$msgNew = mysqli_query($con,"select * from tblmessages where fldRecipient = '$loggedid' and fldRead = 'no'");
						$numMsgNew = mysqli_num_rows($msgNew);
					?>
					<li><a href="?p=user&sec=feed"  style="font-size:18px">My Feed</a></li>
					<li><a href="?p=user&sec=msg" style="font-size:18px">Messages <?php if ($numMsgNew > 0) { ?> <sup><span class="badge badge-info" style="font-size:12px"><?php echo $numMsgNew ?></span></sup> <?php } ?></a></li>
					<li><a href="?p=user&sec=settings" style="font-size:18px">Settings</a></li>
				</ul>
			</div>
		</div>

		<!-- menu end -->
		


		<!-- feed -->
		<div class="col-sm-1 col-md-1 col-xs-1"></div>
		<div class="col-sm-9 col-md-9 col-xs-9">
			<?php
	          if(!isset($_REQUEST['sec']))
	            include("feed.php");
	          else
	          { 
	            $page = $_GET['sec'];
	            include($page . ".php");
	          }
	        ?>
		</div>

		<!-- feed end -->

	</div>
	

</div>