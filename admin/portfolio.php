
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
        Add Portfolio 
      </h1>
    </section>
    <br>
<form method="post" enctype="multipart/form-data">
<div class="box">
    <div class="box-header with-border">
      <h1 class="box-title">Portfolio Details</h1>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      
        <!-- text input -->
        <div class="form-group">
          <label>Event Title</label>
          <input type="text" name="eventTitle" required class="form-control" placeholder="Event Title...">
        </div>

        <div class="form-group">
          <label>Client</label>
          <input type="text" name="eventClient" required class="form-control" placeholder="Client...">
        </div>

         <div class="form-group">
          <label>Event Type</label>
          <select onchange="showSpecify(this.value)" required name="eventType" class="form-control">
          	<option value="" selected disabled>--Select One--</option>
          	<option value="Corporate">Corporate</option>
          	<option value="Non-profit">Non-profit</option>
          	<option value="Social">Social</option>
          	<option value="Wedding">Wedding</option>
          </select>
        </div>

        <div class="form-group">
	          <label>Picture(s) </label> <sup>You can select multiple pictures at the same time*</sup>
         	<input type="file" name="img[]" required multiple="multiple" class="form-control">
        </div>

        <input type="submit" name="submit" class="btn btn-success" value="Add to Portfolio">



       


    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</form>



<?php
	if(isset($_POST['submit']))
	{
		$title = mysqli_real_escape_string($con,$_POST['eventTitle']);
		$client = mysqli_real_escape_string($con,$_POST['eventClient']);
		$type = $_POST['eventType'];
		$q = mysqli_query($con,"insert into tblportfolio values ('','$title','$client','$type', '" . date("Y-m-d H:i:s") . "','$loggedID')");
		$v = mysqli_query($con,"select * from tblportfolio order by fldPortID DESC Limit 1");
		$vf = mysqli_fetch_array($v);
		$pfID = $vf[0];
		$numv = mysqli_num_rows($v);
		if($numv == 0)
			$pfID = 1;
		else
			$pfID = $pfID;
		if($q)
		{
			$directoryname = '../images/portfolio/' . $pfID;
			$filename = $_FILES['img']['name'];
			if(!is_dir($directoryname))
			{
				mkdir($directoryname, 0777, true);
			}
			$temp = $_FILES['img']['tmp_name'];
			$dir_separator = DIRECTORY_SEPARATOR;
			
			$destination_path = dirname(__FILE__).$dir_separator.$directoryname.$dir_separator;

			for ($i=0; $i<=count($temp)-1; $i++) { 
				$fileid = uniqid();
				$name = $fileid.$_FILES['img']['name'][$i];
				$target_path = $destination_path.$fileid.$_FILES['img']['name'][$i];
				move_uploaded_file($temp[$i],$target_path);
				$x = mysqli_query($con,"insert into tblportfoliopic values ('','$pfID','$name')");
			}

			echo "<script>alert('Portfolio added!');window.location=window.location</script>";
		}
		else
		{
			//do nothing
		}
		
	}

?>


