

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Events List
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Client Name</th>
                  <th>Event Name</th>
                  <th>Event Type</th>
                  <th>Venue</th>
                  <th>Date and Time</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  	 if($loggedPos == 'Developer' or $loggedPos == 'Admin' or $loggedPos == 'CEO')
                  	 {
                  	 	$q = mysqli_query($con,"select * from tblevents where fldStatus !='Archive' order by fldEventID DESC");	
                  	 }
                     else
                     {
                     	$q = mysqli_query($con,"select * from tblevents where fldStatus !='Archive' and fldCoordinator = '$id' order by fldEventID DESC");
                     }
                     while($qf = mysqli_fetch_array($q))
                     {
                      $clientName = $qf['fldClient'];
                      $eventID = $qf['fldEventID'];
                      $eventName = $qf['fldEventName'];
                      $eventVenue = $qf['fldEventVenue'];
                      $eventType = $qf['fldEventType'];
                      $eventDateTime = $qf['fldEventDateTime'];
                      $status = $qf['fldStatus'];
                      $contactNum = $qf['fldNumber'];

                  ?>
                      <tr>
                        <td><?php echo $clientName ?></td>
                        <td><?php echo $eventName ?></td>
                        <td><?php echo $eventType ?></td>
                        <td><?php echo $eventVenue ?></td>
                        <td><?php echo $eventDateTime ?></td>
                        <td><?php echo $status ?></td>
                        <td>
                        	<table>
                        		<tr>
                        			<td style="padding:2px"><a style="width:100%"; href="?p=timeline&eventID=<?php echo $eventID ?>" data-toggle="tooltip" data-placement="top" title="View Timeline" class="btn btn-info fa fa-newspaper-o"></a></td>
                        			<td style="padding:2px"><a style="width:100%" href="?p=addtimeline&eventID=<?php echo $eventID ?>" data-toggle="tooltip" data-placement="top" title="Add an Update" class="btn btn-warning fa fa-plus-square"></a></td>
                        		</tr>
                        		<tr>
                        			<td style="padding:2px"><a style="width:100%" href="?p=editEvent&eventID=<?php echo $eventID ?>" data-toggle="tooltip" data-placement="top" title="Edit Details" class="btn btn-primary fa fa-edit"></a></td>
                        			<td style="padding:2px"><a style="width:100%" onclick="return confirm('Do you really want to delete this record?')" href="?p=archiveEvent&eventID=<?php echo $eventID ?>" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger fa fa-trash"></a></td>
                        		</tr>
                        	</table>     	
                        </td>
                      </tr>
                  <?php
                     }
                  ?>                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  
<!-- Book Modal -->
<form method="post">
<div class="modal fade" id="addModal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <center><h3 class="col-2 modal-title text-center">Events</h3></center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <div class="form-group">
          <label>Username</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" required name="ecUsername" class="form-control" placeholder="Username...">
          </div>
        </div>

        <div class="form-group">
          <label>Password</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-eye"></i></span>
            <input type="password" required name="ecPassword" class="form-control" placeholder="Password...">
          </div>
        </div>

        <div class="form-group">
          <label>Confirm Password</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-eye"></i></span>
            <input type="password" required name="ecConfirm" class="form-control" placeholder="Confirm Password...">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 col-xs-4 col-sm-4">
            <div class="form-group">
              <label>Coordinator Name</label>
              <div class="input-group">
                <input type="text" required name="ecFirst" class="form-control" placeholder="First Name...">
              </div>
            </div>
          </div>

           <div class="col-md-4 col-xs-4 col-sm-4">
            <div class="form-group">
              <label>&emsp;</label>
              <div class="input-group">
                <input type="text" name="ecMid" class="form-control" placeholder="Middle Name...">
              </div>
            </div>
          </div>

          <div class="col-md-4 col-xs-4 col-sm-4">
            <div class="form-group">
              <label>&emsp;</label>
              <div class="input-group">
                <input type="text" required name="ecLast" class="form-control" placeholder="Last Name...">
              </div>
            </div>
          </div>

        </div>

        <div class="form-group">
          <label>Contact Number</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            <input type="text" required name="ecNumber" class="form-control" placeholder="+639xxxxxxxxx">
          </div>
        </div>

        <div class="form-group">
          <label>Email</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="text" required name="ecEmail" class="form-control" placeholder="Email...">
          </div>
        </div>
        

      </div>



      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" name="addSubmit" value="Add Coordinator" class="btn btn-info"></form>
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>

      </div>

    </div>
  </div>
</div>





<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>

<script>
  $(function () {
   
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'order'       : []
    })
  })
</script>
</body>



<?php
  if(isset($_POST['addSubmit']))
  {
    $fname = $_POST['ecFirst'];
    $mname = $_POST['ecMid'];
    $lname = $_POST['ecLast'];
    $name = $fname . " " . $lname;
    $uname = $_POST['ecUsername'];
    $password = md5($_POST['ecPassword']);
    $email = $_POST['ecEmail'];
    $contact = $_POST['ecNumber'];


    $q = mysqli_query($con,"insert into tblusers values ('','$uname','$password','$fname','$mname','$lname','-','$email','$contact','" . date("Y-m-d H:i:s") ."','yes','Events Coordinator','nopic.png','-','0')");

    if($q)
    {
      echo "<script>alert('$name has been added as Event Coordinator!');window.location = window.location</script>";
    }

  }

?>