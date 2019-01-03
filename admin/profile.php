<?php 
	$user = $_REQUEST['user'];

	$q = mysqli_query($con,"select * from tblusers where fldID = '$user'");
	$qf = mysqli_fetch_array($q);



?>


    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" style="height:100px !important; width:100px !important" src="../images/users/<?php echo $qf['fldImage'] ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $qf['fldFirstName'] . " " . $qf['fldLastName']; ?></h3>

              <p class="text-muted text-center"><?php echo $qf['fldPosition'] ?></p>
              <?php if($user != $id)
              {

              	?>
              	<a href="?p=message&partner=<?php echo $user ?>" class="btn btn-primary btn-block"><b>Message</b></a>
              	<?php
              }
              else
              {
                ?>
                <button class="btn btn-primary btn-block" href="#" data-toggle="modal" data-target="#dpModal"><b>Change Profile Picture</b></button>
                <button class="btn btn-primary btn-block" href="#" data-toggle="modal" data-target="#pwModal"><b>Change Password</b></button>
                <?php
              }
              ?>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-user margin-r-5"></i> Member since</strong>

              <p class="text-muted">
                <?php $date = $qf['fldRegDate']; echo date("M. d, Y", strtotime($date)); ?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php echo $qf['fldAddress'] ?></p>

              <hr>
               <strong><i class="fa fa-phone margin-r-5"></i> Contact Number</strong>

              <p class="text-muted"><?php echo $qf['fldPhoneNum'] ?></p>

             

             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
              <?php 
              if($user == $id)
              {
              	?>
              		 <li><a href="#settings" data-toggle="tab">Settings</a></li>
              	<?php
              }
              ?>
             
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <?php
                	$q = mysqli_query($con,"select * from tbltimeline where fldPoster = '$user' order by fldTimePosted DESC");
                	while($qf = mysqli_fetch_array($q))
                	{
                		$eventID = $qf['fldEventID'];
                		$x = mysqli_query($con,"select * from tblevents where fldEventID = '$eventID'");
                		$xf = mysqli_fetch_array($x);
                		$eventName = $xf['fldEventName'];

                ?>
                	<div class="post">
	                  <div class="user-block">
	                    <img class="img-circle img-bordered-sm" src="../images/users/nopic.png" alt="user image">
	                        <span class="username">
	                          <a href="?p=timeline&eventID=<?php echo $eventID ?>"><?php echo $qf['fldTitle'] ?></a>
	                          <a href="?p=timeline&eventID=<?php echo $eventID ?>" class="pull-right btn-box-tool"><?php echo date("h:i A  - M d, Y", strtotime($qf['fldTimePosted'])) ?></a>
	                        </span>
	                    <span class="description">Added a timeline item - <?php echo $eventName ?></span>
	                  </div>
	                  <!-- /.user-block -->
	                  <p style="font-weight: normal">
	                    <?php echo $qf['fldContent'] ?>
	                  </p>
	                 
	                </div>
	                <!-- /.post -->
                <?php
                	}
                ?>
                
              </div>
              <?php 
              if($user == $id)
              {
              	$c = mysqli_query($con,"select * from tblusers where fldID = '$id'");
              	$cf = mysqli_fetch_array($c);
              	?>
              		<div class="tab-pane" id="settings">
                <form method="post">
                  <div class="form-group">
			          <label>Username</label>
			          <div class="input-group">
			            <span class="input-group-addon"><i class="fa fa-user"></i></span>
			            <input type="text" required name="ecUsername" class="form-control" value="<?php echo $cf['fldUsername'] ?>" placeholder="Username...">
			          </div>
			        </div>
                
               

                 	 <div class="form-group">
			          <label>Address</label>
			          <textarea class="form-control" rows="3" name="clientAddr" required placeholder="Complete Address..."><?php echo $cf['fldAddress'] ?></textarea>
			        </div>

                  	<div class="form-group">
			          <label>Contact Number</label>
			          <div class="input-group">
			            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
			            <input type="text" required name="ecNumber" class="form-control" value="<?php echo $cf['fldPhoneNum'] ?>" placeholder="+639xxxxxxxxx">
			          </div>
			        </div>

			        <div class="form-group">
			          <label>Email</label>
			          <div class="input-group">
			            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
			            <input type="text" required name="ecEmail" value="<?php echo $cf['fldEmail'] ?>" class="form-control" placeholder="Email...">
			          </div>
			        </div>
                  

			        <input type="submit" value="Update Details" class="btn btn-success" name="profEdit">
                
              </div>
              	<?php
              }
              ?>
              </form>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->






<!-- DP Modal -->

<div class="modal fade modal" id="dpModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Change Profile Picture</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="img" required class="form-control">
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" value="Save Changes" name="dpPicSubmit" class="btn btn-success"></button>
        </form>
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<?php
  if(isset($_POST['dpPicSubmit']))
  {
      $directoryname = '../images/users/';
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
        echo "<script>alert('Display Picture Updated!');window.location=window.location</script>";
  }

?>



<!-- DP Modal END -->



<!-- Change Pass Modal -->

<div class="modal fade modal" id="pwModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Change Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
             <div class="form-group">
              <label>Old Password</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                <input type="password" required name="oldPass" class="form-control" placeholder="Old Password...">
              </div>
            </div>

            <div class="form-group">
              <label>New Password</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                <input type="password" required name="newPass" class="form-control" placeholder="New Password...">
              </div>
            </div>

            <div class="form-group">
              <label>Confirm New Password</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                <input type="password" required name="newPass2" class="form-control" placeholder="Confirm New Password...">
              </div>
            </div>
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" value="Save Changes" name="cpSubmit" class="btn btn-success"></button>
        </form>
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<?php
  if(isset($_POST['cpSubmit']))
  {
      $pw = $_POST['newPass'];
      $pw = md5($pw);
      $q = mysqli_query($con,"update tblusers set fldPassword = '$pw' where fldID = '$id'");
      if($q)
        echo "<script>alert('Password Updated!');window.location=window.location</script>";
  }

?>



<!-- Change Pass Modal END -->





<?php
  if(isset($_POST['profEdit']))
  {
    $uname = $_POST['ecUsername'];
    $pword = $_POST['ecPw'];
    $clientAddr = mysqli_real_escape_string($con,$_POST['clientAddr']);
    $clientEmail = $_POST['ecEmail'];
    $clientNum = $_POST['ecNumber'];

    $q = mysqli_query($con,"update tblusers set fldUsername = '$uname', fldAddress = '$clientAddr', fldEmail = '$clientEmail', fldPhoneNum = '$clientNum' where fldID = '$id'");
    if($q)
    {
      echo "<script>alert('Details updated!');window.location=window.location</script>";
    }

  }


?>