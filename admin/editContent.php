

<?php
	$TLID = $_REQUEST['TLID'];
	$eventID = $_REQUEST['eventID'];
	$q = mysqli_query($con,"select * from tbltimeline where fldTLID = '$TLID' and fldEventID = '$eventID'");
	$qf = mysqli_fetch_array($q);
	$title = $qf['fldTitle'];
	$content = $qf['fldContent'];
	
    $x = mysqli_query($con,"select * from tblevents where fldEventID = '$eventID'");
	$xf = mysqli_fetch_array($x);

	$eventName = $xf['fldEventName'];


?>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Timeline Item
      </h1>
      
    </section>
    <br>
    <!-- Main content -->
    <form method="post" enctype="multipart/form-data">
    <div class="box">
	    <div class="box-header with-border">
	      <h1 class="box-title"><?php echo $eventName ?></h1>
	    </div>
	   
	    <!-- /.box-header -->
	    <div class="box-body">
	      
	        <!-- text input -->
	        <div class="form-group">
	          <label>Post Title</label>
	          <input type="text" name="tlTitle" required class="form-control" value="<?php echo $title ?>" placeholder="Post Title...">
	        </div>  
	    	<div class="form-group">
	          <label>Content</label>
	         	<textarea class="textarea" required name="content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; font-weight: normal; padding: 10px;"><?php echo $content ?></textarea>
	        </div>

	        <input type="submit" name="submit" class="btn btn-success" value="Save">
	    </div>

	  </div>
	  <!-- /.box -->
	</form>
</body>

<?php
	if(isset($_POST['submit']))
	{
		$content = addslashes(($_POST['content']));
		$title = mysqli_real_escape_string($con,$_POST['tlTitle']);
		$q = mysqli_query($con,"update tbltimeline set fldTitle = '$title', fldContent = '$content' where fldTLID = '$TLID' and fldEventID = '$eventID'");
		if($q)
		{
			echo "<script>alert('Entry updated!');window.location='?p=timeline&eventID=$eventID'</script>";
		}	
	
		else
		{
			//do nothing
		}
		
	}

?>

