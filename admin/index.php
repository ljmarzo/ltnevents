<?php
  require('require.php');
  if(!isset($_SESSION['id'])){
    echo "<script>window.location='login.php'</script>";
  }
  else
  {
    $id = $_SESSION['id'];
    $loggedID = $id;
    $q = mysqli_query($con,"select * from tblusers where fldID = '$id'");
    $qf = mysqli_fetch_array($q);
    $logged = $qf['fldFirstName'] . " " . $qf['fldLastName'];
    $loggedPos = $qf['fldPosition'];
    $pic = $qf['fldImage'];
    $pos = $qf['fldPosition'];
  }
?>


<?php
  //function for time elapsed
  
          function timeAgo($time_ago)
          {
            $time_ago = strtotime($time_ago);
            $cur_time   = time();
            $time_elapsed   = $cur_time - $time_ago;
            $seconds    = $time_elapsed ;
            $minutes    = round($time_elapsed / 60 );
            $hours      = round($time_elapsed / 3600);
            $days       = round($time_elapsed / 86400 );
            // Seconds
            if($seconds <= 60){
              return "just now";
            }
            //Minutes
            else if($minutes <=60){
              if($minutes==1){
                return "one minute ago";
              }
              else{
                return "$minutes minutes ago";
              }
            }
            //Hours
            else if($hours <=24){
              if($hours==1){
                return "an hour ago";
              }else{
                return "$hours hrs ago";
              }
            }
            //Days
            else if($days <= 30){
              if($days==1){
                return "yesterday";
              }else{
                return "$days days ago";
              }
            }
            
            
            
          }
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LTN EVENTS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="icon" href="../images/ltnevents.ico">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="?p=dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>LTN</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>LTN Events</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <?php
        $q = mysqli_query($con,"select * from tblmessages where fldRecipient = '$id' and fldRead = 'no' group by fldSender");
        $newmsg = mysqli_num_rows($q);
      ?>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <?php if($newmsg>0){ ?><span class="label label-success"><?php echo $newmsg ?></span> <?php } ?>
            </a>
            <ul class="dropdown-menu" style="width: 400px;">
              <li class="header">You have <?php echo $newmsg ?> new message(s)</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php
                    while($qf = mysqli_fetch_array($q))
                    {
                      $msgTime = $qf['fldTime'];
                      $msgContent = $qf['fldMsg'];
                      $msgContent = substr($msgContent, 0, 50);
                      $sender = $qf['fldSender'];

                      $v = mysqli_query($con,"select * from tblusers where fldID = '$sender'");
                      $vf = mysqli_fetch_array($v);
                      $senderName = $vf['fldFirstName'] . " " . $vf['fldLastName'];
                      $senderImg = $vf['fldImage'];
                  ?>
                     <li><!-- start message -->
                    <a href="?p=message&partner=<?php echo $sender ?>">
                      <div class="pull-left">
                        <img src="../images/users/<?php echo $senderImg ?>" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        <?php echo $senderName ?>
                        <small><i class="fa fa-clock-o"></i> <?php echo timeAgo($msgTime); ?></small>
                      </h4>
                      <p><?php echo $msgContent ?></p>
                    </a>
                  </li>
                  <!-- end message -->
                  <?php
                    }
                  ?>
                 
                </ul>
              </li>
              <li class="footer"><a href="?p=message">See All Messages</a></li>
            </ul>
          </li>
          
          <!-- Tasks: style can be found in dropdown.less -->
          <?php
            $inqQ = mysqli_query($con,"select * from tblinquiry where fldRead ='no' order by fldID DESC");
            $numInq = mysqli_num_rows($inqQ);
            
          ?>
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <?php 
                if ($numInq > 0){
              ?>
                  <span class="label label-danger"><?php echo $numInq ?></span>
              <?php
              }
              ?>
              
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $numInq ?> new inquiry</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php
                    while($inqQf = mysqli_fetch_array($inqQ))
                    {
                      $eventNameInq = $inqQf['fldEventName'];
                      $clientNameInq = $inqQf['fldName'];
                  ?>
                     <li><!-- Task item -->
                        <a href="?p=inquiries">
                          <h3>
                            <?php echo $eventNameInq ?>
                            <br>
                            <p style="font-size:12px"><?php echo $clientNameInq ?></p>
                          </h3>
                          
                        </a>
                      </li>
                      <!-- end task item -->

                  <?php
                    }
                    
                  ?>
                 
                </ul>
              </li>
              <li class="footer">
                <a href="?p=inquiries">View all inquiries</a>
              </li>
            </ul>
          </li>


          <?php
            $revQ = mysqli_query($con,"select * from tblcomments where fldRead ='no' order by fldComID DESC");
            $numRev = mysqli_num_rows($revQ);
            
          ?>
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-star-o"></i>
              <?php 
                if ($numRev > 0){
              ?>
                  <span class="label label-danger"><?php echo $numRev ?></span>
              <?php
              }
              ?>
              
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $numRev ?> new review</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php
                    while($revQf = mysqli_fetch_array($revQ))
                    {
                      $revName = $revQf['fldUser'];
                      $revCont = $revQf['fldContent'];
                  ?>
                     <li><!-- Task item -->
                        <a href="?p=reviews">
                          <h3>
                            <?php echo substr($revCont, 0,30) ?>
                            <br>
                            <p style="font-size:12px"><?php echo $revName ?></p>
                          </h3>
                          
                        </a>
                      </li>
                      <!-- end task item -->

                  <?php
                    }
                    
                  ?>
                 
                </ul>
              </li>
              <li class="footer">
                <a href="?p=reviews">View all reviews</a>
              </li>
            </ul>
          </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../images/users/<?php echo $pic ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $logged ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../images/users/<?php echo $pic ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $logged . " <br> <small>"  . $pos . "</small>"; ?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="?p=profile&user=<?php echo $id ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="?p=logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../images/users/<?php echo $pic ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="font-size: 13px;"><?php echo $logged ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
  <br>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="?p=dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Events</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=addevents">Add Event</a></li>
            <li><a href="?p=events">View Events</a></li>
          </ul>
        </li>
        <?php
          if($pos=='Events Coordinator')
          {
        ?>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Accounts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=client">Clients</a></li>
          </ul>
        </li>
        <?php
          }
          if($pos=='CEO')
          {
        ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Accounts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=eventCoor">Event Coordinators</a></li>
            <li><a href="?p=client">Clients</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil"></i> <span>Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../ltn.php?p=blog" target="_blank">View Blog</a></li>
            <li><a href="?p=blogTimeline">View Blog Entries</a></li>
            <li><a href="?p=addblog">Add Blog Entry</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-picture-o"></i> <span>Portfolio</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=portfolio">Add portfolio</a></li>
            <li><a href="../ltn.php?p=portfolio" target="_blank">View Portfolio</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-file"></i> <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pdfevents.php" target="_blank">Events</a></li>
            <li><a href="pdfclients.php" target="_blank">Clients</a></li>
            <li><a href="pdfreviews.php" target="_blank">Reviews</a></li>
            <li><a href="pdfcluster.php" target="_blank">Cluster</a></li>
          </ul>
        </li>
                <?php   
          }
        ?>
        

       
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content">
     <?php
          if(!isset($_REQUEST['p']))
            include("dashboard.php");
          else
          { 
            $page = $_GET['p'];
            include($page . ".php");
          }
        ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018 </strong> All rights reserved.
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>



</body>
</html>
