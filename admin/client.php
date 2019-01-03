

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Clients List
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <button data-toggle="modal" data-target="#addModal" class="btn btn-primary">Add Client</button>
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
                  <th>Name</th>
                  <th>Event(s)</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                     if($pos == 'CEO')
                      $q = mysqli_query($con,"select * from tblusers where fldPosition = 'Client' and fldArchive = 'no'");
                     else if($pos == 'Events Coordinator')
                     {
                      $q = mysqli_query($con,"SELECT *
                                        FROM tblusers
                                        WHERE fldArchive ='no' and CONCAT(fldFirstName, ' ', fldLastName) 
                                          in (SELECT fldClient FROM tblevents WHERE fldCoordinator = '$id')");
                     }
                      
                     while($qf = mysqli_fetch_array($q))
                     {
                      $id = $qf['fldID'];
                      $pic = $qf['fldImage'];
                      $status = $qf['fldOnline'];
                      $lastLog = $qf['fldLastLog'];
                      $clEmail = $qf['fldEmail'];
                      $firstName = $qf['fldFirstName'];
                      $lastName = $qf['fldLastName'];
                      $clName = $firstName . " " . $lastName;
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
                        <td><a href="?p=profile&user=<?php echo $id ?>"><img class="profile-user-img img-responsive img-circle" src="../images/users/<?php echo $pic ?>" alt="User profile picture"></a></td>
                        <td><a href="?p=profile&user=<?php echo $id ?>"><?php echo $coordinator ?></a></td>
                        <td> 
                            <?php
                              $r = mysqli_query($con,"select * from tblevents where fldEmail = '$clEmail' and fldClient = '$clName' and fldStatus !='Archive' limit 5");
                              $num = mysqli_num_rows($r);
                              if($num > 0)
                              {
                                while($rf = mysqli_fetch_array($r))
                                {
                                  $eventID = $rf['fldEventID'];
                                  $eventName = $rf['fldEventName'];
                                  $coorID = $rf['fldCoordinator'];
                                  $z = mysqli_query($con,"select * from tblusers where fldID = '$coorID'");
                                  $zf = mysqli_fetch_array($z);
                                  $coorName = $zf['fldFirstName'] . " " . $zf['fldLastName'];
                              ?>
                                <a href="?p=timeline&eventID=<?php echo $eventID ?>"><?php echo $eventName ?> (c/o <?php echo $coorName ?>)</a><br>
                              <?php
                                } 
                              }
                              else
                              {
                                echo "No events found!";
                              }
                            ?>
                        </td>
                        <td><?php echo $status ?></td>
                        <td>
                          <table>
                          
                            <tr>
                              <td style="padding:2px"><a style="width:100%" href="?p=message&partner=<?php echo $id ?>" data-toggle="tooltip" data-placement="top" title="Send a Message" class="btn btn-warning fa fa-comment"></a></td>
                              <td style="padding:2px"><a style="width:100%" href="?p=editClient&client=<?php echo $id ?>" data-toggle="tooltip" data-placement="top" title="Edit Details" class="btn btn-primary fa fa-edit"></a></td>
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
        <center><h3 class="col-2 modal-title text-center">Add Client</h3></center>
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

        <div class="row">
          <div class="col-md-4 col-xs-4 col-sm-4">
            <div class="form-group">
              <label>Client Name</label>
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
          <label>Address</label>
          <textarea class="form-control" rows="3" name="clientAddr" required placeholder="Complete Address..."></textarea>
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
    $email = $_POST['ecEmail'];
    $contact = $_POST['ecNumber'];
    $pword2 = rand(100000,999999);
    $pword = md5($pword2);
    $addr = mysqli_real_escape_string($con,$_POST['clientAddr']);
    $id = $_SESSION['id'];

    $q = mysqli_query($con,"insert into tblusers values ('','$uname','$pword','$fname','$mname','$lname','$addr','$email','$contact','" . date("Y-m-d H:i:s") ."','no','Client','nopic.png','-','0','no')");
    $q = mysqli_query($con,"select fldID from tblusers order by fldID DESC limit 1");
    $qf = mysqli_fetch_array($q);
    $partner = $qf[0];
    $q = mysqli_query($con,"insert into tblmessages values ('','Welcome to LTN Events website!','Text','$id','$partner','" . date("Y-m-d H:i:s") . "','no')");

    if($q)
    {
      echo "<script>alert('$name has been added as Client!');window.location = window.location</script>";
    }

  }

?>