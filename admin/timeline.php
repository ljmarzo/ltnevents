
<?php
	$eventID = $_REQUEST['eventID'];

?>




<body class="hold-transition skin-blue sidebar-mini">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Events Timeline
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">         
           <ul class="timeline">
           		<?php
           			$q = mysqli_query($con,"select * from tbltimeline where fldEventID = '$eventID' order by fldTimePosted DESC");
           			$carID = 0;
           			while($qf = mysqli_fetch_array($q))
           			{
           				
           				$dateTL = $qf['fldTimePosted'];
           				$dateTL = date("M. d, Y", strtotime($dateTL));
           				$TLID = $qf['fldTLID'];
           				$titleTL = $qf['fldTitle'];
           				$content = $qf['fldContent'];
           				$origcontent = $qf['fldContent'];

           				$posterID = $qf['fldPoster'];
           				$x = mysqli_query($con,"select * from tblusers where fldID = '$posterID'");
           				$xf = mysqli_fetch_array($x);
           				$posterName = $xf['fldFirstName'] . " " . $xf['fldLastName'];
           				
           				$postTime = $qf['fldTimePosted'];
           				$postTime = timeAgo($postTime);
           		?>
           			<li class="time-label">
           				<span class="bg-blue">
           					<?php echo $dateTL ?>
           				</span>
           			</li>

           			<li>
           				<i class="fa fa-comments bg-yellow"></i>
           				<div class="timeline-item">
           					<span class="time">by <?php echo $posterName ?>&emsp;<i class="fa fa-clock-o"></i> <?php echo $postTime ?></span>
				            <h3 class="timeline-header"><?php echo $titleTL ?></h3>
				            <div class="timeline-body" style="font-weight: normal;">
				            	<!-- carousel -->
				            	<div class="row">

				            	 <div class="box box-solid">
						            <!-- /.box-header -->
						            <div class="box-body col-sm-6">
						               <?php
						                	$v = mysqli_query($con,"select * from tbltimelinepic where fldEventID = '$eventID' and fldTimelineID = '$TLID'");
						                	$numV = mysqli_num_rows($v);
						                	
						                	if($numV >0)
						                	{
						               ?>
						                
						               
						                
						              <div id="carousel-example-generic<?php echo $carID; ?>" class="carousel slide" data-ride="carousel">
						                <ol class="carousel-indicators">
						                  <?php
						                  	$v = mysqli_query($con,"select * from tbltimelinepic where fldEventID = '$eventID' and fldTimelineID = '$TLID'");
						                  	$vID = 0;
						                  	
						                  	
						                  	while($vf = mysqli_fetch_array($v))
						                  	{
						                  ?>
						                  		<li data-target="#carousel-example-generic<?php echo $carID; ?>" data-slide-to="<?php echo $vID ?>" class="<?php if($vID == 0) { echo "active"; } ?>"></li>

						                  <?php
						                  		$vID++;
						                  	}
						                  ?>
						                </ol>
						                <div class="carousel-inner">
						                	  <?php
							                  	$v = mysqli_query($con,"select * from tbltimelinepic where fldEventID = '$eventID' and fldTimelineID = '$TLID'");
							                  	$vID2 = 0;
							                  	$numV = mysqli_num_rows($v);
							                  	while($vf = mysqli_fetch_array($v))
							                  	{
							                  ?>
							                  		<div class="item <?php if($vID2 == 0) { echo "active"; } ?>">
									                	<img style="height:350px !important" width="100%" src="../images/timeline/<?php echo $eventID . "/" . "/" . $TLID . "/" . $vf['fldPicture'] ?>">
									                </div>

							                  <?php
							                  		$vID2++;
							                  	}
							                  ?>
						                </div>
						                <a class="left carousel-control" href="#carousel-example-generic<?php echo $carID; ?>" data-slide="prev">
						                  <span class="fa fa-angle-left"></span>
						                </a>
						                <a class="right carousel-control" href="#carousel-example-generic<?php echo $carID; ?>" data-slide="next">
						                  <span class="fa fa-angle-right"></span>
						                </a>
						              </div>
						              
						              <?php	
						                	}
						               
						               ?>
						                
						            </div>
						            <!-- /.box-body -->
						          </div>
						        <!-- /.box -->
					            <!-- carousel end-->				            		
				            	</div>

					            <?php
				            		$c = mysqli_query($con,"select * from tbltimelinepic where fldTimelineID = '$TLID'");
				            		while($cf = mysqli_fetch_array($c))
				            		{
				            	?>	
				            			

				            	<?php		
				            		}
				            	?>

				            	<!-- content timeline -->
				            	<?php 
				                	if(count_chars($content) > 200)
				                	{
				                		$content = substr($content, 0,300) . "...";
				                	}
				                	echo nl2br($content); 
				                ?>
				            	<!-- /content timeline -->
			            	</div>
			            	<div class="timeline-footer">

				                <a href="?p=editContent&TLID=<?php echo $TLID ?>&eventID=<?php echo $eventID ?>" id="editBtn" class="btn btn-primary btn-xs">Edit</a>
				                <a href="?p=deleteTimeline&TLID=<?php echo $TLID ?>&eventID=<?php echo $eventID ?>" onclick="return confirm('Are you sure you want to delete this timeline entry? Changes cannot be reverted.')" id="deleteBtn" class="btn btn-danger btn-xs">Delete</a>
				            </div>
				            

           				</div>


           			</li>


           		<?php
           			$carID = $carID + 1;
           			}
           		?>
			</ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  



</body>


