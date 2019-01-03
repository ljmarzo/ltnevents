

<?php
	

?>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add a Blog Entry
      </h1>
      
    </section>
    <br>
    <!-- Main content -->
    <form method="post" enctype="multipart/form-data">
    <div class="box">
	  
	   
	    <!-- /.box-header -->
	    <div class="box-body">
	      
	        <!-- text input -->
	        <div class="form-group">
	          <label>Blog Post Title</label>
	          <input type="text" name="tlTitle" required class="form-control" placeholder="Post Title...">
	        </div>  

	        <div class="form-group">
	          <label>Picture(s) </label> <sup>You can select multiple pictures at the same time*</sup>
	         	<input type="file" name="img[]" multiple="multiple" class="form-control">
	        </div>

	    	<div class="form-group">
	          <label>Content</label>
	         	<textarea class="textarea" required name="content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; font-weight: normal; padding: 10px;"></textarea>
	        </div>

	        <input type="submit" name="submit" class="btn btn-success" value="Submit">
	    </div>

	  </div>
	  <!-- /.box -->
	</form>
</body>


<?php
	if(isset($_POST['submit']))
	{
		$content = mysqli_real_escape_string($con, $_POST['content']);
		$title = mysqli_real_escape_string($con, $_POST['tlTitle']);

		$q = mysqli_query($con,"insert into tblblog values ('','$title','$content','" . date("Y-m-d H:i:s") . "','$loggedID')");
		if($q)
		{
			$z = mysqli_query($con,"select fldBlogID from tblblog order by fldBlogID DESC LIMIT 1");
			$zf = mysqli_fetch_array($z);
			$lastBL = $zf[0];

			$directoryname = '../images/blog/';
			$filename = $_FILES['img']['name'];
			if(!is_dir($directoryname))
			{
				mkdir($directoryname, 0777, true);
			}
		
		
		if(!empty($_FILES['img']['tmp_name'][0])) {
	
            
            
			
    			$temp = $_FILES['img']['tmp_name'];
    			$dir_separator = DIRECTORY_SEPARATOR;
    			
    			$destination_path = dirname(__FILE__).$dir_separator.$directoryname.$dir_separator;
    
    			for ($i=0; $i<=count($temp)-1; $i++) { 
    				$fileid = uniqid();
    				$name = $fileid.$_FILES['img']['name'][$i];
    				$target_path = $destination_path.$fileid.$_FILES['img']['name'][$i];
    				$imgpath = 'images/' . $name;
    				move_uploaded_file($temp[$i],$target_path);
    				$x = mysqli_query($con,"insert into tblblogpic values ('','$lastBL','$name')");
    			}
			}
			echo "<script>alert('Blog Post added!');window.location=window.location</script>";
		}
		else
		{
			echo "<script>alert('An unexpected error occured!');window.location=window.location</script>";
		}
		
	}

?>


