<?php
			$zxc = mysqli_query($con,"select * from tblpageviews where fldPage = 'services'");
			$zxcf = mysqli_fetch_array($zxc);
			$views = $zxcf['fldViews'];
			$views = $views +1;
			$zxc = mysqli_query($con,"update tblpageviews set fldViews = '$views' where fldPage = 'services'");
		?>

<style type="text/css">
	#managementDiv:hover #arrow1,
	#productionDiv:hover #arrow2,
	#digitalDiv:hover #arrow3{
		color:#000;
	}

	a
	{
		text-decoration:none;
		color:white;
	}

	a:hover
	{
		color:white;
	}

</style>

<div style="height:90vh;background-image:url(images/services.JPG);background-repeat: no-repeat;background-size: cover;background-position: fixed;color:white">
	<center>
		
		<img src="images/logo.png" height="70px" width="140px">
		<br>
		<p style="color:white">LTN EVENTS</p>
		<br>

	</center>


	<center>

		<p style="font-size: 60px">What We Do</p>

		<p style="color:gray">We offer a comprehensive range of services that 
		<br><span style="color:white"><strong>move ventures</strong></span> to market toward <span style="color:white"><strong>success.</strong></span></p>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-4 col-xs-12">
					<center>
						<a href="#managementTarg">
							<div id="managementDiv" class="col-sm-8 col-md-8 col-xs-8 card bg-3rd-petal rounded" style="padding:5px">
								<p style="font-size:80px;"><span class="fa fa-tasks"></span></p>
								<strong><label style="color:dimgray">MANAGEMENT</label></strong>
								<p style="font-size:28px;color:#ffffff"><span id="arrow1" class="fa fa-arrow-circle-down"></span></p>

							</div>
						</a>
					</center>
				</div>
				<br>
				
				<div class="col-sm-12 col-md-4 col-xs-12">
					<center>
						<a href="#productionTarg">
							<div id="productionDiv" class="col-sm-8 col-md-8 col-xs-8 card bg-2nd-petal rounded" style="padding:5px">
								<p style="font-size:80px;"><span class="fa fa-industry"></span></p>
								<strong><label style="color:dimgray">PRODUCTION</label></strong>
								<p style="font-size:28px;color:#ffffff"><span id="arrow2" class="fa fa-arrow-circle-down"></span></p>
							</div>
						</a>
					</center>
				</div>

				<div class="col-sm-12 col-md-4 col-xs-12">
					<center>
						<a href="#digitalTarg">
							<div id="digitalDiv" class="col-sm-8 col-md-8 col-xs-8 card bg-1st-petal rounded" style="padding:5px">		
								<p style="font-size:80px;"><span class="fa fa-laptop"></span></p>
								<strong><label style="color:dimgray">DIGITAL</label></strong>
								<p style="font-size:28px;"><span id="arrow3" class="fa fa-arrow-circle-down"></span></p>
							</div>
						</a>
					</center>
				</div>

			</div>
		</div>


	</center>

</div>

	<label id="managementTarg"></label>
<br>
<br>
<br>

<div class="container-fluid">

	<div class="row">
		<div class="col-sm-8 col-md-8 col-xs-8">
			<h1>MANAGEMENT</h1>
			<br>
			<p align="justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			<br>
			<br>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>

		<div class="col-sm-4 col-md-4 col-xs-4">
			<img src="images/event2.jpg" width="100%" height="350px">
		</div>
	</div>
	<label id="productionTarg"></label>
	<br>
	<br>
	<hr>
	
	<br>
	<br>

	<div class="row">
		

		<div class="col-sm-4 col-md-4 col-xs-4">
			<img src="images/event3.jpg" width="100%" height="350px">
			
		</div>

		<div class="col-sm-8 col-md-8 col-xs-8">
			<h1>PRODUCTION</h1>
			<br>
			<p align="justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			<br>
			<br>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>

	</div>

<label id="digitalTarg"></label>
	<br>
	<br>
	<hr>
	
	<br>
	<br>

	<div class="row">
		<div class="col-sm-8 col-md-8 col-xs-8">
			<h1>DIGITAL</h1>
			<br>
			<p align="justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			<br>
			<br>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>

		<div class="col-sm-4 col-md-4 col-xs-4">
			<img src="images/event4.jpg" width="100%" height="350px">
		</div>
	</div>

</div>



<br>
<br>
<br>

<!-- footer -->
<!-- Book Modal -->
<form method="post">
<div class="modal fade" id="bookModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <center><img class="col-2 modal-title text-center" src="images/logo.png"></center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     	 <div class="row">
     	 	<div class="col-sm-6 col-md-6 col-xs-6">
     	 		<table>
     	 			<tr>
     	 				<td>Date:</td><td style="padding:8px"><?php echo date("M d, Y") ?></td>	
     	 			</tr>
     	 			<tr>
     	 				<td>Name:</td><td style="padding:8px"><input type="text" placeholder="Complete Name" required name="inqName" class="form-control"></td>
     	 			</tr>
     	 			<tr>
     	 				<td>Address:</td><td style="padding:8px"><textarea placeholder="Address" name="inqAddr" rows="3" required class="form-control"></textarea></td>
     	 			</tr>
     	 			<tr>
     	 				<td>Category:</td>
     	 				<td style="padding:8px">
     	 					<select required name="inqCategory" class="form-control">
     	 						<option value="" selected disabled>--Select Category--</option>
     	 						<option value="Wedding">Wedding</option>
     	 						<option value="Marketing">Marketing</option>
     	 						<option value="Production">Production</option>
     	 						<option value="">Others</option>
     	 					</select>
     	 				</td>
     	 			</tr>
     	 		</table>
     	 		
     	 	</div>

     	 	<div class="col-sm-6 col-md-6 col-xs-6">
     	 		<table>
     	 			<tr>
     	 				<td></td><td style="padding:8px">&emsp;</td>	
     	 			</tr>
     	 			<tr>
     	 				<td>Contact No.:</td><td style="padding:8px"><input type="text" required placeholder="+639xxxxxxxxx" name="inqNum" class="form-control"></td>
     	 			</tr>
     	 			<tr>
     	 				<td>Email:</td><td style="padding:8px"><input type="text" required placeholder="sample@gmail.com" name="inqEmail" class="form-control"></td>
     	 			</tr>
     	 		</table>
     	 		
     	 	</div>
     	 	
     	 </div>
     	 <hr>
    	<div class="row">
     	 	<div class="col-sm-12 col-md-12 col-xs-12">
     	 			<label style="font-size:18px">Event Details</label>
     	 		<table>
     	 			<tr>
     	 				<td>Event Name:</td><td style="padding:8px;width: 70%"><input type="text" required placeholder="Event Name" name="inqEventName" class="form-control"></td>
     	 			</tr>
     	 			<tr>
     	 				<td>Target Date and Time:</td><td style="padding:8px"><input type="datetime-local" required placeholder="12/30/2000 08:00 AM" name="inqDate" class="form-control"></td>
     	 			</tr>
     	 			<tr>
     	 				<td>Target Venue:</td><td style="padding:8px"><input type="text" placeholder="Target Venue" required name="inqVenue" class="form-control"></td>
     	 			</tr>
     	 			<tr>
     	 				<td>Message:</td><td style="padding:8px"><textarea placeholder="Message" name="inqMsg" required rows="3" class="form-control"></textarea></td>
     	 			</tr>
     	 		</table>
     	 		
     	 	</div>

     	 	
     	</div>

      </div>



      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" name="inqSubmit" value="Submit" class="btn btn-success"></form>
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>

      </div>

    </div>
  </div>
</div>

<!-- Review Modal -->
<form method="post">
<div class="modal fade" id="reviewModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <center><img class="col-2 modal-title text-center" src="images/logo.png"></center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <?php 
    	if(isset($_SESSION['id'])) 
    	{ 
    		$loggedID = $_SESSION['id'];
    		$q2 = mysqli_query($con,"select * from tblusers where fldID =  '$loggedID'");
    		$qf2 = mysqli_fetch_array($q2);
    		$loggedName = $qf2['fldFirstName'] . " " . $qf2['fldLastName'];
    	}
    	else
    	{
    		$loggedName = "";
    	}
    ?>
      <!-- Modal body -->
      <div class="modal-body">
     	 <div class="row">
     	 	<div class="col-sm-12 col-md-12 col-xs-12">
     	 		<div class="form-group">
		          <label>Name <sup>(Optional)</sup></label>
		          <div class="input-group">    
			        <input type="text" autocomplete="off" value="<?php echo $loggedName; ?>" name="revName" placeholder="Name..." class="form-control">
			      </div>
		        </div>

		        <div class="form-group">
		          <label>Comment and Suggestion</label>
		          <div class="input-group">    
			        <textarea name="revComment" placeholder="Comment and Suggestion..." class="form-control" rows="5"></textarea>
			      </div>
		        </div>
     	 		
     	 	</div>

     	 </div>

      </div>



      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" name="revSubmit" value="Submit" class="btn btn-success"></form>
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>

      </div>

<?php
	if(isset($_POST['revSubmit']))
	{
		$name = $_POST['revName'];
		if($name == "")
			$name = "Anonymous";
		$comment = mysqli_real_escape_string($con,$_POST['revComment']);
		$q = mysqli_query($con,"insert into tblcomments values ('','$name', '$comment','" . date("Y-m-d H:i:s") . "','no','no')");
		if($q)
			echo "<script>alert('Thank you for sending your review!');window.location=window.location</script>";
	}

?>


    </div>
  </div>
</div>
		<div class="col-md-12" style="background-color:#242424;height:225px;">
			<br><br>
			<div class="row">
				<div class="col-md-4 col-xs-12">
					<label style="color:gray">CONTACT</label>
					<div class="row">
						<div class="col-md-3">
							<label style="color:#CDD1D0">Phone:</label>
						</div>
						<div class="col-md-6">
							<label style="color:#CDD1D0">(043) 740 7112</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label style="color:#CDD1D0">Email:</label>
						</div>
						<div class="col-md-6">
							<label style="color:#CDD1D0;font-size:">ltneventscompany@gmail.com</label>
						</div>
					</div>
					
					
					
				</div>

				<div class="col-md-4 col-xs-12">
					<label style="color:gray">Address</label>
					<div class="row">
						<div class="col-md-12">
							<label style="color:#CDD1D0;word-wrap: break-word;">Unit 19H, 2nd Floor Big Ben Complex, JP Laurel Highway, Mataas na Lupa, Lipa, 4217 Batangas</label>
						</div>
						
					</div>
					
					
				</div>

				<div class="col-md-2">
					<label style="color:#404040"></label>
					<div class="row">
						<div class="col-md-12" style="font-size:30px">
							<a href="https://www.facebook.com/ltnevents/" target="_blank" class="fa fa2 fa-facebook"></a>
							<a href="http://www.instagram.com/eventsbyltn" target="_blank" class="fa fa2 fa-instagram"></a>
						</div>
						<br>
						<br>
						<br>
						<?php
                if(!isset($_SESSION['id']))
                {
            ?>
            <button data-toggle="modal" data-target="#bookModal" class="btn btn-info">Inquiry? Click me!</button>
            <?php
                }
            ?>
						<button style="margin-top:10px" data-toggle="modal" data-target="#reviewModal" class="btn btn-info">Review? Click me!</button>
						
					</div>
					
					

				</div>
				<div class="col-md-2">
					<img src="images/logo.png" width="100%">
					<br>
					<br>
					<div class="row">
						<p style="color:#CDD1D0;font-size:10px;float:right">&emsp;&emsp; LTN EVENTS © 2018</p>
					</div>
					
				</div>
			</div>
		</div>


<?php
	if(isset($_POST['inqSubmit']))
	{
		$inqName = $_POST['inqName'];
		$inqAddress = mysqli_real_escape_string($con,$_POST['inqAddr']);
		$inqCategory = $_POST['inqCategory'];
		$inqNum = $_POST['inqNum'];
		$inqEmail = $_POST['inqEmail'];
		$inqEventName = $_POST['inqEventName'];
		$inqTargetDate = $_POST['inqDate'];
		$inqVenue = $_POST['inqVenue'];
		$inqMsg = mysqli_real_escape_string($con,$_POST['inqMsg']);

		$q = mysqli_query($con,"insert into tblinquiry values ('','$inqName','$inqAddress','$inqCategory','$inqNum','$inqEmail','$inqEventName','$inqTargetDate','$inqVenue','$inqMsg','" . date("Y-m-d H:i:s") ."','no')");
		if($q)
		{
			echo "<script>alert('Thank you for your inquiry! Rest assured that we will get back to you ASAP.');window.location=window.location</script>";
		}
	}
?>


		<!-- footer end -->