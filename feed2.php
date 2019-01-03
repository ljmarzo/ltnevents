
<?php
	
	



?>




<div class="container-fluid">
  <div class="row">

    <div class="col-sm-12 col-md-12 col-xs-12">
	     
    </div>
    	
    <br>
      <?php
            //query all blogs
            $q = mysqli_query($con,"select * from tbltimeline where fldEventID in (select fldEventID from tblevents where fldClient = '$name' and fldEmail = '$email' and fldStatus != 'Archive') order by fldTimePosted DESC");
          $num = mysqli_num_rows($q);
          if($num==0)
          {
            //empty page
            ?>
            <img src="images/empty.png" width="100%" height="480px">
            <?php
          }
          else
          {
            $carID = 0;
            while($qf = mysqli_fetch_array($q))
            {
              $eventID = $qf['fldEventID'];
              $TLID = $qf['fldTLID'];
              echo $TLID;
              $timePosted = $qf['fldTimePosted'];
              $timePosted = date("M. d, Y", strtotime($timePosted));
      ?>
              <div class="card bg-1st" style="padding:12px">
                <div class="card-body" align="justify">
                <h4 class="card-title"><?php echo $qf['fldTitle'] ?></h4>
                <small class="text-muted"><?php echo $timePosted ?> - LTN Team</small>
                <br>
                <br>
                 <?php




              //query all pics in blogID
              $x = mysqli_query($con,"select * from tbltimelinepic where fldTimelineID = '$TLID' and fldEventID = '$eventID'");
              $numX = mysqli_num_rows($x);
              if($numX>0)
              {
              ?>

                <div id="carouselExampleIndicators<?php echo $carID; ?>" class="carousel slide" data-ride="carousel">
                 
                  <div class="carousel-inner">
                       <?php
                          $v = mysqli_query($con,"select * from tbltimelinepic where fldTimelineID = '$TLID' and fldEventID = '$eventID'");
                          $vID2 = 0;
                          while($vf = mysqli_fetch_array($v))
                          {
                        ?>
                            <div class="carousel-item <?php if($vID2 == 0) { echo "active"; } ?>">
                              <img class="d-block w-100" height="570px" src="images/timeline/<?php echo $eventID . "/" . $TLID . "/" . $vf['fldPicture'] ?>">
                            </div>

                        <?php
                            $vID2++;
                          }
                        ?>
                      
                    <?php
                        if($numX > 1)
                    {
                        ?>
                    
                    <a class="carousel-control-prev" href="#carouselExampleIndicators<?php echo $carID; ?>" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators<?php echo $carID; ?>" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                    <?php
                    }
                    ?>
                  </div>
                </div>
              <?php
                $carID++;
              }
              
                ?>
                <br>
                <br>
                <?php echo $qf['fldContent'] ?>

              </div>
              </div>
              <br>&emsp;
              <br>
           <?php
            }
         
       }
         ?>

    </div>



  </div>
<!-- footer -->
<!-- Book Modal -->
<form method="post">
<div class="modal fade" id="bookModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <center><img class="col-2 modal-title text-center" src="images/logo.png"></center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="row">
        <div class="col-sm-6 col-md-6 col-xs-6">
          <table>
            <tr>
              <td>Date:</td><td style="padding:8px"><?php echo date("M d, Y") ?></td> 
            </tr>
            <tr>
              <td>Name:</td><td style="padding:8px"><input type="text" placeholder="Complete Name" required name="inqName" class="form-control"></td>
            </tr>
            <tr>
              <td>Address:</td><td style="padding:8px"><textarea placeholder="Address" name="inqAddr" rows="3" required class="form-control"></textarea></td>
            </tr>
            <tr>
              <td>Category:</td>
              <td style="padding:8px">
                <select required name="inqCategory" class="form-control">
                  <option value="" selected disabled>--Select Category--</option>
                  <option value="Wedding">Wedding</option>
                  <option value="Marketing">Marketing</option>
                  <option value="Production">Production</option>
                  <option value="">Others</option>
                </select>
              </td>
            </tr>
          </table>
          
        </div>

        <div class="col-sm-6 col-md-6 col-xs-6">
          <table>
            <tr>
              <td></td><td style="padding:8px">&emsp;</td>  
            </tr>
            <tr>
              <td>Contact No.:</td><td style="padding:8px"><input type="text" required placeholder="+639xxxxxxxxx" name="inqNum" class="form-control"></td>
            </tr>
            <tr>
              <td>Email:</td><td style="padding:8px"><input type="text" required placeholder="sample@gmail.com" name="inqEmail" class="form-control"></td>
            </tr>
          </table>
          
        </div>
        
       </div>
       <hr>
      <div class="row">
        <div class="col-sm-12 col-md-12 col-xs-12">
            <label style="font-size:18px">Event Details</label>
          <table>
            <tr>
              <td>Event Name:</td><td style="padding:8px;width: 70%"><input type="text" required placeholder="Event Name" name="inqEventName" class="form-control"></td>
            </tr>
            <tr>
              <td>Target Date and Time:</td><td style="padding:8px"><input type="datetime-local" required placeholder="12/30/2000 08:00 AM" name="inqDate" class="form-control"></td>
            </tr>
            <tr>
              <td>Target Venue:</td><td style="padding:8px"><input type="text" placeholder="Target Venue" required name="inqVenue" class="form-control"></td>
            </tr>
            <tr>
              <td>Message:</td><td style="padding:8px"><textarea placeholder="Message" name="inqMsg" required rows="3" class="form-control"></textarea></td>
            </tr>
          </table>
          
        </div>

        
      </div>

      </div>



      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" name="inqSubmit" value="Submit" class="btn btn-success"></form>
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>

      </div>

    </div>
  </div>
</div>

<!-- Review Modal -->
<form method="post">
<div class="modal fade" id="reviewModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <center><img class="col-2 modal-title text-center" src="images/logo.png"></center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <?php 
      if(isset($_SESSION['id'])) 
      { 
        $loggedID = $_SESSION['id'];
        $q2 = mysqli_query($con,"select * from tblusers where fldID =  '$loggedID'");
        $qf2 = mysqli_fetch_array($q2);
        $loggedName = $qf2['fldFirstName'] . " " . $qf2['fldLastName'];
      }
      else
      {
        $loggedName = "";
      }
    ?>
      <!-- Modal body -->
      <div class="modal-body">
       <div class="row">
        <div class="col-sm-12 col-md-12 col-xs-12">
          <div class="form-group">
              <label>Name <sup>(Optional)</sup></label>
              <div class="input-group">    
              <input type="text" autocomplete="off" value="<?php echo $loggedName; ?>" name="revName" placeholder="Name..." class="form-control">
            </div>
            </div>

            <div class="form-group">
              <label>Comment and Suggestion</label>
              <div class="input-group">    
              <textarea name="revComment" placeholder="Comment and Suggestion..." class="form-control" rows="5"></textarea>
            </div>
            </div>
          
        </div>

       </div>

      </div>



      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" name="revSubmit" value="Submit" class="btn btn-success"></form>
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>

      </div>

<?php
  if(isset($_POST['revSubmit']))
  {
    $name = $_POST['revName'];
    if($name == "")
      $name = "Anonymous";
    $comment = mysqli_real_escape_string($con,$_POST['revComment']);
    $q = mysqli_query($con,"insert into tblcomments values ('','$name', '$comment','" . date("Y-m-d H:i:s") . "','no','no')");
    if($q)
      echo "<script>alert('Thank you for sending your review!');window.location=window.location</script>";
  }

?>


    </div>
  </div>
</div>
    <div class="col-md-12" style="background-color:#242424;height:225px;">
      <br><br>
      <div class="row">
        <div class="col-md-4 col-xs-12">
          <label style="color:gray">CONTACT</label>
          <div class="row">
            <div class="col-md-3">
              <label style="color:#CDD1D0">Phone:</label>
            </div>
            <div class="col-md-6">
              <label style="color:#CDD1D0">(043) 740 7112</label>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <label style="color:#CDD1D0">Email:</label>
            </div>
            <div class="col-md-6">
              <label style="color:#CDD1D0;font-size:15px">ltneventscompany@gmail.com</label>
            </div>
          </div>
          
          
          
        </div>

        <div class="col-md-4 col-xs-12">
          <label style="color:gray">Address</label>
          <div class="row">
            <div class="col-md-12">
              <label style="color:#CDD1D0;word-wrap: break-word;">Unit 19H, 2nd Floor Big Ben Complex, JP Laurel Highway, Mataas na Lupa, Lipa, 4217 Batangas</label>
            </div>
            
          </div>
          
          
        </div>

        <div class="col-md-2">
          <label style="color:#404040"></label>
          <div class="row">
            <div class="col-md-12" style="font-size:30px">
              <a href="https://www.facebook.com/ltnevents/" target="_blank" class="fa fa2 fa-facebook"></a>
              <a href="http://www.instagram.com/eventsbyltn" target="_blank" class="fa fa2 fa-instagram"></a>
            </div>
            <br>
            <br>
            <br>
            <?php
                if(!isset($_SESSION['id']))
                {
            ?>
            <button data-toggle="modal" data-target="#bookModal" class="btn btn-info">Inquiry? Click me!</button>
            <?php
                }
            ?>
            <button style="margin-top:10px" data-toggle="modal" data-target="#reviewModal" class="btn btn-info">Review? Click me!</button>
            
          </div>
          
          

        </div>
        <div class="col-md-2">
          <img src="images/logo.png" width="100%">
          <br>
          <br>
          <div class="row">
            <p style="color:#CDD1D0;font-size:10px;float:right">&emsp;&emsp;LTN EVENTS © 2018</p>
          </div>
          
        </div>
      </div>
    </div>


<?php
  if(isset($_POST['inqSubmit']))
  {
    $inqName = $_POST['inqName'];
    $inqAddress = mysqli_real_escape_string($con,$_POST['inqAddr']);
    $inqCategory = $_POST['inqCategory'];
    $inqNum = $_POST['inqNum'];
    $inqEmail = $_POST['inqEmail'];
    $inqEventName = $_POST['inqEventName'];
    $inqTargetDate = $_POST['inqDate'];
    $inqVenue = $_POST['inqVenue'];
    $inqMsg = mysqli_real_escape_string($con,$_POST['inqMsg']);

    $q = mysqli_query($con,"insert into tblinquiry values ('','$inqName','$inqAddress','$inqCategory','$inqNum','$inqEmail','$inqEventName','$inqTargetDate','$inqVenue','$inqMsg','" . date("Y-m-d H:i:s") ."','no')");
    if($q)
    {
      echo "<script>alert('Thank you for your inquiry! Rest assured that we will get back to you ASAP.');window.location=window.location</script>";
    }
  }
?>


    <!-- footer end -->
</div>

<br><br>

				
