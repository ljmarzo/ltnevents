<script type="">
	function showSpecify(x)
	{
		if(x=='Others')
			$('#specifySpan').removeClass("hidden");
		else
			$('#specifySpan').addClass("hidden");
	}

</script>



<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Event 
      </h1>
    </section>
    <br>
<form method="post">
<div class="box">
    <div class="box-header with-border">
      <h1 class="box-title">Event Details</h1>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      
        <!-- text input -->
        <div class="form-group">
          <label>Event Title</label>
          <input type="text" name="eventName" required class="form-control" placeholder="Event Title...">
        </div>

         <div class="form-group">
          <label>Event Type</label>
          <select onchange="showSpecify(this.value)" required name="eventType" class="form-control">
          	<option value="" selected disabled>--Select One--</option>
          	<option value="Wedding">Wedding</option>
          	<option value="Birthday">Birthday</option>
          	<option value="Corporate">Corporate</option>
          	<option value="Others">Others</option>
          </select>
          <br>
          <span id="specifySpan" class="hidden">Please specify: <input type="text" id="eventTypeOthers" name="eventTypeOthers" placeholder="Specify Event..." class="form-control"></span>
        </div>

        <div class="form-group">
          <label>Target Venue</label>
          <textarea class="form-control" rows="3" name="venueAddr" required placeholder="Complete Venue Address..."></textarea>
        </div>

        <div class="form-group">
          <label>Target Date and Time</label>
          <input type="datetime-local" value="<?php echo date("Y-m-d\TH:i") ?>" required name="eventDateTime" class="form-control">
        </div>

        <div class="row">
        	<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
        		<div class="form-group">
		          <label>Event Price</label>
		          <div class="input-group">
			        <span class="input-group-addon"><i>PHP</i></span>
			        <input type="number" required name="eventPrice" class="form-control" min="1">
			      </div>
		        </div>
        	</div>
        	
        	
        </div>

        
    </div>
    <!-- /.box-body -->
    <hr>
    <!-- Client -->

    <div class="box-header with-border">
      <h1 class="box-title">Client Details</h1>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      
        

<div class="row">
        	<div class="col-sm-4 col-md-4 col-xs-4 col-lg-4">
        		<div class="form-group">
		          <label>First Name</label>
		          <input type="text" name="custFName" required class="form-control" placeholder="First Name...">
		        </div>
        	</div>

        	<div class="col-sm-4 col-md-4 col-xs-4 col-lg-4">
        		<div class="form-group">
		          <label>Middle Name</label>
		          <input type="text" name="custMName" class="form-control" placeholder="Middle Name...">
		        </div>
        	</div>

        	<div class="col-sm-4 col-md-4 col-xs-4 col-lg-4">
        		<div class="form-group">
		          <label>Last Name</label>
		          <input type="text" name="custLName" required class="form-control" placeholder="Last Name...">
		        </div>
        	</div>
        </div>
       

        <div class="form-group">
          <label>Address</label>
          <textarea class="form-control" rows="3" name="custAddr" required placeholder="Complete Client Address..."></textarea>
        </div>
        <div class="row">
        	<div class="col-sm-6 col-md-6 col-xs-6 col-lg-6">
        		<div class="form-group">
		          <label>Email</label>
		          <input type="text" name="custEmail" required class="form-control" placeholder="Email...">
		        </div>
        	</div>

        	<div class="col-sm-6 col-md-6 col-xs-6 col-lg-6">
        		<div class="form-group">
		          <label>Number</label>
		          <input type="text" name="custNum" required class="form-control" placeholder="+69123456789">
		        </div>
        	</div>
        </div>
        
        

        

       
        

    	<div class="form-group">
          <label>Additional Notes</label>
          <textarea class="form-control" name="notes" rows="3" placeholder="Enter Additional Notes"></textarea>
        </div>
        
        <div class="checkbox" name="createAcc">
	      <label>
	        <input type="checkbox" checked="yes">
	        Automatically create an account for the client with no existing account. <a href="#" data-toggle="tooltip" data-placement="top" title="When box is ticked, the system will automatically create an account for the clients. Account credentials will be sent to their respective emails."><span id="clue" class="badge">?</span></a>
	      </label>
	    </div>
	    <br>
	    <input type="submit" name="submit" class="btn btn-primary btn" value="Add Event">

        
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</form>

<?php
	if(isset($_POST['submit']))
	{
		$eventName = mysqli_real_escape_string($con, $_POST['eventName']);
		$eventType = $_POST['eventType'];
		if($eventType == "Others")
		{
			$eventType = mysqli_real_escape_string($con,$_POST['eventTypeOthers']);
		}
		$eventVenue = mysqli_real_escape_string($con,$_POST['venueAddr']);
		$originalDate = $_POST['eventDateTime'];
		$eventDateTime = date("m-d-Y h:i A", strtotime($originalDate));
		$fname = $_POST['custFName'];
		$mname = $_POST['custMName'];
		$lname = $_POST['custLName'];
		$clientName = $fname . " " . $lname;
		$clientAddr = mysqli_real_escape_string($con,$_POST['custAddr']);
		$clientEmail = $_POST['custEmail'];
		$clientNum = $_POST['custNum'];
		$eventNotes = mysqli_real_escape_string($con,$_POST['notes']);
		$eventPrice = $_POST['eventPrice'];
		$eventCoordinator = $id;
		$pword2 = rand(100000,999999);
		$pword = md5($pword2);





		


		$q = mysqli_query($con,"select * from tblusers where fldEmail = '$clientEmail'");
		$qf = mysqli_fetch_array($q);
		$num = mysqli_num_rows($q);
		if($num == 0)
		{

			$uname = substr($fname, 0,1) . "." . $lname;
			$uname = strtolower($uname);
			$ctr = 0;
			$q2 = mysqli_query($con,"select * from tblusers where fldUsername = '$uname'");
			$num = mysqli_num_rows($q2);
			if($num!=0)
			{
				while($num!=0)
				{
					$newuname = $uname . "" . $ctr;
					$ctr = $ctr + 1;
					$r = mysqli_query($con,"select * from tblusers where fldUsername = '$newuname'");
					$num = mysqli_num_rows($r);
				}
				$uname = $newuname;
			}
			//create new account
			$q = mysqli_query($con,"insert into tblusers values ('','$uname','$pword','$fname','$mname','$lname','$clientAddr','$clientEmail','$clientNum','" . date("Y-m-d H:i:s") ."','no','Client','nopic.png','-','0','no')");
                $to = $clientEmail;
                $subject = "LTN Events Account Registration";
                $message = "This email is automatically generated by the system.<br><br>Your account is:<br>
                <table>
                    <tr><td>Username:</td><td>$uname</td></tr>
                    <tr><td>Password:</td><td>$pword2</td></tr>
                </table>
                <br><br>
                Please login immediately to change your account credentials. Thank you!";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: ltneventstest@gmail.com' . "\r\n" . 
                            'Reply-To: ltneventstest@gmail.com' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();
                mail($to, $subject, $message, $headers);

			$q = mysqli_query($con,"select fldID from tblusers order by fldID DESC limit 1");
		    $qf = mysqli_fetch_array($q);
		    $partner = $qf[0];
		    $q = mysqli_query($con,"insert into tblmessages values ('','Welcome to LTN Events website!','Text','$id','$partner','" . date("Y-m-d H:i:s") . "','no')");
		}


		$r = mysqli_query($con,"insert into tblevents values ('','$eventName','$eventType','$eventVenue','$eventDateTime','$eventCoordinator','$clientName','$clientEmail','$clientNum','$clientAddr','$eventNotes','$eventPrice','0','Preparation')");
		if($r)
		{
			echo "<script>alert('Event has been booked!');window.location='?p=dashboard'</script>";
		}

	}


?>












      