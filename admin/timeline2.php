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
           			$q = mysqli_query($con,"select * from tblTimeline where fldEventID = '$eventID' order by fldTimePosted DESC");
           			while($qf = mysqli_fetch_array($q))
           			{
           				$dateTL = $qf['fldTimePosted'];
           				$dateTL = date("M. d, Y", strtotime($dateTL));
           				$TLID = $qf['fldEntryID'];
           				$titleTL = $qf['fldTitle'];
           				$content = $qf['fldContent'];

           				$posterID = $qf['fldPoster'];
           				$x = mysqli_query($con,"select * from tblUsers where fldID = '$posterID'");
           				$xf = mysqli_fetch_array($x);
           				$posterName = $xf['fldFirstName'] . " " . $xf['fldLastName'];
           		?>
           			<li class="time-label">
           				<span class="bg-blue">
           					<?php echo $dateTL ?>
           				</span>
           			</li>
           			<li>
			        <!-- timeline icon -->
			        <i class="fa fa-comments bg-yellow"></i>
				        <div class="timeline-item">
				            <span class="time">by <?php echo $posterName ?>&emsp;<i class="fa fa-clock-o"></i> 12:05</span>

				            <h3 class="timeline-header"><?php echo $titleTL ?></h3>

				            <div class="timeline-body">
				            	
				            		
				            
				            	
				            	<?php
				            		$c = mysqli_query($con,"select * from tblTimelinePic where fldTimelineID = '$TLID'");
				            		while($ef = mysqli_fetch_assoc($c)){
										$rows[] =$ef;
									}
				            		$cnum = mysqli_num_rows($c);
				            		if($cnum > 1)
				            		{
				            	?>
				            			<div class="box box-solid">
								            <!-- /.box-header -->
								            <div class="box-body col-sm-4">
								              <div id="lightbox" class="carousel slide" data-ride="carousel">
												<ol class="carousel-indicators">
														<?php
															$i = 1; 
															foreach ($rows as $r): 
															$ol_class = ($i == 1) ? 'active' : ''; 
														?>
														 
														<li data-target="#lightbox" data-slide-to="<?php echo $i;?>"  class="<?php echo $ol_class; ?>"></li>
														<?php $i++; ?>
														<?php endforeach; ?> 
												</ol>
												<div class="carousel-inner" style="max-width:350px; max-height:300px">
														<?php
														$i = 1; 
														foreach ($rows as $r): 
														$item_class = ($i == 1) ? 'item active' : 'item'; //Set class active for image which is showing
														?>              
														<div class="<?php echo $item_class; ?>"> 
															<img height="300px" width="100%" src="../images/timeline/<?php echo $TLID ?>/<?php echo $r['fldPicture'] ?>">

														</div>
														<?php $i++; ?>
														<?php endforeach; ?> 
												</div>
												<a class="left carousel-control" href="#lightbox" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
												<a class="right carousel-control" href="#lightbox" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
											</div>
								            <!-- /.box-body -->
								          </div>
								          <!-- /.box -->
									<?php
					            		}
					            		else
					            		{

						            		while($cf = mysqli_fetch_array($c))
						            		{
					            	?>
					            				<img width="100%" height="100%" src="../images/timeline/<?php echo $TLID . "/" . $cf['fldPicture'] ?>">
					            	<?php
					            			}
					            		}
					            	?>
			            	</div>
				                <?php 
				                	if(count_chars($content) > 200)
				                	{
				                		$content = substr($content, 0,300) . "...";
				                	}
				                	echo nl2br($content); 
				                ?>
				   

				            <div class="timeline-footer">
				                <a class="btn btn-primary btn-xs">Edit</a>
				                <a class="btn btn-danger btn-xs">Delete</a>
				            </div>
				        </div>
				    </li>

           		<?php
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


