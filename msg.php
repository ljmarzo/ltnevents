<?php

	$q = mysqli_query($con,"select fldSender from tblmessages where fldRecipient = '$id' order by fldMsgID limit 1");
	$qf = mysqli_fetch_array($q);
	$partner = $qf[0];

?>
	

   <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="admin/dist/css/skins/_all-skins.min.css">
<!-- Montserrat font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<!-- /Montserrat font -->

<style type="text/css">
	.direct-chat-messages {
  -webkit-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  -o-transform: translate(0, 0);
  transform: translate(0, 0);
  padding: 10px;
  min-height: 420px !important;
  overflow-y: auto;

}

#chatContacts:hover
{
	background-color:#F2F2F2;
}


.image-upload > input
{
    display: none;
}
</style>

<script>
	window.onload=function () {
	     var objDiv = document.getElementById("chatbox");
	     objDiv.scrollTop = objDiv.scrollHeight;

	     
	}


	function oi(){
		
		document.getElementById("walao").click();	
	}

	

</script>



<?php 
	if(isset($_REQUEST['partner']))
		$partner = $_REQUEST['partner'];
	else
	{
		$zz = mysqli_query($con,"select * from tblmessages where (fldRecipient = '$id' or fldSender = '$id') order by fldTime DESC limit 1");
		$zzf = mysqli_fetch_array($zz);
		if($zzf['fldRecipient'] == $id)
			$partner = $zzf['fldSender'];
		else
		$partner = $zzf['fldRecipient'];
	        
	}
	
	$q = mysqli_query($con,"select * from tblusers where fldID = '$partner'");
	$qf = mysqli_fetch_array($q);
	$user = $qf['fldFirstName'] . " " . $qf['fldLastName'];
	$pic = $qf['fldImage'];
	$x = mysqli_query($con,"select * from tblusers where fldID = '$id'");
	$xf = mysqli_fetch_array($x);
	$admin = $xf['fldFirstName'] . " " . $xf['fldLastName'];
	$adminpic = $xf['fldImage'];

	$readMsg = mysqli_query($con,"update tblmessages set fldRead = 'yes' where fldSender = '$partner'")
?>
<link rel="stylesheet" href="admin/bower_components/lightbox/dist/lightbox.min.css">
<div class="row">



	
<!-- divider -->

	<div class="col-sm-12">
		
		<div class="box box-primary direct-chat direct-chat-primary">
			<div class="box-header with-border">
			  <h3 class="box-title"><a href="?p=profile&user=<?php echo $partner ?>"><?php echo ucwords($user) ?></a></h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <!-- Conversations are loaded here -->
			  <div class="direct-chat-messages" id="chatbox">
			  	<?php
			  		$q = mysqli_query($con,"select * from tblmessages where (fldSender='$id' or fldRecipient = '$id') and (fldSender = '$partner' or fldRecipient = '$partner')");
			  		while($qf = mysqli_fetch_array($q))
			  		{
			  			$sender = $qf['fldSender'];
			  			$type = $qf['fldType'];
			  			$msg = $qf['fldMsg'];
			  			$time = $qf['fldTime'];
			  			$time = date("d M h:i A");
			  			if($sender!=$id)
			  			{

			  		?>
			  				<!-- Message. Default to the left -->
						    <div class="direct-chat-msg">
						      <div class="direct-chat-info clearfix">
						        <span class="direct-chat-name pull-left"><a href="?p=profile&user=<?php echo $sender ?>"><?php echo ucwords($user) ?></a></span>
						      </div>
						      <!-- /.direct-chat-info -->
						      <img class="direct-chat-img" src="images/users/<?php echo $pic ?>" alt="Message User Image"><!-- /.direct-chat-img -->
						     
						        
						      <?php
						      	if($type == 'Text')
						      	{
						      ?>
						      	<div class="direct-chat-text" style="display: inline-block;margin-left: 15px;max-width: 90%"  data-toggle="tooltip" data-placement="top" title="<?php echo $time ?>">
							        <?php echo nl2br($msg) ?>
							    </div>
						      <?php				    
						      	}
						      	else
						      	{
						      ?>
						      	<a class="example-image-link" href="images/msg/<?php echo $msg ?>" data-lightbox="<?php echo $msg ?>"><img width="30%" style="margin-left:15px" data-toggle="tooltip" data-placement="top" title="<?php echo $time ?>" class="example-image" src="images/msg/<?php echo $msg ?>" alt="image-1" /></a>
						      <?php
						      	}
						      ?>



						      
						    </div>
						    <!-- /.direct-chat-msg -->
			  		<?php
			  			}
			  			else
			  			{
			  		?>
			  				<!-- Message to the right -->
					        <div class="direct-chat-msg right">
					          <div class="direct-chat-info clearfix">
					            <span class="direct-chat-name pull-right"><?php echo ucwords($admin) ?></span>

					          </div>
					          <!-- /.direct-chat-info -->
					          <img class="direct-chat-img" src="images/users/<?php echo $adminpic ?>" alt="Message User Image"><!-- /.direct-chat-img -->
					          
					           <!-- /.direct-chat-text -->
						      <?php
						      	if($type == 'Text')
						      	{
						      ?>
						      	<div class="direct-chat-text" style="display: inline-block;float:right;margin-right: 15px;max-width: 90%"  data-toggle="tooltip" data-placement="top" title="<?php echo $time ?>">
							        <?php echo nl2br($msg) ?>
							    </div>
						      <?php				    
						      	}
						      	else
						      	{
						      ?>
						      	<a class="example-image-link" href="images/msg/<?php echo $msg ?>" data-lightbox="<?php echo $msg ?>"><img width="30%" style="float:right;margin-right:15px;" data-toggle="tooltip" data-placement="top" title="<?php echo $time ?>" class="example-image" src="images/msg/<?php echo $msg ?>" alt="image-1" /></a>
						      <?php
						      	}
						      ?>
						      


						      
						    </div>
						    <!-- /.direct-chat-msg -->

			  		<?php
			  			}
			  	?>

			  	<?php
			  		}
			  	?>  
			  </div>
			  <!--/.direct-chat-messages-->
			</div>
		<!-- /.box-body -->
		    <div class="box-footer">
		      <form method="post" id="theForm" name="theForm" enctype="multipart/form-data">
		        <div class="input-group">
		          <input type="text" name="messageSend" autocomplete="off" placeholder="Type Message ..." class="form-control">
		              <span class="input-group-btn">
		                <input type="submit" name="walao" id="walao" class="btn btn-primary btn-flat" value="Send"></input>
		              </span>
		        </div>
		        <div class="image-upload">
				    <label for="file-input">
				        <img src="images/attachment.png" style="margin-top:4px" height="25px" data-toggle="tooltip" data-placement="top" title="Send a picture"/>
				    </label>

				    <input id="file-input" name="img" id="img" onchange="oi()" type="file"/>
				</div>
		      </form>
		    </div>
		<!-- box -->
	<!-- ender -->	
	</div>
</div>

<!-- jQuery 3 -->
<script src="admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="admin/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>


<!-- Bootstrap 3.3.7 -->
<script src="admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>





<script src="admin/bower_components/lightbox/dist/lightbox-plus-jquery.min.js"></script>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{

		if(!empty($_FILES['img']['tmp_name']))
		{
			$directoryname = 'images/msg/';
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
			$q = mysqli_query($con,"insert into tblmessages values ('','$name','Image','$id','$partner','" . date("Y-m-d H:i:s") . "','no')");
			if($q)
			{
				echo "<script>window.location=window.location</script>";
			}	
		}
		else
		{
		    if($partner=="")
		        $partner = 1;
			$msgSend = mysqli_real_escape_string($con,$_POST['messageSend']);
			$q = mysqli_query($con,"insert into tblmessages values ('','$msgSend','Text','$id','$partner','" . date("Y-m-d H:i:s") . "','no')");
			if($q)
			{
				echo "<script>window.location=window.location</script>";
			}	
		}

		
	}


?>



