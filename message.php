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
</style>

<script>
	window.onload=function () {
	     var objDiv = document.getElementById("chatbox");
	     objDiv.scrollTop = objDiv.scrollHeight;
	}
</script>

<?php 
	$partner = $_REQUEST['partner'];
	$q = mysqli_query($con,"select * from tblusers where fldID = '$partner'");
	$qf = mysqli_fetch_array($q);
	$user = $qf['fldFirstName'] . " " . $qf['fldLastName'];
	$pic = $qf['fldImage'];
	$x = mysqli_query($con,"select * from tblusers where fldID = '$id'");
	$xf = mysqli_fetch_array($x);
	$admin = $xf['fldFirstName'] . " " . $xf['fldLastName'];
	$adminpic = $xf['fldImage'];
?>

<div class="box box-primary direct-chat direct-chat-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Direct Chat</h3>

	  <div class="box-tools pull-right">
	    <span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">3</span>
	    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	    </button>
	    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
	      <i class="fa fa-comments"></i></button>
	    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	  </div>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
	  <!-- Conversations are loaded here -->
	  <div class="direct-chat-messages" id="chatbox">
	    <!-- Message. Default to the left -->
	    <div class="direct-chat-msg">
	      <div class="direct-chat-info clearfix">
	        <span class="direct-chat-name pull-left"><?php echo $user ?></span>
	        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
	      </div>
	      <!-- /.direct-chat-info -->
	      <img class="direct-chat-img" src="../images/users/<?php echo $pic ?>" alt="Message User Image"><!-- /.direct-chat-img -->
	      <div class="direct-chat-text" style="margin-left:15px;display: inline-block;">
	        This is a random text message.
	      </div>
	      <!-- /.direct-chat-text -->
	    </div>
	    <!-- /.direct-chat-msg -->

	    <!-- Message. Default to the left -->
	    <div class="direct-chat-msg">
	      <div class="direct-chat-info clearfix">
	        <span class="direct-chat-name pull-left"><?php echo $user ?></span>
	        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
	      </div>
	      <!-- /.direct-chat-info -->
	      <img class="direct-chat-img" src="../images/users/<?php echo $pic ?>" alt="Message User Image"><!-- /.direct-chat-img -->
	      <div class="direct-chat-text" style="margin-left:15px;display: inline-block;">
	        This is a random text message.
	      </div>
	      <!-- /.direct-chat-text -->
	    </div>
	    <!-- /.direct-chat-msg -->

	    <!-- Message. Default to the left -->
	    <div class="direct-chat-msg">
	      <div class="direct-chat-info clearfix">
	        <span class="direct-chat-name pull-left"><?php echo $user ?></span>
	        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
	      </div>
	      <!-- /.direct-chat-info -->
	      <img class="direct-chat-img" src="../images/users/<?php echo $pic ?>" alt="Message User Image"><!-- /.direct-chat-img -->
	      <div class="direct-chat-text" style="margin-left:15px;display: inline-block;max-width: 90%">
	        <img src="../images/event2.jpg" width="100%">
	      </div>
	      <!-- /.direct-chat-text -->
	    </div>
	    <!-- /.direct-chat-msg -->

	   <!-- Message to the right -->
        <div class="direct-chat-msg right">
          <div class="direct-chat-info clearfix">
            <span class="direct-chat-name pull-right"><?php echo $admin ?></span>
            <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
          </div>
          <!-- /.direct-chat-info -->
          <img class="direct-chat-img" src="../images/users/<?php echo $adminpic ?>" alt="Message User Image"><!-- /.direct-chat-img -->
          <div class="direct-chat-text" style="display: inline-block;float:right;margin-right: 15px;max-width: 90%">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </div>
          <!-- /.direct-chat-text -->
        </div>
        <!-- /.direct-chat-msg -->

	    <!-- Message. Default to the left -->
	    <div class="direct-chat-msg">
	      <div class="direct-chat-info clearfix">
	        <span class="direct-chat-name pull-left"><?php echo $user ?></span>
	        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
	      </div>
	      <!-- /.direct-chat-info -->
	      <img class="direct-chat-img" src="../images/users/<?php echo $pic ?>" alt="Message User Image"><!-- /.direct-chat-img -->
	      <div class="direct-chat-text" style="margin-left:15px;display: inline-block;">
	        This is a random text message.
	      </div>
	      <!-- /.direct-chat-text -->
	    </div>
	    <!-- /.direct-chat-msg -->

	    <!-- Message. Default to the left -->
	    <div class="direct-chat-msg">
	      <div class="direct-chat-info clearfix">
	        <span class="direct-chat-name pull-left"><?php echo $user ?></span>
	        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
	      </div>
	      <!-- /.direct-chat-info -->
	      <img class="direct-chat-img" src="../images/users/<?php echo $pic ?>" alt="Message User Image"><!-- /.direct-chat-img -->
	      <div class="direct-chat-text" style="margin-left:15px;display: inline-block;">
	        This is a random text message.
	      </div>
	      <!-- /.direct-chat-text -->
	    </div>
	    <!-- /.direct-chat-msg -->

	    <!-- Message. Default to the left -->
	    <div class="direct-chat-msg">
	      <div class="direct-chat-info clearfix">
	        <span class="direct-chat-name pull-left"><?php echo $user ?></span>
	        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
	      </div>
	      <!-- /.direct-chat-info -->
	      <img class="direct-chat-img" src="../images/users/<?php echo $pic ?>" alt="Message User Image"><!-- /.direct-chat-img -->
	      <div class="direct-chat-text" style="margin-left:15px;display: inline-block;">
	        This is a random text message.
	      </div>
	      <!-- /.direct-chat-text -->
	    </div>
	    <!-- /.direct-chat-msg -->

	    <!-- Message. Default to the left -->
	    <div class="direct-chat-msg">
	      <div class="direct-chat-info clearfix">
	        <span class="direct-chat-name pull-left"><?php echo $user ?></span>
	        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
	      </div>
	      <!-- /.direct-chat-info -->
	      <img class="direct-chat-img" src="../images/users/<?php echo $pic ?>" alt="Message User Image"><!-- /.direct-chat-img -->
	      <div class="direct-chat-text" style="margin-left:15px;display: inline-block;">
	        This is a random text message.
	      </div>
	      <!-- /.direct-chat-text -->
	    </div>
	    <!-- /.direct-chat-msg -->

	    <!-- Message. Default to the left -->
	    <div class="direct-chat-msg">
	      <div class="direct-chat-info clearfix">
	        <span class="direct-chat-name pull-left"><?php echo $user ?></span>
	        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
	      </div>
	      <!-- /.direct-chat-info -->
	      <img class="direct-chat-img" src="../images/users/<?php echo $pic ?>" alt="Message User Image"><!-- /.direct-chat-img -->
	      <div class="direct-chat-text" style="margin-left:15px;display: inline-block;">
	        This is a random text message.
	      </div>
	      <!-- /.direct-chat-text -->
	    </div>
	    <!-- /.direct-chat-msg -->

	    <!-- Message. Default to the left -->
	    <div class="direct-chat-msg">
	      <div class="direct-chat-info clearfix">
	        <span class="direct-chat-name pull-left"><?php echo $user ?></span>
	        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
	      </div>
	      <!-- /.direct-chat-info -->
	      <img class="direct-chat-img" src="../images/users/<?php echo $pic ?>" alt="Message User Image"><!-- /.direct-chat-img -->
	      <div class="direct-chat-text" style="margin-left:15px;display: inline-block;">
	        This is a random text message.
	      </div>
	      <!-- /.direct-chat-text -->
	    </div>
	    <!-- /.direct-chat-msg -->
	  </div>
	  <!--/.direct-chat-messages-->

	  

	  <!-- Contacts are loaded here -->  
	  <div class="direct-chat-contacts">
	    <ul class="contacts-list">
	      <li>
	        <a href="#">
	          <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg" alt="User Image">

	          <div class="contacts-list-info">
	                <span class="contacts-list-name">
	                  Count Dracula
	                  <small class="contacts-list-date pull-right">2/28/2015</small>
	                </span>
	            <span class="contacts-list-msg">How have you been? I was...</span>
	          </div>
	          <!-- /.contacts-list-info -->
	        </a>
	      </li>
	      <!-- End Contact Item -->
	    </ul>
	    <!-- /.contatcts-list -->
	  </div>
	  <!-- /.direct-chat-pane -->
	</div>
<!-- /.box-body -->
    <div class="box-footer">
      <form action="#" method="post">
        <div class="input-group">
          <input type="text" name="message" placeholder="Type Message ..." class="form-control">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-primary btn-flat">Send</button>
              </span>
        </div>
      </form>
    </div>