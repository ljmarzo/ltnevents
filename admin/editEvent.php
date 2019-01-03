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
	$eventID = $_REQUEST['eventID'];
	$q = mysqli_query($con,"select * from tblevents where fldEventID = '$eventID'");
	$qf = mysqli_fetch_array($q);
  $status = $qf['fldStatus'];
  $evType = $qf['fldEventType'];
  $dateTime = $qf['fldEventDateTime'];
  $dateTime = str_replace("-","/",$dateTime);
  $dateTime = date("Y-m-d\TH:i:s",strtotime($dateTime));
  
  //2018-06-07T00:00
  echo $dateTime;
?>



<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      	Edit Client Details
      </h1>
    </section>
    <br>
<form method="post">
<div class="box">
    <div class="box-header with-border">
      <h1 class="box-title"><?php echo $qf['fldEventName']  ?></h1>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      
        <div class="form-group">
          <label>Event Title</label>
          <input type="text" value="<?php echo $qf['fldEventName']  ?>" name="eventName" required class="form-control" placeholder="Event Title...">
        </div>

         <div class="form-group">
          <label>Event Type</label>
            <?php echo $evType; ?>
            <select required onchange="showSpecify(this.value)" name="eventType" class="form-control">
                <?php
                   
                    if($evType == 'Wedding')
                    {
                ?>
                    <option value="" disabled>--Select One--</option>
                    <option selected value="Wedding">Wedding</option>
                    <option value="Birthday">Birthday</option>
                    <option value="Corporate">Corporate</option>
                    <option value="Others">Others</option>
                <?php
                    }
                    else if($evType == 'Birthday')
                    {
                ?>
                    <option value="" disabled>--Select One--</option>
                    <option value="Wedding">Wedding</option>
                    <option selected value="Birthday">Birthday</option>
                    <option value="Corporate">Corporate</option>
                    <option value="Others">Others</option>
                <?php
                    }
                    else if($evType == 'Corporate')
                    {
                ?>
                    <option value="" disabled>--Select One--</option>
                    <option value="Wedding">Wedding</option>
                    <option value="Birthday">Birthday</option>
                    <option selected value="Corporate">Corporate</option>
                    <option value="Others">Others</option>
                <?php
                    }
                ?>
                
            </select>
           
            
          </select>
          <br>
          <span id="specifySpan" class="hidden">Please specify: <input type="text" id="eventTypeOthers" name="eventTypeOthers" placeholder="Specify Event..." class="form-control"></span>
        </div>

        <div class="form-group">
          <label>Target Venue</label>
          <textarea class="form-control" rows="3" name="venueAddr" required placeholder="Complete Venue Address..."><?php echo $qf['fldEventVenue']  ?></textarea>
        </div>

        <div class="form-group">
          <label>Target Date and Time</label>
          <input type="datetime-local" required name="eventDateTime" value="<?php echo $dateTime ?>" class="form-control">
        </div>

        <div class="row">
          <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
            <div class="form-group">
              <label>Event Price</label>
              <div class="input-group">
              <span class="input-group-addon"><i>PHP</i></span>
              <input type="number" required name="eventPrice" value="<?php echo $qf['fldCost']  ?>" class="form-control" min="1">
            </div>
            </div>
          </div>
          
          
        </div>

         <div class="form-group">
          <label>Event Status</label>

            <input type="text" required name="eventStatus" class="form-control" value="<?php echo $qf['fldStatus'] ?>">  
          </select>
        </div>

        <div class="form-group">
          <label>Event Notes</label>
          <textarea class="form-control" rows="3" name="notes" required placeholder="Event Notes..."><?php echo $qf['fldNotes']  ?></textarea>
        </div>
    
        <input type="submit" class="btn btn-success" name="editDetails" value="Save Changes">
        </form>
        <a href="?p=events" class="btn btn-default">Cancel</a>
        
    </div>


    <!-- /.box-body -->

  </div>
  <!-- /.box -->


<?php
	if(isset($_POST['editDetails']))
  {
    

    $eventName = mysqli_real_escape_string($con,$_POST['eventName']);
    $eventType = $_POST['eventType'];
    if($eventType == "Others")
    {
      $eventType = mysqli_real_escape_string($con,$_POST['eventTypeOthers']);
    }
    $eventVenue = mysqli_real_escape_string($con,$_POST['venueAddr']);
    $originalDate = $_POST['eventDateTime'];
    $eventDateTime = date("m-d-Y h:i A", strtotime($originalDate));
    $eventNotes = mysqli_real_escape_string($con,$_POST['notes']);
    $eventPrice = $_POST['eventPrice'];
    $eventStatus = mysqli_real_escape_string($con,$_POST['eventStatus']);

    $q = mysqli_query($con,"update tblevents set fldEventName = '$eventName', fldEventType = '$eventType', fldEventVenue = '$eventVenue', fldEventDateTime = '$eventDateTime', fldNotes = '$eventNotes', fldCost = '$eventPrice', fldDownpayment = '0', fldStatus = '$eventStatus' where fldEventID = '$eventID'");
    if($q)
      echo "<script>alert('Event Details updated!');window.location='?p=events'</script>";





  }

?>












      