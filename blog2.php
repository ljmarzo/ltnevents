<div class="container-fluid">
  <div class="row">

    <div class="col-sm-9 col-md-9 col-xs-9">
      <div style="width:100%;background-color:#ffffff">
      <center><img src="images/ltneventssmall.jpg" width="60%"></center>  
    </div>
    
    <br>
      <?php
            //query all blogs
            $q = mysql_query("select * from tblBlog order by fldTimePosted DESC");
            $carID = 0;
            while($qf = mysql_fetch_array($q))
            {
              $blogID = $qf['fldBlogID'];
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
              $x = mysql_query("select * from tblBlogPic where fldBlogID = '$blogID'");
              $numX = mysql_num_rows($x);
              if($numX>1)
              {
              ?>

                <div id="carouselExampleIndicators<?php echo $carID; ?>" class="carousel slide" data-ride="carousel">
                 
                  <div class="carousel-inner">
                       <?php
                          $v = mysql_query("select * from tblBlogPic where fldBlogID = '$blogID'");
                          $vID2 = 0;
                          while($vf = mysql_fetch_array($v))
                          {
                        ?>
                            <div class="carousel-item <?php if($vID2 == 0) { echo "active"; } ?>">
                              <img class="d-block w-100" height="570px" src="images/blog/<?php echo $vf['fldPicture'] ?>">
                            </div>

                        <?php
                            $vID2++;
                          }
                        ?>
                      
                     
                    <a class="carousel-control-prev" href="#carouselExampleIndicators<?php echo $carID; ?>" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators<?php echo $carID; ?>" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
              <?php
                $carID++;
              }
              else if($numX==1)
              {
                $xf = mysql_fetch_array($x);
              ?>
                <img class="d-block w-100" height="570px" src="images/blog/<?php echo $xf['fldPicture'] ?>">
              <?php   
              }
                ?>
                <br>
                <br>
                <?php echo $qf['fldContent'] ?>

              </div>
              </div>


           <?php
         }
         ?>

    </div>

   <div class="col-sm-3 col-md-3 col-xs-3">
    <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fltnevents&colorscheme=light&show_faces=true&border_color&stream=true&header=true" scrolling="yes" frameborder="0" style="border:none; overflow:hidden;" width="100%" height="800px" allowtransparency="true"></iframe>﻿
  </div>
   


  </div>
</div>

<br><br>
<!-- footer -->
    <div class="col-md-12" style="background-color:#242424;height:225px;">
      <br><br>
      <div class="row">
        <div class="col-md-4">
          <label style="color:gray">CONTACT</label>
          <div class="row">
            <div class="col-md-4">
              <label style="color:#CDD1D0">Phone:</label>
            </div>
            <div class="col-md-6">
              <label style="color:#CDD1D0">(043) 740 7112</label>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label style="color:#CDD1D0">Email:</label>
            </div>
            <div class="col-md-6">
              <label style="color:#CDD1D0">ltneventscompany@gmail.com</label>
            </div>
          </div>
          
        </div>

        <div class="col-md-4">
          <label style="color:gray">Address</label>
          <div class="row">
            <div class="col-md-12">
              <label style="color:#CDD1D0">Block 5, Lot 12, Doña Aurora St.,<br>City Park Subd., Sabang, Lipa City,<br>Batangas 4217</label>
            </div>
            
          </div>
          
          
        </div>

        <div class="col-md-2">
          <label style="color:#404040"></label>
          <div class="row">
            <div class="col-md-12" style="font-size:30px">
              <a href="https://www.facebook.com/ltnevents/" target="_blank" class="fa fa2 fa-facebook"></a>
              <a href="http://www.instagram.com/exchangagram" target="_blank" class="fa fa2 fa-instagram"></a>
            </div>
            <br>
            <br>
            <br>
            <button class="btn btn-info">Book Now</button>
            
          </div>
          
          

        </div>
        <div class="col-md-2">
          <img src="images/logo.png" width="100%">
          <br>
          <br>
          <div class="row">
            <p style="color:#CDD1D0;font-size:10px">lorrea Solutions © 2018</p>
          </div>
          
        </div>
      </div>
    </div>
    <!-- footer end -->
