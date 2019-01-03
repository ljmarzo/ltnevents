<script>
			 $(document).ready(function(){
                $("#pweye").mouseup(function(){
                    $("#pword").attr("type", "password");
                });

                $("#pweye").mousedown(function(){
                    $("#pword").attr("type", "text");
                });

               $("#confirmEye").mouseup(function(){
                    $("#pword2").attr("type", "password");
                });

                $("#confirmEye").mousedown(function(){
                    $("#pword2").attr("type", "text");
                });
            });

		</script>
		
<script>
    function validateForm()
    {
        var x = document.getElementById('pword').value;
        var y = document.getElementById('pword2').value;
        if(x != y)
        {
            alert("Passwords do not match!");
            return false;
        }
        return true;
    }
</script>

<div class="container">

<br>
	<h1>Register an account</h1>
	<h2>Fill up the forms. Fields with asterisks (*) are required.</h2>
	<br>
	<h3>Personal Information</h3>
	<form method="post" name="regForm" onsubmit="return validateForm()">

		<div class="card bg-light">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-4 col-md-4 col-xs-4">
						<b>First Name*</b>
						<input type="text" required name="fname" class="form-control" id="fname" placeholder="Enter First Name here..."></input>
					</div>	

					<div class="col-sm-4 col-md-4 col-xs-4">
						<b>Middle Name</b>
						<input type="text" name="mname" class="form-control" id="mname" placeholder="Enter Middle Name here..."></input>
					</div>	

					<div class="col-sm-4 col-md-4 col-xs-4">
						<b>Last Name*</b>
						<input type="text" required name="lname" class="form-control" id="lname" placeholder="Enter Last Name here..."></input>
					</div>	
				</div>

				<br>

				<div class="row">
					<div class="col-sm-12 col-md-12 col-xs-12">
						<b>Complete Address*</b>
						<textarea name="addr" required class="form-control" id="addr" rows="4" style="resize:none;" placeholder="Enter Address..."></textarea>
					</div>	
				</div>

				<br>

				<div class="row">
					<div class="col-sm-4 col-md-4 col-xs-4">
						<b>Email*</b>
						<input type="text" required name="email" class="form-control" id="email" placeholder="Enter Email here..."></input>
					</div>

					<div class="col-sm-4 col-md-4 col-xs-4">
						<b>Phone Number*</b>
						<input type="text" required name="phonenum" class="form-control" id="phonenum" placeholder="+639xxxxxxxxx"></input>
					</div>		
				</div>
				
			</div>

		</div>

		<br><br>

		<h3>Account Information</h3>
		<div class="card bg-light col-xs-8 col-md-8 col-sm-8">
			<div class="card-body">
				<div class="row">
					
					<div class="form-group col-sm-12 col-md-12 col-xs-12">
						<b><label>Username* (6-20 characters)</label></b>
			            <div class="input-group">
			            	
			                <div class="input-group-prepend"><i class="input-group-text fa fa-user"></i></div>
			                <input type="text" required id="uname" name="uname" class="form-control" placeholder="Enter Username Here...">
	       				</div>
					</div>

					<br>

					<div class="form-group col-sm-12 col-md-12 col-xs-12">
						<b><label>Password* (8-20 characters)</label></b>
			            <div class="input-group">
			            	
			                <div class="input-group-prepend"><i id="pweye" class="input-group-text fa fa-eye"></i></div>
			                <input type="password" required id="pword" name="pword" class="form-control" placeholder="Enter Password Here...">
	       				</div>
					</div>

					<div class="form-group col-sm-12 col-md-12 col-xs-12">
						<b><label>Confirm Password* (8-20 characters)</label></b>
			            <div class="input-group">
			            	
			                <div class="input-group-prepend"><i id="confirmEye" class="input-group-text fa fa-eye"></i></div>
			                <input type="password" required id="pword2" name="pword2" class="form-control" placeholder="Confirm Password Here...">
	       				</div>
					</div>

				</div>
			</div>

		</div>

		<br>
		<br>

		<input type="checkbox" required name="agree"> I agree and accept the <a href="#" data-toggle="modal" data-target="#termsModal" style="cursor:pointer">terms and condition</a> of LTN Events</input>
		<br>
		<input type="submit" name="register" value="Register" class="btn btn-primary" style="width:10%;margin-top:18px"></input>

		<br>
		<br>
		<br>

	</form>
	

	
		
	
	

</div>
<!-- footer -->
		<div class="col-md-12" style="background-color:#242424;height:225px;">
			<br><br>
			<div class="row">
				<div class="col-md-4">
					<label style="color:gray">CONTACT</label>
					<div class="row">
						<div class="col-md-4">
							<label style="color:#CDD1D0">Phone:</label>
						</div>
						<div class="col-md-6">
							<label style="color:#CDD1D0">(043) 740 7112</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label style="color:#CDD1D0">Email:</label>
						</div>
						<div class="col-md-6">
							<label style="color:#CDD1D0">ltneventscompany@gmail.com</label>
						</div>
					</div>
					
				</div>

				<div class="col-md-4">
					<label style="color:gray">Address</label>
					<div class="row">
						<div class="col-md-12">
							<label style="color:#CDD1D0">Block 5, Lot 12, Doña Aurora St.,<br>City Park Subd., Sabang, Lipa City,<br>Batangas 4217</label>
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
						<button class="btn btn-info">Book Now</button>
						
					</div>
					
					

				</div>
				<div class="col-md-2">
					<img src="images/logo.png" width="100%">
					<br>
					<br>
					<div class="row">
						<p style="color:#CDD1D0;font-size:10px">lorrea Solutions © 2018</p>
					</div>
					
				</div>
			</div>
		</div>
		<!-- footer end -->

<!-- Login Modal -->
<div class="modal fade" id="termsModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Terms and Condition</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       
      	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<?php
	if(isset($_POST['register']))
	{
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$addr = mysqli_real_escape_string($con,$_POST['addr']);
		$email = $_POST['email'];
		$phonenum = $_POST['phonenum'];
		$uname = $_POST['uname'];
		$pword = $_POST['pword'];
		$pword = md5($pword);
		$q = mysqli_query($con,"insert into tblusers values ('','$uname','$pword','$fname','$mname','$lname','$addr','$email','$phonenum','" . date("Y-m-d H:i:s") ."','no','Client','nopic.png','-','0','no')");
		if($q){
		    $q = mysqli_query($con,"select * from tblusers where (fldUsername = '$uname' or fldEmail = '$uname') and fldPassword = '$pword'");
    		$qf = mysqli_fetch_array($q);
    		$num = mysqli_num_rows($q);
    		if($num != 0)
    		{
    			$name = $qf['fldFirstName'] . " " . $qf['fldLastName'];
    			$_SESSION['id'] = $qf['fldID'];
    			$id = $_SESSION['id'];
    			$z = mysqli_query($con,"update tblusers set fldOnline = '1' where fldID = '$id'");
    			echo "<script>alert('Registered Successfully!');window.location='ltn.php?p=user&sec=feed'</script>";
    		}
		
			
		}
	}
	
?>