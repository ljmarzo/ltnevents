<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
    </section>
    <br>
<!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php
                if($id == '1')
                  $q = mysqli_query($con,"select * from tblevents where fldStatus !='Archive'");
                else
                  $q = mysqli_query($con,"select * from tblevents where fldStatus !='Archive' and fldCoordinator = '$id'");
                $numQ = mysqli_num_rows($q);
                echo $numQ;

              ?></h3>

              <p>Events</p>
            </div>
            <div class="icon">
              <i class="fa fa-birthday-cake"></i>
            </div>
            <a href="?p=events" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php $q = mysqli_query($con,"select * from tblinquiry"); $numInq = mysqli_num_rows($q); echo $numInq ?></h3>

              <p>Inquiries</p>
            </div>
            <div class="icon">
              <i class="fa fa-question-circle"></i>
            </div>
            <a href="?p=inquiries" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php
                if($pos == 'CEO')
                  $q = mysqli_query($con,"select * from tblusers where fldPosition = 'Client' and fldArchive !='yes'");
                else
                  $q = mysqli_query($con,"select DISTINCT(fldClient) from tblevents where fldCoordinator = '$id'");
                
                $numQ = mysqli_num_rows($q);
                echo $numQ;

              ?>
              </h3>

              <p>Clients</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?p=client" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php
                $q = mysqli_query($con,"select sum(fldViews) from tblpageviews");
                $qf = mysqli_fetch_array($q);
                echo $qf[0];
              ?></h3>

              <p>User Visits</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer"><i>&emsp;</i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->


      

      <div class="row">
        <div class="col-sm-8 col-md-8 col-xs-12">
      <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Events</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date & Time</th>
                    <th>Client</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if($id=='1')
                    $q = mysqli_query($con,"select * from tblevents where fldStatus != 'Archive' order by fldEventID DESC limit 6");
                    else
                    $q = mysqli_query($con, "select * from tblevents where fldStatus != 'Archive' and fldCoordinator = '$id' order by fldEventID desc limit 6");
                    while($qf = mysqli_fetch_array($q))
                    {
                  ?>
                    <tr>
                      <td><?php echo $qf['fldEventID'] ?></td>
                      <td><?php echo $qf['fldEventName'] ?></td>
                      <td><?php echo $qf['fldEventDateTime'] ?></td>
                      <td><?php echo $qf['fldClient'] ?></td>
                      <td><?php echo $qf['fldStatus'] ?></td>
                    </tr>

                  <?php
                    }
                  ?>
                  
                 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="?p=addevents" class="btn btn-sm btn-info btn-flat pull-left">Add a New Event</a>
              <a href="?p=events" class="btn btn-sm btn-default btn-flat pull-right">View All Events</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
          </div>

           <div class="col-md-4 col-xs-12 col-lg-4">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">8 New Members</span>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                   
                    <?php
                      $q = mysqli_query($con,"select * from tblusers where fldPosition = 'Client' and fldArchive = 'no' order by fldID DESC limit 8");
                      while($qf = mysqli_fetch_array($q))
                      {
                    ?>
                       <li>
                        <img src="../images/users/<?php echo $qf['fldImage'] ?>" alt="User Image">
                        <a class="users-list-name" href="?p=profile&user=<?php echo $qf['fldID'] ?>"><?php echo $qf['fldFirstName'] . " " . $qf['fldLastName'] ?></a>
                        <span class="users-list-date">Today</span>
                      </li>
                    <?php
                      }

                    ?>
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="?p=client" class="uppercase">View All Clients</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->
</div>

<!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Quick Email</h3>
             
            </div>
            <div class="box-body">
              <form method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="emailSubject" placeholder="Subject">
                </div>
                <div>
                  <textarea class="textarea" placeholder="Message" name="emailMsg"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;font-weight: normal"></textarea>
                </div>
              
            </div>
            <div class="box-footer clearfix">
              <button type="submit" name="emailSend" class="pull-right btn btn-default" id="sendEmail">Send</button>
                </form>
            </div>
          </div>
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          

         
            <?php
              if(isset($_POST['emailSend']))
              {
                $to = $_POST['emailto'];
                $subject = mysqli_real_escape_string($con,$_POST['emailSubject']);
                $message = mysqli_real_escape_string($con,$_POST['emailMsg']);
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: ltneventstest@gmail.com' . "\r\n" . 
                            'Reply-To: ltneventstest@gmail.com' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();
                mail($to, $subject, $message, $headers);
        
                echo"<script>alert('Email sent!');window.location=window.location</script>";


              }

            ?>
         

          

          

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

    

          

          

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

