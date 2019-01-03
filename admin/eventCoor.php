

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Events Coordinator List
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <button data-toggle="modal" data-target="#addModal" class="btn btn-primary">Add Event Coordinator</button>
      <br>
      <br>
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
                  <th>&emsp;</th>
                  <th>Coordinator</th>
                  <th>Recent Engagement(s)</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                     $q = mysqli_query($con,"select * from tblusers where fldPosition = 'Events Coordinator' order by fldFirstName");
                     while($qf = mysqli_fetch_array($q))
                     {
                      $id = $qf['fldID'];
                      $pic = $qf['fldImage'];
                      $status = $qf['fldOnline'];
                      $lastLog = $qf['fldLastLog'];
                      if($lastLog == "-")
                        $lastLog = "No history";
                      else
                        $lastLog = timeAgo($qf['fldLastLog']);
                      $coordinator = $qf['fldFirstName'] . " " . $qf['fldLastName'];
                      if($status == 1)
                        $status = 'Online';
                      else
                        $status = 'Last online: ' . $lastLog;
                  ?>
                      <tr>
                        <a href="?p=profile&user=<?php echo $id ?>"><td><img class="profile-user-img img-responsive img-circle"  style="height:100px !important; width:100px !important"  src="../images/users/<?php echo $pic ?>" alt="User profile picture"></td></a>
                        <td><a href="?p=profile&user=<?php echo $id ?>"><?php echo $coordinator ?></a></td>
                        <td> 
                            <?php
                              $r = mysqli_query($con,"select * from tblevents where fldCoordinator = '$id' limit 5");
                              $num = mysqli_num_rows($r);
                              if($num > 0)
                              {
                                while($rf = mysqli_fetch_array($r))
                                {
                                  $eventName = $rf['fldEventName'];
                              ?>
                                <a href="#"><?php echo $eventName ?></a><br>
                              <?php
                                } 
                              }
                              else
                              {
                                echo "No engagements found!";
                              }
                            ?>
                        </td>
                        <td><?php echo $status ?></td>
                        <td>
                          <table>
                          
                            <tr>
                              <td style="padding:2px"><a style="width:100%" href="?p=message&partner=<?php echo $id ?>" data-toggle="tooltip" data-placement="top" title="Send a Message" class="btn btn-warning fa fa-comment"></a></td>
                              <td style="padding:2px"><a style="width:100%" href="?p=editCoor&coordinator=<?php echo $id ?>" data-toggle="tooltip" data-placement="top" title="Edit Details" class="btn btn-primary fa fa-edit"></a></td>
                              <td style="padding:2px"><a style="width:100%" onclick="return confirm('Are you sure you want to delete this record? Changes cannot be undone.')" href="?p=archive&client=<?php echo $id ?>" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger fa fa-trash"></a></td>
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
        <center><h3 class="col-2 modal-title text-center">Add Events Coordinator</h3></center>
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
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
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


    $q = mysqli_query($con,"insert into tblusers values ('','$uname','$password','$fname','$mname','$lname','-','$email','$contact','" . date("Y-m-d H:i:s") ."','yes','Events Coordinator','nopic.png','-','0','no')");

    if($q)
    {
      echo "<script>alert('$name has been added as Event Coordinator!');window.location = window.location</script>";
    }

  }

?>