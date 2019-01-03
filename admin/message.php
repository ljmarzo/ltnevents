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
<link rel="stylesheet" href="bower_components/lightbox/dist/lightbox.min.css">
<div class="row">



	<div class="col-sm-3" style="padding-right: 0px">
			
		<div class="box box-primary direct-chat direct-chat-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">Conversations</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body" style="height:505px;max-height: 505px;overflow-y:auto">
				<div class="container">
					
					<?php
						$arr = [];

						$q = mysqli_query($con,"select * from tblmessages where (fldSender = '$id' or fldRecipient = '$id') order by fldTime DESC");
						while ($qf = mysqli_fetch_array($q)) 
						{


							if($qf['fldSender'] == $id)
								$toAdd = $qf['fldRecipient'];
							else if($qf['fldRecipient'] == $id)
								$toAdd = $qf['fldSender'];

							if(!in_array($toAdd, $arr))
								array_push($arr, $toAdd);
							else
								continue;



							$sender = $qf['fldSender'];
							$recip = $qf['fldRecipient'];
							$msgID = $qf['fldMsgID'];
							$msg2 = $qf['fldMsg'];
							$type = $qf['fldType'];
							$time = $qf['fldTime'];
							$time = date("M d h:i A", strtotime($time));
							$read = $qf['fldRead'];

							

							$x = mysqli_query($con,"select * from tblusers where fldID = '$toAdd'");
							while($xf = mysqli_fetch_array($x))
							{
								$userName = $xf['fldFirstName'] . " " . $xf['fldLastName'];
								$userPic = $xf['fldImage'];
							}

						?>
							
							<a style="color:black" href="?p=message&partner=<?php echo $toAdd ?>"><div class="col-sm-12" id="chatContacts" style="padding: 4px;max-width: 100%;">
								<img class="img-circle" src="../images/users/<?php echo $userPic ?>" width="40px" alt="Message User Image"><!-- /.direct-chat-img -->
								<?php echo ucwords($userName) ?>
								<br>
								<?php
									if($type == 'Text')
									{
								?>
									<span style="font-weight: normal;padding-left:4px;word-wrap: break-word;"><?php if($sender == $id){ ?><span class="fa fa-mail-forward"></span><?php } ?> <?php echo substr($msg2, 0, 30) ?></span>
								<?php
									}
									else if($type == 'Image')
									{
								?>	
									<span style="font-weight: normal;padding-left:4px;word-wrap: break-word;"><?php if($sender == $id){ ?><span class="fa fa-mail-forward"></span><?php } ?> Sent a photo.</span>
								<?php
									}
								?>
								
								<br>
								<span style="font-size:10px;padding-left:4px" class="fa fa-clock-o"> <?php echo $time ?></span>

							</div></a>
							<hr>


						<?php
						}

					?>
					<br>					
				</div>
					 
				
			  
			   

			</div>
			<!-- /.box-body -->
		    
		<!-- box -->
			</div>
	</div>

<!-- divider -->

	<div class="col-sm-9">
		
		<div class="box box-primary direct-chat direct-chat-primary">
			<div class="box-header with-border">
			  <h3 class="box-title"><a href="?p=profile&user=<?php echo $partner ?>"><?php echo ucwords($user) ?></a></h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <!-- Conversations are loaded here -->
			  <div class="direct-chat-messages" id="chatbox">
			  	<?php
			  		$q = mysqli_query($con,"select * from tblmessages where (fldSender='$id' or fldRecipient = '$id') and (fldSender='$partner' or fldRecipient = '$partner')");
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
						      <img class="direct-chat-img" src="../images/users/<?php echo $pic ?>" alt="Message User Image"><!-- /.direct-chat-img -->
						     
						        
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
						      	<a class="example-image-link" href="../images/msg/<?php echo $msg ?>" data-lightbox="<?php echo $msg ?>"><img width="30%" style="margin-left:15px" data-toggle="tooltip" data-placement="top" title="<?php echo $time ?>" class="example-image" src="../images/msg/<?php echo $msg ?>" alt="image-1" /></a>
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
					          <img class="direct-chat-img" src="../images/users/<?php echo $adminpic ?>" alt="Message User Image"><!-- /.direct-chat-img -->
					          
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
						      	<a class="example-image-link" href="../images/msg/<?php echo $msg ?>" data-lightbox="<?php echo $msg ?>"><img width="30%" style="float:right;margin-right:15px;" data-toggle="tooltip" data-placement="top" title="<?php echo $time ?>" class="example-image" src="../images/msg/<?php echo $msg ?>" alt="image-1" /></a>
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
				        <img src="../images/attachment.png" style="margin-top:4px" height="25px" data-toggle="tooltip" data-placement="top" title="Send a picture"/>
				    </label>

				    <input id="file-input" name="img" id="img" onchange="oi()" type="file"/>
				</div>
		      </form>
		    </div>
		<!-- box -->
	<!-- ender -->	
	</div>
</div>





<script src="bower_components/lightbox/dist/lightbox-plus-jquery.min.js"></script>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{

		if(!empty($_FILES['img']['tmp_name']))
		{
			$directoryname = '../images/msg/';
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
			$msgSend = mysqli_real_escape_string($con,$_POST['messageSend']);
			$q = mysqli_query($con,"insert into tblmessages values ('','$msgSend','Text','$id','$partner','" . date("Y-m-d H:i:s") . "','no')");
			if($q)
			{
				echo "<script>window.location=window.location</script>";
			}	
		}

		
	}


?>