<script type="">
	function showSpecify(x)
	{
		if(x=='Others')
			$('#specifySpan').removeClass("hidden");
		else
			$('#specifySpan').addClass("hidden");
	}

</script>

<?php
	$client = $_REQUEST['coordinator'];
	$q = mysqli_query($con,"select * from tblusers where fldID = '$client'");
	$qf = mysqli_fetch_array($q);
?>



<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      	Edit Coordinator Details
      </h1>
    </section>
    <br>
<form method="post">
<div class="box">
    <div class="box-header with-border">
      <h1 class="box-title"><?php echo $qf['fldFirstName'] . " " . $qf['fldLastName'] ?></h1>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      
        <div class="form-group">
          <label>Username</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" required name="ecUsername" class="form-control" value="<?php echo $qf['fldUsername'] ?>" placeholder="Username...">
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="form-group">
              <label>Client Name</label>
              <div class="input-group">
              	<div class="row">
              		<div class="col-sm-4 col-md-4 col-xs-4">
              			<input type="text" required name="ecFirst" class="form-control" value="<?php echo $qf['fldFirstName'] ?>" placeholder="First Name...">
              		</div>
              		<div class="col-sm-4 col-md-4 col-xs-4">
              			<input type="text" name="ecMid" class="form-control" value="<?php echo $qf['fldMiddleName'] ?>" placeholder="Middle Name...">
              		</div>
              		<div class="col-sm-4 col-md-4 col-xs-4">
              			<input type="text" required name="ecLast" value="<?php echo $qf['fldLastName'] ?>" class="form-control" placeholder="Last Name...">
              		</div>
              	</div>
                
                
                
              </div>
            </div>
          </div>

           

        </div>

       <div class="form-group">
          <label>Address</label>
          <textarea class="form-control" rows="3" name="clientAddr" required placeholder="Complete Address..."><?php echo $qf['fldAddress'] ?></textarea>
        </div>

        <div class="form-group">
          <label>Contact Number</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            <input type="text" required name="ecNumber" class="form-control" value="<?php echo $qf['fldPhoneNum'] ?>" placeholder="+639xxxxxxxxx">
          </div>
        </div>

        <div class="form-group">
          <label>Email</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="text" required name="ecEmail" value="<?php echo $qf['fldEmail'] ?>" class="form-control" placeholder="Email...">
          </div>
        </div>
        <br>
        <input type="submit" class="btn btn-success" name="editSave" value="Save Changes">
        </form>
        <a class="btn btn-default" href="?p=client" name="editCancel">Cancel</a>
        

      </div>
        
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->


<?php
	if(isset($_POST['editSave']))
	{
		$uname = $_POST['ecUsername'];
		$fname = $_POST['ecFirst'];
		$mname = $_POST['ecMid'];
		$lname = $_POST['ecLast'];
		$clientAddr = mysqli_real_escape_string($con,$_POST['clientAddr']);
		$clientEmail = $_POST['ecEmail'];
		$clientNum = $_POST['ecNumber'];

		$q = mysqli_query($con,"update tblusers set fldUsername = '$uname', fldFirstName = '$fname', fldMiddleName = '$mname', fldLastName = '$lname', fldAddress = '$clientAddr', fldEmail = '$clientEmail', fldPhoneNum = '$clientNum' where fldID = '$client'");
		if($q)
		{
			echo "<script>alert('Details updated!');window.location='?p=client'</script>";
		}

	}


?>












      