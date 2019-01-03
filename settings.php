<?php
	$q = mysqli_query($con,"select * from tblusers where fldID = '$id'");
	$qf = mysqli_fetch_array($q);
?>



<br>
  <div class="card">
    <!-- /.box-header -->
    <div class="card-header">
        <h2>Profile Picture</h2>
    </div>
    <div class="card-body">

        <img class="img-responsive img-thumbnail img-circle" src="images/users/<?php echo $qf['fldImage'] ?>" height="200px" width="200px">
        <br>
        <br>
        <button style="font-size:12px" href="#" data-toggle="modal" data-target="#picModal" class="btn btn-info">Update Profile Picture</button>
       
        
    </div>

    <hr>
    <form method="post">
	<div class="card-header">
		<h2>Account Info</h2>
	</div>

    <!-- /.box-header -->
    <div class="card-body">
      
        <!-- text input -->
       


        <div class="form-group">
          <label>Name</label>
          <div class="row">
        	<div class="col-sm-12 col-xs-12 col-md-4">
        		<input type="text" name="fname" required class="form-control" value="<?php echo $qf['fldFirstName'] ?>" placeholder="First Name...">
        	</div>
        	<div class="col-sm-12 col-xs-12 col-md-4">
        		<input type="text" name="mname" class="form-control" value="<?php echo $qf['fldMiddleName'] ?>" placeholder="Middle Name...">
        	</div>
        	<div class="col-sm-12 col-xs-12 col-md-4">
        		<input type="text" name="lname" required class="form-control" value="<?php echo $qf['fldLastName'] ?>" placeholder="Last Name...">
        	</div>
        	
          </div>

        </div>

        <div class="form-group">
          <label>Address</label>
          <textarea name="addr" required class="form-control" placeholder="Address..."><?php echo nl2br($qf['fldAddress']) ?></textarea>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" required class="form-control" value="<?php echo $qf['fldEmail'] ?>" placeholder="Email...">
        </div>

        <div class="form-group">
          <label>Phone Number</label>
          <input type="text" name="cont" required class="form-control" value="<?php echo $qf['fldPhoneNum'] ?>" placeholder="+639123456789">
        </div>
        
        

        <input type="submit" name="submit" class="btn btn-success" value="Update Details">
    </div>
    </form>

    <hr>
    <div class="card-header">
        <h2>Account Settings</h2>
    </div>
    <!-- /.box-header -->
    <form method="post">
    <div class="card-body">
         <div class="form-group">
        <label>Username</label>
          <input type="text" name="uname" required class="form-control" value="<?php echo $qf['fldUsername'] ?>" placeholder="Username...">
        </div>

        <!-- text input -->
        <div class="form-group">
          <label>New Password</label>
          <input type="password" name="newPass" required class="form-control" placeholder="New Password...">
        </div> 

        <div class="form-group">
          <label>Confirm New Password</label>
          <input type="password" name="newPass2" required class="form-control" placeholder="Confirm New Password...">
        </div>    

        <input type="submit" name="accSubmit" class="btn btn-success" value="Update Details">
    </div>
    </form>

</div>


<?php
	if(isset($_POST['submit']))
	{
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$addr = mysqli_real_escape_string($con,$_POST['addr']);
		$email = $_POST['email'];
		$cont = $_POST['cont'];

		$q = mysqli_query($con,"update tblusers set fldFirstName = '$fname', fldMiddleName = '$mname', fldLastName = '$lname', fldAddress = '$addr', fldEmail = '$email', fldPhoneNum = '$cont' where fldID = '$id'");
		if($q)
			echo "<script>alert('Details updated!');window.location=window.location</script>";
	}

    if(isset($_POST['accSubmit']))
    {
        $uname = $_POST['uname'];
        $pass = $_POST['newPass'];
        $pass = md5($pass);
        $q = mysqli_query($con,"update tblusers set fldUsername = '$uname', fldPassword = '$pass' where fldID = '$id'");
        if($q)
            echo "<script>alert('Details updated!');window.location=window.location</script>";
    }
?>




















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
              <label style="color:#CDD1D0;font-size:15px">ltneventscompany@gmail.com</label>
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



<!-- Pic Modal -->
<div class="modal fade" id="picModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Change Profile Picture</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       
        <div class="form-group">
            <form method="post" enctype="multipart/form-data">
                
            
            <div class="input-group input-group-md">
                <input required type="file" name="img" class="form-control">
            </div>

            <br>
            
        </div>





      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" name="picSubmit" class="btn btn-success" value="Submit">
        </form>
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        
      </div>

    </div>
  </div>
</div>





<?php
    if(isset($_POST['picSubmit']))
    {
        $directoryname = 'images/users/';
        $filename = $_FILES['img']['name'];
        if(!is_dir($directoryname))
        {
            mkdir($directoryname, 0777, true);
        }
        $temp = $_FILES['img']['tmp_name'];
        $dir_separator = DIRECTORY_SEPARATOR;
        
        $destination_path = dirname(__FILE__).$dir_separator.$directoryname.$dir_separator;

        $fileid = uniqid();
        $name = $fileid.$_FILES['img']['name'];
        $target_path = $destination_path.$fileid.$_FILES['img']['name'];
        move_uploaded_file($temp,$target_path);

        $q = mysqli_query($con,"update tblusers set fldImage = '$name' where fldID = '$id'");
        if($q)
            echo "<script>alert('Profile picture updated!');window.location=window.location</script>";
    }

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

        $q = mysqli_query($con,"insert into tblInquiry values ('','$inqName','$inqAddress','$inqCategory','$inqNum','$inqEmail','$inqEventName','$inqTargetDate','$inqVenue','$inqMsg','" . date("Y-m-d H:i:s") ."','no')");
        if($q)
        {
            echo "<script>alert('Thank you for your inquiry! Rest assured that we will get back to you ASAP.');window.location=window.location</script>";
        }
    }
?>


        <!-- footer end -->












    <!-- footer -->


  <!-- /.box -->




